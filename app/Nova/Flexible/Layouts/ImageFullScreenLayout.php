<?php

namespace App\Nova\Flexible\Layouts;

use Spatie\MediaLibrary\HasMedia;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Whitecube\NovaFlexibleContent\Concerns\HasMediaLibrary;

class ImageFullScreenLayout extends Layout implements HasMedia
{
    use HasMediaLibrary;

    protected $name = 'image_fullscreen';

    protected $title = 'Image fullscreen';

    public function fields()
    {
        return [
            Images::make('Image', 'image')
                ->rules('required')
                ->singleImageRules(['image', 'max:2024'])
                ->croppable()
                ->withResponsiveImages()
                ->enableExistingMedia()
        ];
    }
}
