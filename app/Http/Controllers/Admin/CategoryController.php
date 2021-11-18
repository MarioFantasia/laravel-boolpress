<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "string|required|max:20|unique:categories,name"
        ]);

        $newCategory = new Category();
        $newCategory ->fill($request->all());
        $newCategory->slug = Str::of($request->name)->slug("-");
        $newCategory->save();

        return redirect()->route("admin.categories.index")->with("success", "La categoria è stata aggiunta");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("admin.categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact("category"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => "string|required|max:20|unique:categories,name",
        ]);

        if($category->name != $request->name){
            $slug = Str::of($request->name)->slug("-");
            
            //per l-improbabile caso che ci sia un titolo ripetuto. da rivedere. anche per post
            $categoryExist =Category::where("slug", $slug)->first();
            
            $cont = 2;
            
            while($categoryExist) {
                $slug = Str::of($request->name)->slug("-");
                $categoryExist =Category::where("slug", $slug)->first();
                $cont++;
                
            }
            
            $category->slug = $slug;
        }
        
        $category->fill($request->all());
        $category->save();

        return redirect()->route("admin.categories.show", $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
