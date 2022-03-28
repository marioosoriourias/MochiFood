<div>
    
    @livewire('user.navigation-menu', ['select_city' => '1'])

    <div class="container">

        @if (count($addresses))
            <h1 class="text-center text-4xl my-5 text-gray-700">Sucursales de <span class="text-black"> {{ $company->name}}</span></h1>
            <div class="grid grid-cols-1 bg-red-700">
        
                <div>
                    @if (!$company->image_logo)
                            <img class="object-cover h-72 w-full"  src="https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg" alt="">
                        @else
                            <img class="object-cover h-72 w-full"  src="{{Storage::url($company->image_logo->url)}}" alt="">
                    @endif
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-10">
                @foreach ($addresses as $address)  
                <a href="{{route('address-show', $address)}}">
                    @if (!$address->image_address)
                        <img  src="https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg" class="object-cover h-40 w-full" alt="">  
                    @else
                        <img  src="{{Storage::url($address->image_address->url)}}" class="object-cover h-40 w-full" alt="">  
                    @endif
                    <p class="leading-5 text-lg"><span class="font-bold text-base">{{Str::limit($address->address, $limit = 40, $end = '...')}}</p>
                    <p class="leading-5 text-lg"><span class="font-bold text-base">{{$address->phone}}</p>
                </a>
                @endforeach 
            </div>

        @else
            <div class=" text-4xl mt-10">
                <p class="mt-10 text-justify">No existen sucursales de la empresa <strong> {{$company->name}} </strong> en la ciudad seleccionada<p/>
                <img class="w-80 h-80 mx-auto mb-40 mt-12" src="https://thumbs.dreamstime.com/b/no-coma-y-beba-el-iconl-para-su-dise%C3%B1o-del-sitio-web-logotipo-app-130975950.jpg" alt="">
            </div>
           
        @endif
    </div>
</div>

