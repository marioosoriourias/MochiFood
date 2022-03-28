<div>
    {{-- SLIDER --}}
    {{-- BARRA DE NAVEGACION --}}

    @livewire('user.navigation-menu', ['select_city' => '1'])

    @include('user.slider')

    @livewire('user.food-type')

</div>