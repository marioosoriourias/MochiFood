<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar nueva dirección</h1>       
            
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>['admin.addresses.store', $company], 'files' => true]) !!}

                <div class="mb-4">
                    {!! Form::label('city_id', 'Ciudad', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::select('city_id', $cities, 'null', ['class' => 'form-input block w-full mt-1']) !!}
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

                    @error('payments')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>



                <div class="mb-4">
                    {!! Form::label('service_id', 'Servicios', ['class' => 'font-bold text-lg']) !!}
                    @foreach ($services as $service)
                        <div>
                            <label for="">
                                {!! Form::checkbox('services[]', $service->id, null, ['class' => 'mr-1']) !!}        
                                {{$service->name}}
                            </label>
                        </div>                  
                    @endforeach

                    @error('services')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('open', 'Hora de apertura', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::time('open', '07:00', ['class' => 'form-input block w-full mt-1']) !!}
                    @error('open')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('closed', 'Hora de cierre', ['class' => 'font-bold text-lg']) !!}
                    {!! Form::time('closed', '19:00', ['class' => 'form-input block w-full mt-1']) !!}
                    @error('closed')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>


                <p class="bold text-lg"><strong>Coordenadas</strong></p>

                <div class="mt-2 mb-5 w-full" id="mapid" style="height: 500px;"></div>



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
                    {!! Form::file('file', ['class' => 'form-input block w-full mt-1', 'accept' => 'image/*']) !!}
                    @error('file')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                
                
                <div class="flex justify-between">
                    <a href="{{route('admin.company-addresses', $company)}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Agregar nueva direccion', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>

        var latitude = "25.792366";
        var longitude = "-108.989826";

        var mymap = L.map('mapid').setView([latitude, longitude], 16);
       
        var textlatitude = document.getElementById('latitude');
        var textlongitude = document.getElementById('longitude');
       
        
    
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoiem91bGRyYSIsImEiOiJja3BlZDh3Z3owMGlqMnBuaG9ocXk5bTVjIn0.s_rgPnIC7Z7TZuXA9I9UAg', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }).addTo(mymap);

        
        var greenIcon = L.icon({
            iconUrl: 'https://leafletjs.com/SlavaUkraini/examples/custom-icons/leaf-green.png',
            shadowUrl: 'https://leafletjs.com/SlavaUkraini/examples/custom-icons/leaf-shadow.png',

            iconSize:     [38, 95], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var marker = L.marker([latitude, longitude], {icon: greenIcon}).addTo(mymap);

        mymap.on('click', function(e) {
            mymap.removeLayer(marker);
            
            textlatitude.value = e.latlng.lat.toFixed(6);
            textlongitude.value = e.latlng.lng.toFixed(6);

            marker =  L.marker(e.latlng, {icon: greenIcon}).addTo(mymap);
        });
    </script>

</x-app-layout>