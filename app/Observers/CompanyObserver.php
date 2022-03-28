<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;


class CompanyObserver
{

    public function deleting(Company $company)
    {
        foreach ($company->addresses as $address)
        {
            if($address->image_address){
                Storage::delete($address->image_address->url);
                $address->image_address->delete();

                foreach($address->images as $image){
                    Storage::delete($image->url);
                    $image->delete();
                }

            }

            // foreach ($address->images as $image)
            // {
            //     if($address->image_address){
            //         Storage::delete($address->image_address->url);
            //         $address->image_address->delete();
            //     }
            // }
        }
    }

    
}
