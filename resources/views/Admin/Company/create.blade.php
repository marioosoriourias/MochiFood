<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar nueva empresa</h1>       
            
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'admin.companies.store', 'files' => true]) !!}

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('description', 'Descripción', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('description')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('website', 'Pagina web', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::text('website', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('website')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('food_type_id', 'Tipo de comida', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::select('food_type_id', $food_type, 'null', ['class' => 'form-input block w-full mt-1']) !!}
                    @error('food_type_id')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('file', 'Logo de la empresa', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::file('file', ['class' => 'form-input block w-full mt-1', 'accept' => 'image/*']) !!}
                    @error('file')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                
                <div class="mb-4">
                    {!! Form::label('food_typasdase_id', 'Categorias', ['class' => 'font-bold text-lg']) !!}
                    <div class="grid grid-cols-3">
                    @foreach ($categories as $category)
                        <div>
                            <p>
                                {!! Form::checkbox('categories[]', $category->id, null, ['class' => 'mr-1']) !!}        
                                {{$category->name}}
                            <p>
                        </div>                  
                    @endforeach
                    </div>

                    @error('categories')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

              
                

                
                <div class="flex justify-between mt-4">
                    <a href="{{route('admin.companies.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Agregar empresa', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>