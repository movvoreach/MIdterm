<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpendsModel extends Model
{
    protected $table = 'expenses';


    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
}
