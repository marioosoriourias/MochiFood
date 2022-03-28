<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Editar categoria</h1>   
                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                            <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif
            
                <hr class="mt-2 mb-6">

                {!! Form::model($category, ['route'=>['admin.categories.update', $category], 'method' => 'put',  'files' => true]) !!}

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    {!! Form::label('file', 'Imagen de la categoria') !!}
                    @if ($category->image_category)
                        <img class="h-36  mt-10 mb-10" src="{{Storage::url($category->image_category->url)}}" alt="">
                    @else
                        <img class="h-60 w-60 object-cover mt-10 mb-10" src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                    @endif

                    {!! Form::file('file', ['class' => 'form-input block w-full mt-1',  'accept' => 'image/*']) !!}
                   
                    @error('file')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                

                <div class="flex justify-between">
                    <a href="{{route('admin.categories.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Editar categoria', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>