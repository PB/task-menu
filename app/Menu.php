<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'max_depth', 'max_children'];
    protected $hidden = ['updated_at', 'created_at'];

    /**
     * Get items for the menu
     */
    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Item::class, 'menu_id', 'id');
    }
}
