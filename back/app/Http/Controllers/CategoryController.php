<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCategory()
    {
        return Category::latest()->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createCategory(Request $request)
    {
        $request->validate([
            'categoryName'  => 'required|max:50',
            'image'  => 'image|mimes:jpg,jpeg,png,gif|max:1999',
        ]);

        $request->file('image')->store('public/images');

        // get orignal name 
        $orignal = $request->file('image')->getClientOriginalName();

        // get image size
        $size = $request->file('image')->getSize();

        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->image        = $request->file('image')->hashName();
        $category->orginal = $orignal;
        $category->size = $size;
        $category->save();

        return response()->json(['message' => 'Create successfully!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryId($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'categoryName'  => 'required|max:50',
            'image'  => 'image|mimes:jpg,jpeg,png,gif|max:1999',
        ]);

        $request->file('image')->store('public/images');

        // get orignal name 
        $orignal = $request->file('image')->getClientOriginalName();

        // get image size
        $size = $request->file('image')->getSize();

        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->image        = $request->file('image')->hashName();
        $category->orginal = $orignal;
        $category->size = $size;
        $category->save();
        
        return response()->json(['message' => 'Category update successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $iSDelete = Category::destroy($id);
        if ($iSDelete ===1) {
            return response()->json(['message' => 'Category deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Category cannot delete'], 404);
        }
    }

    /**
     * search category name
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function search($categoryName)
    {
        return Category::where('categoryName','like','%'.$categoryName.'%')->get();
    }
}
