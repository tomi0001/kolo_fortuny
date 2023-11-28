<script>
    
    
    function loadPageNext(punkts) {

        $.ajax({
            url : urlArray[1],
                method : "get",
                 data : 
              "&punkts=" + punkts 
            ,
                 
                dataType : "html",

        })
        .done(function(response) {
            $("#page").html(response);



        })

        .fail(function() {
            $("#page2").html( "<div class='ajaxError'>Wystąpił błąd</div>" );
        })
        //$("#page").html($("#page2").html()).animate();
    }
    
    function searchWord(char,punkt) {
        var string  = words;
        var string2 = "";
        for (i=0;i < string.length;i++) {
            if (words2[i] == true) {
                string2 += "<div class='char'>" + string[i] + "</div>";
            }
            else if (string[i] == " ") {
                 string2 += "<div class='empty'>&nbsp;</div>";
            }
            else if (string[i] == char)  {
                string2 += "<div class='char'>" + char + "</div>";
                
                words2[i] = true;
            }
            else {
                string2 += "<div class='char'>&nbsp;</div>";
            }
        }
        punkt = parseInt(punkt);
        punkts = punkts -  punkt;
        if (punkts < 150) {
            $(".button-two").attr("disabled",true);
            $(".button-two").removeClass("button-two").addClass("button-disable");
            //$(".button-two");
        }
        if (punkts < 80) {
            $(".button-one").attr("disabled",true);
            $(".button-one").removeClass("button-one").addClass("button-disable");
            //$(".button-one");
        }
        $("#punkt").text(punkts);
        $("#word").html(string2);
    }
    function isEnd() {
        for (i=0;i < words.length;i++) {
            if (words2[i] == false) {
                return false;
            }
        }
        return true;
    }
    showHideWord('{{$wordl->name}}');
    //if ('{{$bool}}' == "false") {
    setPunkt(1000,'{{$wordl->punkt}}','{{$bool}}');   
    //}
    //else {
        //setPunkt(,true);   
    //}
    $(document).ready(function () {
        $(document).on("click", function(e){
            if($(e.target).is(".button-one")){
        $('#char-one').fadeIn(1000);

            }else{
                $('#char-one').fadeOut(1000);
            }

        });

        $(document).on("click", function(e){
            if($(e.target).is(".button-two")){
        $('#char-two').fadeIn(1000);

            }else{
                $('#char-two').fadeOut(1000);
            }

        });

        $(".char-on").click(function() {
           if ($(this).hasClass("char-blue")) {
               searchWord($(this).text(),80);
           }
           else {
               searchWord($(this).text(),150);
           }
           
           $(this).addClass("char-off");
           $(this).addClass("char-color-off");
           $(this).removeClass("char-on");
           $(this).removeClass("char-blue");
           $(this).removeClass("char-green");
           if (isEnd()) {
               setTimeout(loadPageNext,3000)
           }
        });
} );
</script>

<div class="category">{{$wordl->category}}</div>
<div id="word"></div>




<div class="down">
    <div class="punkt">
        <span class="punkt">PUNKTY:</span> <span id="punkt" class="punkt"></span> <span class="punkt">ptk</span><br>
        <span class="punkt">  DO ZDOBYCIA: {{$wordl->punkt}} ptk</span> 
    </div>
    <div class="button-div">
        <button class="button-bye button-one">KUPUJE SPÓŁGŁOSKĘ -80 ptk</button>
        <button class="button-bye button-two">KUPUJE SAMOGŁOSKĘ -150 ptk</button>
        <button class="button-bye button-three">ZGADUJE HASŁO</button>
    </div>
    
</div>

<div id="char-one">
    <div class="char-on char-type char-blue">W</div>
    <div class="char-on char-type char-blue">R</div>
    <div class="char-on char-type char-blue">T</div>
    <div class="char-on char-type char-blue">P</div>
    <div class="char-on char-type char-blue">S</div>
    <div class="char-on char-type char-blue">D</div>
    <div class="char-on char-type char-blue">F</div>
    <div class="char-on char-type char-blue">G</div>
    <div class="char-on char-type char-blue">H</div>
    <div class="char-on char-type char-blue">J</div>
    <div class="char-on char-type char-blue">K</div>
    <div class="char-on char-type char-blue">L</div>
    <div class="char-on char-type char-blue">Ł</div>
    <div class="char-on char-type char-blue">Z</div>
    <div class="char-on char-type char-blue">X</div>
    <div class="char-on char-type char-blue">C</div>
    <div class="char-on char-type char-blue">V</div>
    <div class="char-on char-type char-blue">B</div>
    <div class="char-on char-type char-blue">N</div>
    <div class="char-on char-type char-blue">M</div>
    <div class="char-on char-type char-blue">Ś</div>
    <div class="char-on char-type char-blue">Ń</div>
    <div class="char-on char-type char-blue">Ż</div>
    <div class="char-on char-type char-blue">Ź</div>
    <div class="char-on char-type char-blue">Ć</div>
</div>

<div id="char-two">
    <div class="char-on char-type char-green">Q</div>
    <div class="char-on char-type char-green">E</div>
    <div class="char-on char-type char-green">Y</div>
    <div class="char-on char-type char-green">U</div>
    <div class="char-on char-type char-green">I</div>
    <div class="char-on char-type char-green">O</div>
    <div class="char-on char-type char-green">A</div>
    <div class="char-on char-type char-green">Ą</div>
    <div class="char-on char-type char-green">Ę</div>
    <div class="char-on char-type char-green">Ó</div>


</div>