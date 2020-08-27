<?php

namespace GeneaLabs\LaravelNovaSiteMenu\Nova;

use GeneaLabs\LaravelNovaSiteMenu\Menu as MenuModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource as NovaResource;

class Menu extends NovaResource
{
    public static $model = MenuModel::class;
    public static $title = 'name';
    public static $search = [
        'name',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable(),
            Text::make("Name")
                ->sortable()
                ->rules("required"),
            DateTime::make("Created At")
                ->onlyOnDetail(),
            DateTime::make("Updated At")
                ->onlyOnDetail(),
            HasMany::make("Menu Items", "menuItems", MenuItem::class)
                ->hideFromIndex(),
        ];
    }
}
