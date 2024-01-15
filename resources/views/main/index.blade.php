@extends('main.main')
@section('content')
    <div id='menu'>
        @include ('main.menu')
    </div>
    <div id='page' class="page">
        <div class="button" id="newGame">
            <button class="button-newGame" onclick="loadPage1()">ROZPOCZNIJ NOWĄ GRĘ</button>
        </div>
    </div>
    <div id='page1' style='display: none;' class="page">
        <div class='center-title'><span class='message'>WYBIERZ KATEGORIĘ</span></div>
        <div class="button">
            <div class="button-selectCategory space button-selectCategory-1"  onclick="loadNewGame('page2',0)">WSZYSTKIE CATEGORIE + 20000 ptk</div>
            <div style="float: left; " class="scroll-y ">
             <div class="container">
              <div class="row">
                  
                    @foreach ($category as $cat)
                    <div class="col-xl-4 col-sm-6 col-md-4  ">
                         @if (strlen($cat->category) > 21 )
                            <div class=" button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNewGame('page2',{{$cat->id}})"><span class="font-verysmall" id="iteration_{{$cat->id}}" >{{$cat->category}} + {{$cat->punkt}} ptk</span></div>

                        @elseif (strlen($cat->category) > 15 )
                            <div class=" button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNewGame('page2',{{$cat->id}})"><span class="font-small" id="iteration_{{$cat->id}}">{{$cat->category}} + {{$cat->punkt}} ptk</span></div>

                        @elseif (strlen($cat->category) > 9 )
                            <div class="button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNewGame('page2',{{$cat->id}})"><span class="font-normal" id="iteration_{{$cat->id}}">{{$cat->category}} + {{$cat->punkt}} ptk</span></div>


                        @else
                            <div class="button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNewGame('page2',{{$cat->id}})"><span class="font-large" id="iteration_{{$cat->id}}">{{$cat->category}} + {{$cat->punkt}} ptk</span></div>
                        @endif


                    </div>
                    @endforeach
              </div>
             </div>
            </div>
        </div>        
    </div>





@include ('include.url')
@endsection