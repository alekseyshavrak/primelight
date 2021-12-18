<?php

namespace App\Nova\Flexible\Layouts;

use Laravel\Nova\Fields\Markdown;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextOnlyLayout extends Layout
{
    protected $name = 'text_only';

    protected $title = 'Only text';

    public function fields()
    {
        return [
            Markdown::make('Text', 'text')
                ->rules(['required'])
        ];
    }
}
