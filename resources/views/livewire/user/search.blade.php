<div>

    @livewire('user.navigation-menu', ['select_city' => '0'])


    @if (!count($companies))
        <div class=" text-4xl mt-10">
            <p class="mt-10 text-center">Ningun resultado en la busqueda realizada<p/>
            <img class="w-80 h-80 mx-auto mb-40 mt-12" src="https://thumbs.dreamstime.com/b/no-coma-y-beba-el-iconl-para-su-dise%C3%B1o-del-sitio-web-logotipo-app-130975950.jpg" alt="">
        </div> 
    @else
        <div class="container">
            <h3 class="text-xl mt-4">{{count($companies) }} resultados de busqueda para <span class="font-bold">"{{$_COOKIE['search']}}"</span></h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-10 mt-10">
            @foreach ($companies as $company)
                <div class="px-5 py-5">
                    <a href="{{route('company-show', $company)}}">
                    @if (!$company->image_logo)
                        <img class="h-80 w-full object-cover border-2 border-black rounded-2xl" src="https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg" alt="">
                    @else
                        <img class="h-80 w-full object-cover border-2 border-black rounded-2xl" src="{{Storage::url($company->image_logo->url)}}" alt="">
                    @endif
                
                    <p class="text-center text-2xl">{{$company->name}}</p>
                    </a>
                </div>   
            @endforeach
        </div>
    @endif
    

</div>
