
@extends('layouts.app')

@section('title', 'Antra užduotis')

@section('content')
    <div class="flex w-full">
        <div class="w-1/2 overflow-x-scroll">
            <p class="bg-red-200 text-center">Sąrašas<button id="switch" class="float-left">Pakeisti sąrašą</button></p>
            <span id="sarasas" class="hidden">@livewire('sarasas')</span>
            <span id="superSarasas">@livewire('super-sarasas')</span>
        </div>

        <div class="w-1/2">
            <p class="bg-green-200 text-center">Forma</p>
            @livewire('forma')
        </div>
    </div>
@push('scripts')
    <script>
        $('#switch').click(function(){
            $('#sarasas, #superSarasas').toggle();
        });
    </script>
@endpush
@stop

