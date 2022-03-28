<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Editar empresa</h1>     
                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                            <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif
            
                <hr class="mt-2 mb-6">

                {!! Form::model($company, ['route'=>['admin.companies.update', $company], 'files' => true, 'method' => 'put']) !!}
                
              
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
                    {!! Form::select('food_type_id', $food_type, $company->food_type->id, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('food_type_id')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('file', 'Logo de la empresa', ['class' => 'font-bold text-lg']) !!}
                    @if ($company->image_logo)
                        <img class="h-60 w-60 object-cover" src="{{Storage::url($company->image_logo->url)}}" alt="">
                    @else
                        <img class="h-60 w-60 object-cover" src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                    @endif

                    {!! Form::file('file', ['class' => 'form-input block w-full mt-1',  'accept' => 'image/*']) !!}
                   
                    @error('file')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                           

                <div class="mb-4">
                    {!! Form::label('food_typasdase_id', 'Categorias', ['class' => 'font-bold text-lg']) !!}
                    <div class="grid grid-cols-3">
                        @foreach ($categories as $category)
                            <div>
                                <label for="">
                                    {!! Form::checkbox('categories[]', $category->id, null, ['class' => 'mr-1']) !!}        
                                    {{$category->name}}
                                </label>
                            </div>                  
                        @endforeach
                    </div>    
                </div>

                @error('categories')
                    <span class="text-red-600">{{$message}}</span>
                @enderror

                <div class="flex justify-between mt-4">
                    <a href="{{route('admin.companies.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Editar empresa', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>