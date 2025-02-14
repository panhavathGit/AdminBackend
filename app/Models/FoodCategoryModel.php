<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategoryModel extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // Add other fields as needed
    protected $table = "category";
    
    public function foods()
    {
        return $this->hasMany(FoodModel::class, 'category_id');
    }
}
