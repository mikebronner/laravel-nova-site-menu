<?php

namespace GeneaLabs\LaravelNovaSiteMenu\Nova;

use GeneaLabs\LaravelNovaSiteMenu\MenuItem as MenuItemModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Resource;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class MenuItem extends Resource
{
    use HasSortableRows;

    public static $displayInNavigation = false;
    public static $model = MenuItemModel::class;
    public static $title = 'name';
    public static $search = [
        'title',
        'url',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Menu'),

            BelongsTo::make('Parent Menu Item', 'parent', self::class)
                ->nullable(),

            Number::make("Position")
                ->onlyOnDetail()
                ->sortable(),

            Text::make('Url')
                ->sortable()
                ->rules('required', 'string', 'max:255'),

            Text::make('Navigation Label')
                ->sortable()
                ->rules('required', 'max:50'),

            Text::make('Title Attribute'),

            Textarea::make("Description"),

            Select::make("Target")
                ->options([
                    "_blank" => "New Window/Tab",
                    "_self" => "Same Window/Tab",
                    "_parent" => "Parent Frame, Otherwise Same Window/Tab",
                    "_top" => "Full Current Window/Tab If Nested",
                ])
                ->displayUsingLabels()
                ->default(function () {
                    return "_self";
                }),

            HasMany::make("Sub-Menu Items", "children", self::class)
                ->sortable(),
        ];
    }
}
