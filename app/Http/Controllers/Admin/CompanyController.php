<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Food_type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        return view('admin.company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $food_type = Food_type::pluck('name','id');
        $categories = Category::all();
        return view('admin.company.create', compact('food_type', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->all());
        $company->categories()->attach($request->categories);
        
        if($request->file('file')){
            $url = Storage::put('logos', $request->file('file'));
            $company->image_logo()->create([
                'url' => $url
            ]);
        }
        
        return redirect()->route('admin.companies.edit', $company)->with('info', 'Empresa agregada con exito');
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
    public function edit(Company $company)
    {
        $categories = Category::all();
        $food_type = Food_type::pluck('name','id');
        return view('admin.company.edit',  compact('company', 'food_type', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    { 
        $company->update($request->all());



        if($request->file('file')){
            $url = Storage::put('logos', $request->file('file'));

            if($company->image_logo){
                Storage::delete($company->image_logo->url);

                $company->image_logo()->update([
                    'url' => $url
                ]);
            }else{
                $company->image_logo()->create([
                    'url' => $url 
                ]);
            }
        }

        $company->categories()->sync($request->categories);
        return redirect()->route('admin.companies.edit', $company)->with('info', 'Empresa mofidicada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Storage::delete($company->image_logo->url);
        $company->image_logo()->delete();

        $company->delete();
        return redirect()->route('admin.companies.index')->with('info', 'La empresa se elimino con exito');
    }

    public function company_adress(Company $company)
    {
        return view('admin.company.company-addresses', compact($company));
    }
}
