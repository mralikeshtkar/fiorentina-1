<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
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

    const GROUPS = [
        self::GROUP_POPUP_DESKTOP => "Gruppo popup desktop",
        self::GROUP_POPUP_MOBILE => "Gruppo popup mobile",
        self::GROUP_MAIN_PAGE => "Gruppo main page",
        self::GROUP_BLOG_PAGE => "Gruppo blog page",
        self::GROUP_BACKGROUND_PAGE => "Gruppo background page",
        self::GROUP_DBLOG_TITLE => "Gruppo Dblog_title",
        self::GROUP_DBLOG_AUTHOR => "Gruppo Dblog_author",
        self::GROUP_DBLOG_P1 => "Gruppo Dblog_P1",
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
}
