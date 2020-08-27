<?php

namespace GeneaLabs\LaravelNovaSiteMenu\View\Components;

use GeneaLabs\LaravelNovaSiteMenu\MenuItem as MenuItemModel;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;

class MenuItem extends Component
{
    public $url;
    public $class;
    public $activeClass;
    public $description;
    public $navigationLabel;
    public $target;
    public $titleAttribute;

    public function __construct(
        MenuItemModel $menuItem,
        string $class = "",
        string $activeClass = ""
    ) {
        $this->url = url($menuItem->url);
        $this->class = $class;
        $this->description = $menuItem->description;
        $this->navigationLabel = $menuItem->navigation_label;
        $this->target = $menuItem->target;
        $this->titleAttribute = $menuItem->title_attribute;

        if (Str::startsWith(request()->url(), $this->url)) {
            $this->class = $activeClass;
        }
    }

    public function render() : View
    {
        return view('laravel-nova-site-menu::components.menu-item');
    }
}
