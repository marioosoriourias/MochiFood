<div>

    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-2 bg-yellow-600">
        <a href="{{route('home')}}" class="flex items-center flex-shrink-0 text-white mr-6">
            <i class="fas fa-utensils text-2xl mr-3"></i>
            <span class="font-semibold text-xl tracking-tight">MochiFood</span>
        </a>
       
        @if ($this->select_city == 1)
            <div class="w-full block flex-grow md:flex md:items-center md:w-auto">
                <div class="text-sm lg:flex-grow lg:text-center">
                    <select   class="w-full md:w-60" name="" id="" wire:model="city_id" wire:change="change" >
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">  {{$city->name}}</option>              
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
       
        
        <div class="flex  w-full md:flex md:w-auto ">        
            <input wire:keydown.enter="ruta" wire:model="search" class="w-full" type="text" name="search" id="search" placeholder="Buscar...">
            <button wire:click="ruta" class="btn btn-primary">Buscar</button>
        </div>

      
    </nav> 

</div>
