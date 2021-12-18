<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Flexible;

class News extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\News::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Images::make('Обложка', 'cover')
                ->rules('required'),

            BelongsTo::make('Категория', 'category', NewsCategory::class)
                ->rules('required'),

            Text::make('Заголовок', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Flexible::make('Content', 'content')
                ->rules('required')
                ->fullWidth()
                ->button('Добавить блок')
                ->addLayout(\App\Nova\Flexible\Layouts\ImageFullScreenLayout::class)
                ->addLayout(\App\Nova\Flexible\Layouts\ImageContainerLayout::class)
                ->addLayout(\App\Nova\Flexible\Layouts\TextAndTitleLayout::class)
                ->addLayout(\App\Nova\Flexible\Layouts\TextOnlyLayout::class)
                ->hideFromIndex(),

            DateTime::make('Дата публикации', 'publish_at')
                ->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
