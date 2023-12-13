
var punkts = "";
var words = [];
var words2 = [];
var punktsAt = "";
var licznikGier = 1;
var punktsWinner = 0;
var punktsWinnerArray = [
  10000,
  25000,
  60000,
  100000,
  250000
];
function setPunkt(punkt,punktsAt2,bool) {
    //alert(bool);
    if (bool == "false") {
        punkts = punkt;
        punktsAt = parseInt(punktsAt2);
        $("#punkt").text(punkts);
    }
    else {
        punkts = parseInt(punkts);
        punktsAt = parseInt(punktsAt2);
        //punktsAt = punkts + punktsAt2;
        //punkts = punktsAt;
        $("#punkt").text(punkts);
    }
}
function loadNewGame(page,id) {

    switch (page) {
        case 'page1': loadPage2(0);
            break;
        case 'page2': loadPage2(id);
            break;
        
    }
}
function loadNextGame(page,id) {

    switch (page) {
        case 'page1': loadPage2(0,true);
            break;
        case 'page2': loadPage2(id,true);
            break;
        
    }
}

function loadPage1(bool = false) {
    //alert('sdfsdf');
    $("#newGame").css("display","none");
    $("#page").html($("#page1").html()).animate();
}

function loadPage2(id,bool = 'false') {
    if (id == 0) {
        var allCategories = 1;
    }
    else {
        var allCategories = 0;
    }
    $.ajax({
        url : urlArray[0],
            method : "get",
            data : 
              "&id=" + id +  "&bool="  + bool + "&allCategories=" + allCategories
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

function showHideWord(word) {
    let string = "";
    words2 = [];
    words = [];
    string = "<div class='word2'>";
    for(i=0;i < word.length;i++) {
        words[i] = word[i].toUpperCase();
        if (word[i] == " ") {
            //words2[i] = true;
            string += "</div><div class='empty'>&nbsp;</div><div class='word2'>";
        }
        else {
            words2[i] = false;
            string += "<div class='char'>&nbsp;</div>";
        }
        
    }
    string += "</div>";
    
    $("#word").html(string);
}

