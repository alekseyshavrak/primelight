<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextAndTitleLayout extends Layout
{
    protected $name = 'text_and_title';

    protected $title = 'Text and title';

    public function fields()
    {
        return [
            Text::make('Title', 'title')
                ->translatable(),

            Markdown::make('Text', 'text')
                ->translatable()
        ];
    }
}
