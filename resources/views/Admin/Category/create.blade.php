<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar nueva categoria</h1>       
            
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'admin.categories.store', 'files' => true]) !!}

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                

                <div class="mb-4">
                    {!! Form::label('file', 'Imagen de la categiria (deber ser un archivo png  con fondo transparente)') !!}
                    {!! Form::file('file', ['class' => 'form-input block w-full mt-1', 'accept' => 'image/png']) !!}
                    @error('file')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="flex justify-between">
                    <a href="{{route('admin.categories.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Agregar nueva categoria', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>