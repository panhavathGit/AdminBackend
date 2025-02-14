<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodModel extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','food_img', 'category_id', 'price'];
    protected $table = "food";
    
    public function category()
    {
        return $this->belongsTo(FoodCategoryModel::class, 'category_id');
    }
}


