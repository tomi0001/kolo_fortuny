<script>
    
    
    function loadPageNext(punkts) {
        licznikGier++;
        $.ajax({
            url : urlArray[1],
                method : "get",
                 data : 
              "&punkts=" + punkts + "&licznik=" + licznikGier
              + "&bool=true" 
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
        var string2 = "<div class='word2'>";
        for (i=0;i < string.length;i++) {
            if (words2[i] == true) {
                string2 += "<div class='char-select'>" + string[i] + "</div>";
            }
            else if (string[i] == " ") {
                 string2 += "</div><div class='empty'>&nbsp;</div><div class='word2'>";
            }
            else if (string[i] == char)  {
                string2 += "<div class='char-select2'>" + char + "</div>";
                
                words2[i] = true;
            }
            else {
                string2 += "<div class='char'>&nbsp;</div>";
            }
        }
        string2 += "</div>";
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
        if (punkts < 50) {
            $(".button-four").attr("disabled",true);
            $(".button-four").removeClass("button-four").addClass("button-disable");
            //$(".button-one");
        }
        $("#punkt").text(punkts);
        $("#word").html(string2).fadeIn(4000);
    }
    function checkWord(word) {
        //word2 = word.toString().replace(/(\r\n|\n |\r)/gm, "");
        //words3 = words.toString().replace(/(\r\n|\n |\r)/gm, "");
        const regexp = /[^a-z0-9ąęóćśńźłż]/ig;
        word2 = word.replaceAll(regexp, '');
        words3 = words.toString().replaceAll(regexp, '');
        //word2 = words.toArray();
        //words3 = words.toArray();
        //alert(word2.toString());
        if (word2.length != words3.length) {
            return false;
        }
        
        for (i=0;i < word2.length;i++) {
            //if ()
            //alert('sdfsf');
//            if (word[i] == " " || word[i] == "\n" || word[i] == "\t" || word[i] == "." || word[i] == "," || 
//            words[i] == " " || words[i] == "\n" || words[i] == "\t" || words[i] == "." || words[i] == ","  ) {
//                continue;
//            }
            if (word2[i].toUpperCase() != words3[i]) {
                return false;
            }
        }
        return true;
    }
    function isEnd() {
        for (i=0;i < words.length;i++) {
            if (words2[i] == false) {
                return false;
            }
        }
        return true;
    }
    function selectWord() {
        var string  = words;
        var string2 = "<div class='word2'>";
        for (i=0;i < words2.length;i++) {
            if (words2[i] == true) {
                string2 += "<div class='char-select'>" + string[i] + "</div>";
            }
            else if (string[i] == " ") {
                 string2 += "</div><div class='empty'>&nbsp;</div><div class='word2'>";
            }
            else   {
                string2 += "<div class='char-select2'>" + words[i] + "</div>";
                
                words2[i] = true;
            } 
        }
        //punkt = parseInt(punkt);
        //punkts = punkts -  punkt;
        string2 += "</div>";
        //$("#punkt").text(punkts);
        $("#word").html(string2).fadeIn(4000);
    }
    function winner() {
        
        var winner = 0;
        $("#winner").fadeIn(1000);
        
        $("#winner").addClass("winner");
        for (i=punktsWinnerArray.length;i >= 0;i--) {
            if (parseInt(punkts) + parseInt(punktsAt) >= punktsWinnerArray[i]) {
                punktsWinner =  punktsWinnerArray[i];
                //alert(punktsWinner);
                break;
            }
        }
        //alert(punktsAt);
        punktSum = parseInt(punkts) + parseInt(punktsAt);
        punkts = punktSum;
        $("#winner").html("Wygrałeś " + punktSum + " ptk gwarantowane " + punktsWinner + " ptk");
        $("#punkt").text(punkts);
        
    }
    function gameEnd() {
        $("#winner").fadeIn(1000);
        $("#winner").addClass("gameOver");
        $("#winner").html("Koniec gry wygrałeś <br>" + punktsWinner + " ptk<br> <a class='new-game'  href='javascript:location.reload()'><div class='new-game'>Nowa gra</div></a>");
        
    }
    function gameEndWinner() {
        $("#winner").fadeIn(1000);
        $("#winner").addClass("winner");
        $("#winner").html("Koniec gry wygrałeś <br>" + punkts + " ptk <br> <a  class='new-game' href='javascript:location.reload()'><div class='new-game'>Nowa gra</div></a>");
    }
    function gameEndQestions() {
                var bool2 = confirm("Czy na pewno zrezygnowac z gry");
                if (bool2 == true) {
                     gameEndWinner();
                }
    }
    showHideWord('{{$wordl->name}}');
    //if ('{{$bool}}' == "false") {
    setPunkt(1000,'{{$wordl->punkt}}','{{$bool}}');   
    //}
    //else {
        //setPunkt(,true);   
    //}
    $(document).ready(function () {
        $("#page").toggleClass("page page-at");
        
   
        
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
        $(document).on("click", function(e){
            if($(e.target).is(".button-three")){
        $('#char-three').fadeIn(1000);

            }else if ($(e.target).is("#wordText")) {
            }
            else {
                $('#char-three').fadeOut(500);
            }

        });
        $(document).on("click", function(e){
            if($(e.target).is(".button-four")){
        $('#char-four').fadeIn(1000);

            }else{
                $('#char-four').fadeOut(1000);
            }

        });

        $(".char-on").click(function() {
           if ($(this).hasClass("char-blue")) {
               searchWord($(this).text(),80);
           }
           else if($(this).hasClass("char-yellow")) {
               searchWord($(this).text(),50);
           }
           else if ($(this).hasClass("char-green")){
               searchWord($(this).text(),150);
           }
           
           $(this).addClass("char-off");
           $(this).addClass("char-color-off");
           $(this).removeClass("char-on");
           $(this).removeClass("char-blue");
           $(this).removeClass("char-green");
           $(this).removeClass("char-yellow");
           if (isEnd()) {
               winner();
               setTimeout(loadPageNext,3000);
               
           }
        });
        
        $("#buttonFinish").click(function() {
            var bool = checkWord($("#wordText").val());
            if (bool == true) {
                selectWord();
                winner();
                setTimeout(loadPageNext,3000);
                
            }
            else {
                 selectWord();
                 gameEnd();
            }
        });
} );
</script>
@if ($allCategories == 1)
    <div class="category">WSZYSTKIE KATEGORIE</div>
@else
    <div class="category">{{$nameCategory}}</div>
@endif

<div id="word"></div>




<div class="down">
    <div class="punkt">
        <span class="punkt">PUNKTY:</span> <span id="punkt" class="punkt"></span> <span class="punkt">ptk</span><br>
        <span class="punkt">  DO ZDOBYCIA: {{$wordl->punkt}} ptk</span> 
    </div>
    <div class="button-div">
        
        <button class="button-bye button-four">KUPUJE CYFRĘ -50 ptk</button>

        <button class="button-bye button-one">KUPUJE SPÓŁGŁOSKĘ -80 ptk</button>
            
        <button class="button-bye button-two">KUPUJE SAMOGŁOSKĘ -150 ptk</button>
            
        <button class="button-bye button-three">ZGADUJE HASŁO</button>
            
        <button class="button-bye button-five" onclick="gameEndQestions()">ZREZYGNUJ Z GRY</button>
         
    </div>
    
</div>
<div id="char-four">
    <div class="char-on char-type char-yellow">0</div>
    <div class="char-on char-type char-yellow">1</div>
    <div class="char-on char-type char-yellow">2</div>
    <div class="char-on char-type char-yellow">3</div>
    <div class="char-on char-type char-yellow">4</div>
    <div class="char-on char-type char-yellow">5</div>
    <div class="char-on char-type char-yellow">6</div>
    <div class="char-on char-type char-yellow">7</div>
    <div class="char-on char-type char-yellow">8</div>
    <div class="char-on char-type char-yellow">9</div>


</div>
<div id="char-one">
    <div class="char-on char-type char-blue">Q</div>
    <div class="char-on char-type char-blue">W</div>
    <div class="char-on char-type char-off char-color-off">E</div>
    <div class="char-on char-type char-off char-color-off">Ę</div>
    <div class="char-on char-type char-blue">R</div>
    <div class="char-on char-type char-blue">T</div>
    <div class="char-on char-type char-off char-color-off">Y</div>
    <div class="char-on char-type char-off char-color-off">U</div>
    <div class="char-on char-type char-off char-color-off">I</div>
    <div class="char-on char-type char-off char-color-off">O</div>
    <div class="char-on char-type char-off char-color-off">Ó</div>
    <div class="char-on char-type char-blue">P</div>
    <div class="break"></div>
    <div class="char-on char-type char-off char-color-off">A</div>
    <div class="char-on char-type char-off char-color-off">Ą</div>
    <div class="char-on char-type char-blue">S</div>
    <div class="char-on char-type char-blue">Ś</div>
    <div class="char-on char-type char-blue">D</div>
    <div class="char-on char-type char-blue">F</div>
    <div class="char-on char-type char-blue">G</div>
    <div class="char-on char-type char-blue">H</div>
    <div class="char-on char-type char-blue">J</div>
    <div class="char-on char-type char-blue">K</div>
    <div class="char-on char-type char-blue">L</div>
    <div class="char-on char-type char-blue">Ł</div>
    <div class="break"></div>
    <div class="half-div"></div>
    <div class="char-on char-type char-blue">Z</div>
    <div class="char-on char-type char-blue">Ż</div>
    <div class="char-on char-type char-blue">Ź</div>
    <div class="char-on char-type char-blue">X</div>
    <div class="char-on char-type char-blue">C</div>
    <div class="char-on char-type char-blue">Ć</div>
    <div class="char-on char-type char-blue">V</div>
    <div class="char-on char-type char-blue">B</div>
    <div class="char-on char-type char-blue">N</div>
    <div class="char-on char-type char-blue">Ń</div>
    <div class="char-on char-type char-blue">M</div>
</div>

<div id="char-two">
    <div class="char-on char-type char-off char-color-off">Q</div>
    <div class="char-on char-type char-off char-color-off">W</div>
    <div class="char-on char-type char-green">E</div>
    <div class="char-on char-type char-green">Ę</div>
    <div class="char-on char-type char-off char-color-off">R</div>
    <div class="char-on char-type char-off char-color-off">T</div>
    <div class="char-on char-type char-green">Y</div>
    <div class="char-on char-type char-green">U</div>
    <div class="char-on char-type char-green">I</div>
    <div class="char-on char-type char-green">O</div>
    <div class="char-on char-type char-green">Ó</div>
    <div class="char-on char-type char-off char-color-off">P</div>
    <div class="break"></div>
    <div class="char-on char-type char-green">A</div>
    <div class="char-on char-type char-green">Ą</div>
    <div class="char-on char-type char-off char-color-off">S</div>
    <div class="char-on char-type char-off char-color-off">Ś</div>
    <div class="char-on char-type char-off char-color-off">D</div>
    <div class="char-on char-type char-off char-color-off">F</div>
    <div class="char-on char-type char-off char-color-off">G</div>
    <div class="char-on char-type char-off char-color-off">H</div>
    <div class="char-on char-type char-off char-color-off">J</div>
    <div class="char-on char-type char-off char-color-off">K</div>
    <div class="char-on char-type char-off char-color-off">L</div>
    <div class="char-on char-type char-off char-color-off">Ł</div>
    <div class="break"></div>
    <div class="half-div"></div>
    <div class="char-on char-type char-off char-color-off">Z</div>
    <div class="char-on char-type char-off char-color-off">Ż</div>
    <div class="char-on char-type char-off char-color-off">Ź</div>
    <div class="char-on char-type char-off char-color-off">X</div>
    <div class="char-on char-type char-off char-color-off">C</div>
    <div class="char-on char-type char-off char-color-off">Ć</div>
    <div class="char-on char-type char-off char-color-off">V</div>
    <div class="char-on char-type char-off char-color-off">B</div>
    <div class="char-on char-type char-off char-color-off">N</div>
    <div class="char-on char-type char-off char-color-off">Ń</div>
    <div class="char-on char-type char-off char-color-off">M</div>


</div>

<div id="char-three">
    <textarea id="wordText" class="form-control" placeholder="Wpisz hasło"></textarea><br>
    <button class="button-word button-word-three" id="buttonFinish">ZGADUJE</button>
</div>

<div id="winner">
    
</div>