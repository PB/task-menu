<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Item extends Model
{
    use NodeTrait;
    /**
     * @var array
     */
    protected $fillable = ['name', 'menu_id'];
    /**
     * @var array
     */
    protected $hidden = ['updated_at', 'created_at', '_lft', '_rgt', 'menu_id', 'parent_id'];

    /**
     * @return array
     */
    protected function getScopeAttributes(): array {
        return [ 'menu_id' ];
    }

}
