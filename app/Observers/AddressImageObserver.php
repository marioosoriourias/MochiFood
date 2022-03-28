<?php

namespace App\Observers;
use App\Models\address_image;
use Illuminate\Support\Facades\Storage;


class AddressImageObserver
{
    public function deleting(address_image $address_image)
    {
            Storage::delete($address_image->url);
            
    }
}
