<?php

namespace GeneaLabs\LaravelNovaSiteMenu;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use GeneaLabs\LaravelOverridableModel\Traits\Overridable;
use GeneaLabs\LaravelOverridableModel\Contracts\OverridableModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EloquentSortable\Sortable;

class MenuItem extends Model implements OverridableModel, Sortable
{
    use Overridable;
    use SortableTrait;

    protected $fillable = [
        "active_classes",
        "classes",
        "description",
        "menu_id",
        "navigation_label",
        "target",
        "position",
        "title_attribute",
    ];

    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true,
        'sort_on_has_many' => true,
    ];

    public function menu() : BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function children() : HasMany
    {
        return $this->hasMany(self::class, "id", "parent_id");
    }
}
