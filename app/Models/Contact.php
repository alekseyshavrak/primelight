<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'address'];

    protected $casts = [
        'title' => 'json',
        'address' => 'json',
    ];


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
