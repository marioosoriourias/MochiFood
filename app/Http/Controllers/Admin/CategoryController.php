<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $category = Category::create($request->all());

        if($request->file('file')){
            $url = Storage::put('food_icons', $request->file('file'));
            $category->image_category()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('admin.categories.edit', $category)->with('info', 'Categoria agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->update($request->all());

 

        if($request->file('file')){
            $url = Storage::put('food_icons', $request->file('file'));

            if($category->image_category){
                Storage::delete($category->image_category->url);

                $category->image_category()->update([
                    'url' => $url
                ]);
            }else{
                $category->image_category()->create([
                    'url' => $url 
                ]);
            }
        }

        return redirect()->route('admin.categories.edit', $category)->with('info', 'Categoria agregada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
        Storage::delete($category->image_category->url);
        $category->image_category()->delete();
        $category->delete();
        
        return redirect()->route('admin.categories.index')->with('info', 'La categoria se elimino con exito');
    }
}
