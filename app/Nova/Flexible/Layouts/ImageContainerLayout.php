<?php

namespace App\Nova\Flexible\Layouts;

use Spatie\MediaLibrary\HasMedia;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Whitecube\NovaFlexibleContent\Concerns\HasMediaLibrary;

class ImageContainerLayout extends Layout implements HasMedia
{
    use HasMediaLibrary;

    protected $name = 'image_container';

    protected $title = 'Image container';

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
