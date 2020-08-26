<?php

namespace GeneaLabs\LaravelNovaSiteMenu\View\Components;

use GeneaLabs\LaravelNovaSiteMenu\MenuItem as MenuItemModel;
use Illuminate\View\Component;
use Illuminate\View\View;

class MenuItem extends Component
{
    public $url;
    public $classes;
    public $description;
    public $navigationLabel;
    public $target;
    public $titleAttribute;

    public function __construct(MenuItemModel $menuItem)
    {
        $this->url = $menuItem->url;
        $this->classes = $menuItem->classes;
        $this->description = $menuItem->description;
        $this->navigationLabel = $menuItem->navigation_label;
        $this->target = $menuItem->target;
        $this->titleAttribute = $menuItem->title_attribute;

        if ($this->url === request()->url()) {
            $this->classes = $menuItem->active_classes;
        }
    }

    public function render() : View
    {
        return view('laravel-nova-site-menu::components.menu-item');
    }
}
