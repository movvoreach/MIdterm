<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    public function expends()
    {
        return $this->hasMany(ExpendsModel::class, 'category_id');
    }
  
}
