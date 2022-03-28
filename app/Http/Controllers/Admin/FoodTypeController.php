<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodTypeRequest;
use App\Http\Requests\UpdateFoodTypeRequest;
use App\Models\Food_type;
use App\Models\Payment;


class FoodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.foodtype.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foodtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodTypeRequest $request)
    {
        $foodtype = Food_type::create($request->all());
        return redirect()->route('admin.foodtypes.edit', $foodtype)->with('info', 'Tipo de comida agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
   
     * @return \Illuminate\Http\Response
     */
    public function edit(Food_type $foodtype)
    {
        return view('admin.foodtype.edit',  compact('foodtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodTypeRequest $request, Food_type $foodtype)
    { 
        $foodtype->update($request->all());
        return redirect()->route('admin.foodtypes.edit', $foodtype)->with('info', 'Tipo de comida mofidicada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food_type $foodtype)
    {
        $foodtype->delete();
        return redirect()->route('admin.foodtypes.index')->with('info', 'El tipo de comida se elimino con exito');
    }
}
