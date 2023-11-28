<div id='page1' style='display: block;' class="page">
        <div class='center-title'><span class='message'>WYBIERZ KATEGORIĘ</span></div>
        <div class="button">
           <div class="button-selectCategory space button-selectCategory-1"  onclick="loadNextGame('page2')">WSZYSTKIE CATEGORIE</div>
            <div style="float: left; " class="scroll-y ">
              <div class="row">
                  
                    @foreach ($category as $cat)
                    <div class="col-xl-4 col-sm-6 col-md-1  ">
                         @if (strlen($cat->category) > 21 )
                            <div class=" button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNextGame('page2',{{$cat->id}})"><span class="font-verysmall" id="iteration_{{$cat->id}}" >{{$cat->category}}</span></div>

                        @elseif (strlen($cat->category) > 15 )
                            <div class=" button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNextGame('page2',{{$cat->id}})"><span class="font-small" id="iteration_{{$cat->id}}">{{$cat->category}}</span></div>

                        @elseif (strlen($cat->category) > 9 )
                            <div class="button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNextGame('page2',{{$cat->id}})"><span class="font-normal" id="iteration_{{$cat->id}}">{{$cat->category}}</span></div>


                        @else
                            <div class="button-selectCategory space button-selectCategory-{{rand(2,10)}} " onclick="loadNextGame('page2',{{$cat->id}})"><span class="font-large" id="iteration_{{$cat->id}}">{{$cat->category}}</span></div>
                        @endif


                    </div>
                    @endforeach
              </div>
            </div>
        </div>        
    </div>