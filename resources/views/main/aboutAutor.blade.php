@extends('main.main')
@section('content')
    <div id='menu'>
        @include ('main.menu')
    </div>
    <div id='page' class="page-autor">
        <span class='autor'>Autor gry kontakt -</span> <span class='mail'> tomi0001@gmail.com</span>
        <a href="{{route('main')}}" style="text-decoration: none;"><div class='link-menu-main'>MENU GŁÓWNE</div></a>
    </div>
    
@endsection