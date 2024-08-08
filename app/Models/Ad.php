<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Storage;

class Ad extends BaseModel
{
    protected $table = 'ads';

    const TYPE_ANNUNCIO_IMMAGINE = 1;
    const TYPE_GOOGLE_ADS = 2;

    const TYPES = [
        self::TYPE_ANNUNCIO_IMMAGINE => "Annuncio immagine",
        self::TYPE_GOOGLE_ADS => "Google Ad Manager",
    ];

    const GROUP_POPUP_DESKTOP = 1;
    const GROUP_POPUP_MOBILE = 2;
    const GROUP_MAIN_PAGE = 3;
    const GROUP_BLOG_PAGE = 4;
    const GROUP_BACKGROUND_PAGE = 5;
    const GROUP_DBLOG_TITLE = 6;
    const GROUP_DBLOG_AUTHOR = 7;
    const GROUP_DBLOG_P1 = 8;
    const GROUP_DBLOG_P2 = 9;
    const GROUP_DBLOG_P3 = 10;
    const GROUP_DBLOG_P4 = 11;
    const GROUP_DBLOG_P5 = 12;

    const GROUPS = [
        self::GROUP_POPUP_DESKTOP => "Gruppo popup desktop",
        self::GROUP_POPUP_MOBILE => "Gruppo popup mobile",
        self::GROUP_MAIN_PAGE => "Gruppo main page",
        self::GROUP_BLOG_PAGE => "Gruppo blog page",
        self::GROUP_BACKGROUND_PAGE => "Gruppo background page",
        self::GROUP_DBLOG_TITLE => "Gruppo Dblog_title",
        self::GROUP_DBLOG_AUTHOR => "Gruppo Dblog_author",
        self::GROUP_DBLOG_P1 => "Gruppo Dblog_P1",
        self::GROUP_DBLOG_P2 => "Gruppo Dblog_P2",
        self::GROUP_DBLOG_P3 => "Gruppo Dblog_P3",
        self::GROUP_DBLOG_P4 => "Gruppo Dblog_P4",
        self::GROUP_DBLOG_P5 => "Gruppo Dblog_P5",
    ];

    protected $fillable = [
        'title',
        'type',
        'image',
        'group',
        'starts_at',
        'expires_at',
        'width',
        'height',
    ];

    protected $casts = [
        'status' => 'bool',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::updated(function (self $ad) {
            if ($ad->wasChanged('image')) {
                Storage::disk('public')->delete($ad->getOriginal('image'));
            }
        });
        static::deleted(function (self $ad) {
            if ($ad->hasImage()){
                Storage::disk('public')->delete($ad->image);
            }
        });
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return Storage::url($this->image);
    }

    /**
     * @return bool
     */
    public function hasImage(): bool
    {
        return !is_null($this->image) && strlen($this->image);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeTypeAnnuncioImmagine($query): mixed
    {
        return $query->where('status', self::TYPE_ANNUNCIO_IMMAGINE);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeTypeGoogleAds($query): mixed
    {
        return $query->where('status', self::TYPE_GOOGLE_ADS);
    }

    public static function addAdsToContent($content)
    {
        $ads = self::query()
            ->typeAnnuncioImmagine()
            ->whereIn('group', [self::GROUP_DBLOG_P1,self::GROUP_DBLOG_P2,self::GROUP_DBLOG_P3])
            ->get()
            ->unique('group')
            ->mapWithKeys(function ($item, $key) {
                return [$item->group => $item];
            });
        $shortCodePattern = '/<shortcode>(.*?)<\/shortcode>/';
        preg_match_all('/<shortcode>(.*?)<\/shortcode>|<p[^>]*?>([\s\S]*?)<\/p>/', $content, $contentMatches);
        if (count($contentMatches)) {
            $contentMatches = collect(collect($contentMatches)->first());
            if ($contentMatches->count()) {
                $shortCodes = $contentMatches->filter(fn($item) => preg_match($shortCodePattern, $item));
                $contentMatches = $contentMatches->forget($shortCodes->keys())->values();
                $chunk = $contentMatches->chunk(ceil(count($contentMatches) / 4));
                $content = $chunk->map(function ($item, $key) use ($ads) {
                    if ($key == 0 && $ads->has(self::GROUP_DBLOG_P1)) {
                        $item[] = view('ads.includes.dblog-p', ['ad' => $ads->get(self::GROUP_DBLOG_P1)])->render();
                    }else if ($key == 1 && $ads->has(self::GROUP_DBLOG_P2)) {
                        $item[] = view('ads.includes.dblog-p', ['ad' => $ads->get(self::GROUP_DBLOG_P2)])->render();
                    }else if ($key == 2 && $ads->has(self::GROUP_DBLOG_P3)) {
                        $item[] = view('ads.includes.dblog-p', ['ad' => $ads->get(self::GROUP_DBLOG_P3)])->render();
                    }
                    return $item;
                })->flatten();
                if ($shortCodes->count()) {
                    $adsBackground = $shortCodes->first(function ($item) {
                        return str_contains($item, '<shortcode>[ads-background][/ads-background]</shortcode>');
                    });
                    if ($adsBackground) {
                        Theme::set('has-ads-background', $adsBackground);
                        $shortCodes = $shortCodes->filter(function ($item) {
                            return !str_contains($item, '<shortcode>[ads-background][/ads-background]</shortcode>');
                        });
                    }
                }
                $content = $shortCodes->merge($content)->implode("");
            }
        }
        return $content;
    }
}

