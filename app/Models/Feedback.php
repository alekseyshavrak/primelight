<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Feedback extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country_id', 'name', 'surname', 'phone', 'email', 'company', 'message'
    ];

    /**
     * Registration MediaCollections
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cv_document')->singleFile();
        $this->addMediaCollection('other_document')->singleFile();
    }


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
