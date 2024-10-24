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
    const GROUP_diretta_1 = 13;
    const GROUP_recentp1 = 14;
    const GROUP_recentp2 = 15;
    const GROUP_recentp3 = 16;
    const GROUP_recentp4 = 17;
    const Google_adsense = 18;

    const GROUPS = [
        self::GROUP_POPUP_DESKTOP => "DESKTOP popup desktop",

        self::GROUP_MAIN_PAGE => "DESKTOP main page",
        self::GROUP_BLOG_PAGE => "DESKTOP blog page",
        self::GROUP_BACKGROUND_PAGE => "DESKTOP background page",
        self::GROUP_DBLOG_TITLE => "DESKTOP Dblog_title",
        self::GROUP_DBLOG_AUTHOR => "DESKTOP Dblog_author",
        self::GROUP_DBLOG_P1 => "DESKTOP Dblog_P1",
        self::GROUP_DBLOG_P2 => "DESKTOP Dblog_P2",
        self::GROUP_DBLOG_P3 => "DESKTOP Dblog_P3",
        self::GROUP_DBLOG_P4 => "DESKTOP  Dblog_P4",
        self::GROUP_DBLOG_P5 => "DESKTOP Dblog_P5",
        self::GROUP_diretta_1 => "DESKTOP Diretta_1",
        self::GROUP_recentp1 => "DESKTOP recentp1",
        self::GROUP_recentp2 => "DESKTOP recentp2",
        self::GROUP_recentp3 => "DESKTOP recentp3",
        self::GROUP_recentp4 => "DESKTOP recentp4",
        self::Google_adsense => "Google n1",
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
    public function getGroupNameAttribute()
    {
        return self::GROUPS[$this->group] ?? 'Unknown Group';
    }
    protected static function boot()
    {
        parent::boot();
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        if($this->type==1){
            return Storage::url($this->image);
        }
        return $this->image;

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
        $adsBackgroundShortCodeRegex = '/<shortcode>\[ads-background.*?\](.*?)\[\/ads-background.*?\]<\/shortcode>/';
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
                    $adsBackground = $shortCodes->first(function ($item) use ($adsBackgroundShortCodeRegex) {
                        return preg_match($item, $adsBackgroundShortCodeRegex);
                    });
                    if ($adsBackground) {
                        Theme::set('has-ads-background', $adsBackground);
                        $shortCodes = $shortCodes->filter(function ($item) use ($adsBackgroundShortCodeRegex) {
                            return !preg_match($item, $adsBackgroundShortCodeRegex);
                        });
                    }
                }
                $content = $shortCodes->merge($content)->implode("");
            }
        }
        return $content;
    }

}

