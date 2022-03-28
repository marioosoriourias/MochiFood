<div>
    <div class="container">

        <div class="py-4 flex ">
            <a href="{{route('admin.company-addresses', $this->address->company_id)}}" class="btn btn-danger ml-2">Regresar</a>
        </div>
   
        <h1 class="text-xl"><strong>Empresa </strong>{{$this->address->company->name}}</h1>
        <h1 class="text-xl"><strong>Dirección </strong>{{Str::limit($this->address->address, $limit = 80, $end = '...')}}</h1>
        
        <h1 class="text-3xl text-center pb-8 pt-2">Imagenes</h1>
         
        @if (session('info'))
            <div class="card">
                <div class="card-body bg-green-600">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif

  
        
        <div class="px-6 py-4 flex ">
            <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 form-group h-10 w-full border-gray-300  border-2"  placeholder="Ingrese el nombre de una categoria...">
            <a href="{{route('admin.address-images.create', $this->address->id)}}" class="btn btn-danger ml-2">Agregar nueva imagen</a>
        </div>

        <x-table-responsive>
            @if($images->count())    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Description
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            imagen
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Editar imagen</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Eliminar imagen</p>
                        </th>
                    </tr>
                    </thead>
                   
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($images as $image)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        <a href="#" class="bg-gray-200">{{Str::limit($image->name, $limit = 25, $end = '...')}}</a>  
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        <a href="#" class="bg-gray-200">{{Str::limit($image->description, $limit = 45, $end = '...')}}</a>  
                                    </div>
                                </td>
                                
                               
                                
                                <td class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <img class="h-32 w-32 object-cover" src="{{Storage::url($image->url)}}" alt="">
                                </td>

                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a  href="{{route('admin.address-images.edit', $image)}}" class="text-gray-500 cursor-pointer" ><i class="fas fa-edit text-2xl"></i></a>
                                </td>
                              
                                
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{route('admin.address-images.destroy', $image)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500 hover:text-red-700 "  type="submit"><i class="fas fa-trash-alt text-2xl"></i></button>
                                    </form>
                                    <a ></a>
                                </td>
                            </tr>                 
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-2">
                    {{$images->links()}}
                </div>
            
            @else
                <div class="px-6 py-4">
                    No hay ningun registro coincidente...
                </div>
            @endif
        </x-table-responsive>
    </div>
</div>
