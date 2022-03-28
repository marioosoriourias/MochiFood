<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Editar dirección</h1>       
                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                            <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif

                <hr class="mt-2 mb-6">

                {!! Form::model($address, ['route'=>['admin.addresses.update', [$company, $address]], 'files' => true, 'method' => 'put']) !!}

                <div class="mb-4">
                    {!! Form::label('city_id', 'Ciudad', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::select('city_id', $cities, $address->city->id, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('city_id')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('address', 'Dirección', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::textarea('address', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('address')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('phone', 'Telefono', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::text('phone', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('phone')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

      
                <div class="mb-4">
                    {!! Form::label('payment_type_id', 'Formas de pago', ['class' => 'font-bold text-lg']) !!}
                    @foreach ($payment_type as $type)
                        <div>
                            <label for="">
                                {!! Form::checkbox('payments[]', $type->id, null, ['class' => 'mr-1']) !!}        
                                {{$type->name}}
                            </label>
                        </div>                  
                    @endforeach
               
                    @error('categories')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror

                </div>

                <div class="mb-4">
                    {!! Form::label('open', 'Hora de apertura', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::time('open', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('open')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('closed', 'Hora de cierre', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::time('closed', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('closed')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mx-auto mt-10" id="mapid" style="width:800px; height: 600px;"></div>

                <div class="mb-4">
                    {!! Form::label('latitude', 'Latitud', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::text('latitude', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('latitude')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('longitude', 'Longitud', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::text('longitude', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('longitude')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('file', 'Imagen de la sucursal', ['class' => 'font-bold text-lg']) !!}
                    @if ($address->image_address)
                        <img class="h-60 w-60 object-cover" src="{{Storage::url($address->image_address->url)}}" alt="">
                    @else
                        <img class="h-60 w-60 object-cover" src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                    @endif

                    {!! Form::file('file', ['class' => 'form-input block w-full mt-1',  'accept' => 'image/*']) !!}
                   
                    @error('file')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                
                <div class="flex justify-between">
                    <a href="{{route('admin.company-addresses', $address->company->id)}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Editar direccion', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


    <script> 
        var textlatitude = document.getElementById('latitude');
        var textlongitude = document.getElementById('longitude');

        console.log(textlatitude);
        console.log(textlongitude);
       
        var mymap = L.map('mapid').setView([textlatitude.value, textlongitude.value], 16);
    
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoiem91bGRyYSIsImEiOiJja3BlZDh3Z3owMGlqMnBuaG9ocXk5bTVjIn0.s_rgPnIC7Z7TZuXA9I9UAg', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }).addTo(mymap);

        
        var greenIcon = L.icon({
            iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-green.png',
            shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',

            iconSize:     [38, 95], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var marker = L.marker([textlatitude.value, textlongitude.value], {icon: greenIcon}).addTo(mymap);

        mymap.on('click', function(e) {
            
            mymap.removeLayer(marker);
            textlatitude.value = e.latlng.lat.toFixed(6);
            textlongitude.value = e.latlng.lng.toFixed(6);

            marker =  L.marker(e.latlng, {icon: greenIcon}).addTo(mymap);
        });
    </script>
</x-app-layout>