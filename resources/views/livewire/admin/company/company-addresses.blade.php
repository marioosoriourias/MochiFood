
<div>
    <div class="container">
        <div class="py-4 flex ">
            <a href="{{route('admin.companies.index')}}" class="btn btn-danger ml-2">Regresar</a>
        </div>

        <h1 class="text-3xl text-center pb-8 pt-2"><strong>Empresa </strong>{{$this->company->name}}</h1>
         
        @if (session('info'))
            <div class="card">
                <div class="card-body bg-green-600">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif


        <div class="px-6 py-4 flex ">
            <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 form-group h-10 w-full border-gray-300  border-2"  placeholder="Ingrese una dirección...">
            <a href="{{route('admin.addresses.create', $this->company->id)}}" class="btn btn-danger ml-2">Agregar nueva dirección</a>
        </div>
        
        <x-table-responsive>
            @if($addresses->count())    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Ciudad
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                <p>Dirección</p>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                <p>Telefono</p>
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                <p>Imagenes</p>
                            </th>
                            
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                <p>Editar dirección</p>
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                <p>Eliminar dirección</p>
                            </th>
                        </tr>
                    </thead>
                   
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($addresses as $address)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900"><p> {{$address->id}}</p></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        <a href="#" class="bg-gray-200"> {{$address->city->name}}</a>  
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        <a href="#" class="bg-gray-200"> {{$address->address}}</a>  
                                    </div>
                                </td>

                                <td  class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        <a href="#" class="bg-gray-200"> {{$address->phone}}</a>  
                                    </div>
                                </td>

                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a  href="{{route('admin.addresses.images', $address)}}" class="text-green-500 cursor-pointer" ><i class="fas fa-images text-2xl"></i></a>
                                </td>
                              
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a  href="{{route('admin.addresses.edit', [$this->company, $address])}}" class="text-gray-500 cursor-pointer" ><i class="fas fa-edit text-2xl"></i></a>
                                </td>
                              
                                
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{route('admin.addresses.destroy', [$this->company, $address])}}" method="POST">
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
                    {{$addresses->links()}}
                </div>
            
            @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente...
            </div>
            @endif
        </x-table-responsive>
    </div>

