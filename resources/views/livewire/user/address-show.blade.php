<div>

    <style>
        #mapid { height: 180px; }
    </style>

    @livewire('user.navigation-menu', ['select_city' => '0'])
   


    <div class="container">
  
        <div>
            @if (!$address->image_address)
                <img src="https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg" class="mt-10 object-cover max-h-80 w-full mx-auto" alt="">
            @else
                <img src="{{Storage::url($address->image_address->url)}}"  class="mt-10 object-cover max-h-80 w-full mx-auto" alt="">  
            @endif
        </div>

        <h1 class="text-4xl mt-12 mb-2">{{$address->company->name}}</h1>

        <div class="py-5 px-8 bg-white shadow-lg rounded-lg border-2 border-yellow-600">
            <p class="leading-7 text-xl"><strong>Direccion: </strong>{{$address->address}}</p>
            <p class="leading-7 text-xl"><span class="font-bold">Telefono: </span>{{$address->phone}}</p>
            <p class="leading-7 text-xl"><span class="font-bold">Horario: </span>{{substr($address->open, 0, 5) ." a ". substr($address->closed, 0, 5)}}</p>
            <p class="leading-7 text-xl"><span class="font-bold">Tipo de pago: </span>
                @foreach ($address->payments as $payment)
                    @if ($loop->first)
                        {{$payment->name}}
                    @else   
                        ,{{$payment->name}}
                    @endif
                @endforeach
            </p>
            <p class="leading-7 text-xl text-justify"><span class="font-bold">Servicio de comida: </span>
                @foreach ($address->services as $service)
                    @if ($loop->first)
                        {{$service->name}}
                    @else   
                    , {{$service->name}}
                    @endif
                @endforeach
            </p>
        </div>

        <hr class="my-14 w-full rounded-xl border-2" >


        <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  mt-10 gap-5">   
            @foreach ($images as $image)
                <a href="{{Storage::url($image->url)}}" data-lightbox="roadtrip" data-title="{{$image->description}}">
                    <img class="h-80 w-full object-cover" src="{{Storage::url($image->url)}}" alt="">
                    <p class="text-center text-xl">{{$image->name}}</p>
                </a>
            @endforeach 
        </div>

        <hr class="my-14 w-full rounded-xl border-2" >
    </div>

  

    <div class="mx-auto mt-10" id="mapid" style="width:800px; height: 600px;"></div>
    
    <script>

        var latitude = {!! json_encode($address->latitude) !!};
        var longitude = {!! json_encode($address->longitude) !!};

        var mymap = L.map('mapid').setView([latitude, longitude], 16);
    
    
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

        L.marker([latitude, longitude], {icon: greenIcon}).addTo(mymap);

        mymap.on('click', function(e) {
            alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        });
    </script>


</div>


