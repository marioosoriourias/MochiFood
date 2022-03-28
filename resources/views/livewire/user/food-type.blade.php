<div>
    <div class="mt-20 container ">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="grid grid-cols-2 md:grid-cols-4 ">
    
            <div x-data="{ open: false }" class=" text-left col-span-4 md:col-span-1 ">
                <div > 
                    <button  class=" w-full md:w-56 inline-flex text-left rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"  x-on:click=" open= true" type="button" id="options-menu" aria-haspopup="true" aria-expanded="true">
                        <img class="w-9 h-9" src="{{asset('img/food_icons/pizza.png')}}" alt="">Categorias
                    <!-- Heroicon name: chevron-down -->
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
    
                <div x-show="open" x-on:click.away = "open = false" class=" w-full  md:w-56 absolute mt-2  rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div  class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        @foreach ($this->categories as $category)                      
                            <a href="{{route('category', $category->id)}}" class="block px-2 py-1 text-base text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                <div class="flex">

                                    <img class="ml-2 h-9 w-10" src="{{Storage::url($category->image_category->url)}}" alt="">
                                    <p class="ml-1">{{$category->name}}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
    
    
            <div class="col-span-3 ">
                <nav class="" x-data="{open:false} ">
                    
                    <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
                        <div class="border border-gray-300 mt-2 sm:mt-0 flex items-center justify-between h-16">
                           
                            <div class="inset-y-0 left-0 flex items-center sm:hidden">
                            <!-- Mobile menu button-->
                                <button x-on:click="open=true" class=" sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                                    <span class="sr-only">Abrir menu principal</span>
                                    
                                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                    
                                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            
                    
                            <!-- Secciones del menu -->
                            <div class=" flex-1 flex items-center justify-center sm:items-stretch sm:justify-start h-full">
                    
                                <div class="hidden sm:block  w-full h-full">
                                    <div class="bg-gray-800 flex justify-around  h-full ">                                   
                                        @foreach ($food_types as $food_type)
                                            <button wire:click="tipo_comida({{$food_type}})" class="w-full border-r border-gray-50 text-center text-gray-300 text-xl hover:bg-gray-700 hover:text-white px-3 py-4  font-medium '}}">{{$food_type->name}}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>  
                            
                        </div>
                    </div>
                
                    {{--Menu movil--}}
                    <div class="w-11/12 absolute sm:hidden bg-white border border-gray-200" x-show="open" x-on:click.away = "open=false">
                        <div class="w-full px-2 pt-2 pb-3">
                            @foreach ($food_types as $food_type)
                                <button wire:click="tipo_comida({{$food_type}})" class="border border-gray-800 w-full hover:bg-gray-700 hover:text-white block px-3 py-2 my-1 rounded-md text-base font-medium">{{$food_type->name}}</button>
                            @endforeach
                        </div>
                    </div>
                
                </nav> 
                
            </div>
        </div>
       
        <h1 class="text-4xl text-center mt-6">{{$this->category_name}}</h1>
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
    
    </div>
</div>
