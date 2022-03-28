<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\Address\AddressImages;
use App\Http\Requests\StoreImageRequest;
use App\Models\Address;
use App\Models\address_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddressImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($address)
    {
        session()->put('address_id', $address);
        return view('admin.address_images.create', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        $request->request->add(['address_id' => session()->get('address_id')]); //add request
    
        if($request->file('file')){
            $url = Storage::put('address_pictures', $request->file('file'));
            $request['url'] = $url;
        }
        else{
            $request['url'] = "NA"; 
        }
        
        $address_image = Address_image::create($request->all());
        return redirect()->route('admin.address-images.edit', $address_image)->with('info', 'Imagen agregada con exito');

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
    public function edit(address_image $address_image)
    {
        return view('admin.address_images.edit', compact('address_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, address_image $address_image)
    {     
        $request->validate([
            'name' => 'required'
            ]);
   
        if($request->file('file')){
            $url = Storage::put('address_pictures', $request->file('file'));
            Storage::delete($address_image->url);
            $request->request->add(['url' => $url]);
        } 


        
        $address_image->update($request->all());
        return redirect()->route('admin.address-images.edit', $address_image)->with('info', 'Imagen modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(address_image $address_image)
    {
        $address_image->delete();
        return redirect()->route('admin.addresses.images', session()->get('address_id'))->with('info', 'Imagen eliminada con exito');

    }
}
