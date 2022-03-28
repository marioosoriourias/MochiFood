<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar nueva imagen</h1>       
            
                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                            <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif

                <hr class="mt-2 mb-6">

                {!! Form::model($address_image, ['route'=>['admin.address-images.update', $address_image], 'method'=>'put', 'files' => true]) !!}

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('description')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('file', 'Imagen') !!}

                        <img class="h-48 w-48 object-cover" src="{{Storage::url($address_image->url)}}" alt="">
                    
                    {!! Form::file('file', ['class' => 'form-input block w-full mt-1']) !!}
                    @error('file')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="flex justify-between">
                    <a href={{route('admin.addresses.images', $address_image->address->id)}} class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Editar imagen', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>