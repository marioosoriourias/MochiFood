<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
  
    }

    public function create($company)
    {
        session()->put('company_id', $company);

        $cities = City::pluck('name','id');
        $payment_type = Payment::all();
        $services = Service::all();

        return view('admin.address.create', compact('cities', 'company', 'payment_type', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request, Company $company)
    {
        $request->request->add(['company_id' => session()->get('company_id')]); 

        $address = Address::create($request->all());    

        $address->payments()->attach($request->payments);
        $address->services()->attach($request->services);


        if($request->file('file')){
            $url = Storage::put('address', $request->file('file'));
            $address->image_address()->create([
                'url' => $url
            ]);
        }
        

        return redirect()->route('admin.addresses.edit',[$company, $address])->with('info', 'Dirección agregada con exito');
        
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
    public function edit(Company $company, Address $address)
    {
        $addresses = Address::where('id', $address->id)->where('company_id',$company->id)->get();
        
        if($addresses->count() < 1) abort(404);

        $cities = City::pluck('name','id');
        $payment_type = Payment::all();

        return view('admin.address.edit', compact('cities', 'address', 'company', 'payment_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Company $company, Address $address)
    {
        $request->validate([
            'address' => 'required'
        ]);
 
        $address->update($request->all());


        if($request->file('file')){
            $url = Storage::put('address', $request->file('file'));

            if($address->image_address){
                Storage::delete($address->image_address->url);

                $address->image_address()->update([
                    'url' => $url
                ]);
            }else{
                $address->image_address()->create([
                    'url' => $url 
                ]);
            }
        }

        $address ->payments()->sync($request->payments);
        return redirect()->route('admin.addresses.edit',[$company, $address])->with('info', 'Dirección modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Address $address)
    {
        $address->delete();
        return redirect()->route('admin.company-addresses', session()->get('company_id'))->with('info', 'La dirección se elimino con exito');
    }


}
