
var punkts = "";
var words = [];
var words2 = [];
var punktsAt = "";
function setPunkt(punkt,punktsAt2,bool) {
    //alert(punktsAt2);
    if (bool == "false") {
        punkts = punkt;
        punktsAt = punktsAt2;
        $("#punkt").text(punkts);
    }
    else {
        punkts = parseInt(punkts);
        punktsAt2 = parseInt(punktsAt2);
        punktsAt = punkts + punktsAt2;
        punkts = punktsAt;
        $("#punkt").text(punktsAt);
    }
}
function loadNewGame(page,id) {
    switch (page) {
        case 'page1': loadPage1();
            break;
        case 'page2': loadPage2(id);
            break;
        
    }
}
function loadNextGame(page,id) {
    switch (page) {
        case 'page1': loadPage1(true);
            break;
        case 'page2': loadPage2(id,true);
            break;
        
    }
}

function loadPage1(bool = false) {
    $("#page").html($("#page1").html()).animate();
}

function loadPage2(id,bool = false) {

    $.ajax({
        url : urlArray[0],
            method : "get",
            data : 
              "&id=" + id +  "&bool="  + bool
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
    for(i=0;i < word.length;i++) {
        words[i] = word[i].toUpperCase();
        if (word[i] == " ") {
            //words2[i] = true;
            string += "<div class='empty'>&nbsp;</div>";
        }
        else {
            words2[i] = false;
            string += "<div class='char'>&nbsp;</div>";
        }
        
    } 
    
    $("#word").html(string);
}

