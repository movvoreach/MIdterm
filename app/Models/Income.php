<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';
   

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

}
