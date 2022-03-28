<?php

namespace App\Observers;

use App\Models\Address;
use Illuminate\Support\Facades\Storage;


class AddressObserver
{
    public function deleting(Address $address)
    {
        if($address->image_address){
            Storage::delete($address->image_address->url);
            $address->image_address->delete();

            foreach($address->images as $image){
                Storage::delete($image->url);
                $image->delete();
            }

        }
    }
}
