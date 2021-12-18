<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Team extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(TeamCountry::class, 'country_id');
    }

    /**
     * Get the user's avatar.
     *
     * @return Media
     */
    public function getAvatarAttribute(): Media
    {
        return $this->getFirstMedia('avatar');
    }
}
