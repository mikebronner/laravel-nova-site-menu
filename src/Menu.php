<?php

namespace GeneaLabs\LaravelNovaSiteMenu;

use GeneaLabs\LaravelOverridableModel\Contracts\OverridableModel;
use GeneaLabs\LaravelOverridableModel\Traits\Overridable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model implements OverridableModel
{
    use Overridable;

    protected $fillable = [
        "name"
    ];

    public function menuItems() : HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
