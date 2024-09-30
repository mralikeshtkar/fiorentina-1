<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    protected $table = 'videos';
    const TYPE_ANNUNCIO_vidoe = 1;
    // Define video types if needed
    const TYPE_VIDEO_AD = 1; // Example: Video Advertisement

    const TYPES = [
        self::TYPE_VIDEO_AD => 'Video Advertisement',
    ];

    // Define video groups if needed
    const GROUP_MAIN_PAGE = 1;
    const GROUP_BLOG_PAGE = 2;

    const GROUPS = [
        self::GROUP_MAIN_PAGE => 'Main Page Videos',
        self::GROUP_BLOG_PAGE => 'Blog Page Videos',
    ];

    protected $fillable = [
        'title',
        'video_path',
        'group',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'bool',
    ];

    /**
     * Get the group name attribute.
     */
    public function getGroupNameAttribute()
    {
        return self::GROUPS[$this->group] ?? 'Unknown Group';
    }

    /**
     * Boot method to handle deletion of video files.
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function (self $video) {
            if ($video->wasChanged('video_path')) {
                Storage::disk('public')->delete($video->getOriginal('video_path'));
            }
        });

        static::deleted(function (self $video) {
            if ($video->hasVideo()) {
                Storage::disk('public')->delete($video->video_path);
            }
        });
    }

    /**
     * Get the video URL.
     *
     * @return string
     */
    public function getVideoUrl(): string
    {
        return Storage::url($this->video_path);
    }

    /**
     * Check if the video exists.
     *
     * @return bool
     */
    public function hasVideo(): bool
    {
        return !is_null($this->video_path) && strlen($this->video_path);
    }

    /**
     * Scope to get specific video type (e.g., advertisements).
     *
     * @param $query
     * @return mixed
     */
    public function scopeTypeVideoAd($query): mixed
    {
        return $query->where('status', self::TYPE_VIDEO_AD);
    }

    /**
     * Static method to insert videos into content.
     */
    public static function addVideosToContent($content)
    {
        $videos = self::query()
            ->where('status', true)
            ->whereIn('group', [self::GROUP_MAIN_PAGE, self::GROUP_BLOG_PAGE])
            ->get()
            ->unique('group')
            ->mapWithKeys(function ($item) {
                return [$item->group => $item];
            });

        $content = collect(explode("\n", $content))->map(function ($line, $index) use ($videos) {
            if ($index == 2 && $videos->has(self::GROUP_MAIN_PAGE)) {
                $line .= view('videos.includes.video', ['video' => $videos->get(self::GROUP_MAIN_PAGE)])->render();
            } elseif ($index == 4 && $videos->has(self::GROUP_BLOG_PAGE)) {
                $line .= view('videos.includes.video', ['video' => $videos->get(self::GROUP_BLOG_PAGE)])->render();
            }
            return $line;
        })->implode("\n");

        return $content;
    }
    public function ads()
    {
        return $this->hasMany(VideoAd::class, 'video_id');
    }
}
