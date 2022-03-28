<div>
    

    @livewire('user.navigation-menu', ['select_city' => '0'])

    <div class="container">

        <div class="mx-auto flex mt-8">
            <div class="mx-auto flex">
                <img class="ml-2 h-28 w-32" src="{{Storage::url($category->image_category->url)}}" alt="">
                <p class="object-bottom my-auto text-4xl ml-2">{{$category->name}}</p>
            </div>
        </div>
        
        @if (count($companies))

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-10 mt-2">
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

            <div class="my-2">
                {{$companies->links()}}
            </div>

        @else
            <div class=" text-4xl mt-10">
                <p class="mt-10 text-center">No existen sucursales de la categoria seleccionada <p/>
                <img class="w-80 h-80 mx-auto mb-40 mt-12" src="https://thumbs.dreamstime.com/b/no-coma-y-beba-el-iconl-para-su-dise%C3%B1o-del-sitio-web-logotipo-app-130975950.jpg" alt="">
            </div>
        @endif
  

    </div>

</div>
