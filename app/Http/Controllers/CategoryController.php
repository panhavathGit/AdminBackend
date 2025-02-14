<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\FoodCategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request){

        try{
            $name = $request -> name;
            $category = FoodCategoryModel::create([
                'name' => $name
            ]);
            return response()->json([
                'message' => 'category created successfully!' ,
                'data' => new CategoryResource($category)
            ]);

        }catch (\Exception $e){
            return response()->json([
                'error'=> $e ->getMessage() 
            ]);
        }

    }

    public function getAllCategories(){
        
    }

    public function updateCategory(Request $request,$id){
        try{
            $category = FoodCategoryModel::find($id);
            if(!$category){
                return response()->json([
                    'message' => 'category not found!'  
                ]);
            }

            $name = $request -> name;
            $category->update([
                'name' => $name
            ]);
            
            return response()->json([
                'message' => 'category updated successfully!' ,
            ]);

        }catch (\Exception $e){
            return response()->json([
                'error'=> $e ->getMessage() 
            ]);
        }

    }

    public function deleteCategory($id){
        $category = FoodCategoryModel::find($id);

        if(!$category){
            return response()->json([
                'message' => 'category not found'
            ]);    
        }

        $category->delete();
        return response()->json([
            'message' => 'category deleted successfully!'
        ]);
        
    }

    public function search(){

    }
}
