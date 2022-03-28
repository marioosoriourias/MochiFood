<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-2 bg-yellow-600">
    <a href="{{route('home')}}" class="flex items-center flex-shrink-0 text-white mr-6">
        <i class="fas fa-utensils text-2xl mr-3"></i>
        <span class="font-semibold text-xl tracking-tight">MochiFood</span>
    </a>
    <div class="block md:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
   
    <div class="w-full block flex-grow md:flex md:items-center md:w-auto">
        <div class="text-sm lg:flex-grow lg:text-center">
            <select   class="w-full md:w-60" name="" id="" wire:model="city_id" wire:change="change" >
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">  {{$city->name}}</option>              
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="flex  w-full md:flex md:w-auto ">      
            <input class="w-full" type="text" name="search" id="search" placeholder="Buscar...">
            <button class="btn btn-primary">Buscar</button>
    </div>

</nav> 
