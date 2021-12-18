<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasFlexible;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    protected $casts = [
        'publish_at' => 'datetime',
        'content' => FlexibleCast::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    public function getCoverAttribute(): Media
    {
        return $this->getFirstMedia('cover');
    }

    public function getFlexibleAttribute()
    {
        $content = collect();

        $this->flexible('content')->map(function ($item, $key) use ($content) {
            $data = [
                'sort' => $key + 1,
                'type' => $item->name(),
            ];

            switch($item->name()) {
                case 'text_and_title':
                    $data['content'] = [
                        'title' => $item->title,
                        'text' => $item->text,
                    ];
                break;

                case 'image_fullscreen':
                case 'image_container':
                    $data['content'] = [
                        'image' => Media::where('collection_name', 'image_' . $item->key())->first()?->getUrl(),
                    ];
                break;

                case 'text_only':
                    $data['content'] = [
                        'text' => $item->text,
                    ];
                break;
            }

            $content->add($data);
        });

        return $content->sortBy('sort')->toArray();
    }
}
