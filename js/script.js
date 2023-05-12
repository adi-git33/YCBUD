$(document).ready(function () {
    $("#part2").hide();
    $("#artSelection").hide();
    $('#1stCircle text').css({'fill':'#9d261d','font-size':'24px'});
    $("#nextButton").click(function (event) {
        $("#part1").css("display", "none");
        $("#part2").css("display" ,"flex");
        $('#1stCircle text').css({'fill':'#000','font-size':'20px'});
        $('#2ndCircle text').css({'fill':'#9d261d','font-size':'24px'});
        event.preventDefault();
        return false;

    });

    let choosenCategories = [];
    $('.categoriesLi').click(function(){
        let clickedItem = $(this).text();
        choosenCategories.push(clickedItem);
        let SeperatedCat = choosenCategories.join(', ');
        $('#cat').val(SeperatedCat);
        $(this).hide();
    });

    $("#allowArt").click(function(){
        if($("#allowArt").prop('checked')){
            $("#artSelection").show();
        }
        else{
        $("#artSelection").hide();
        }
    });

    $("#backButton").click(function(event){
        $("#part1").css("display", "flex");
        $("#part2").css("display" ,"none");
        $('#1stCircle text').css({'fill':'#9d261d','font-size':'24px'});
        $('#2ndCircle text').css({'fill':'#000','font-size':'20px'});
        event.preventDefault();
        return false;
    });

    $(".srch").click(function () {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
    });
    
    let liked = false;
    $("#likeButton").click(function(){
        if(liked){
            $("#likesCount").text("0");
            $("#likeButton").removeClass("Liked");
            $("#likeButton").addClass("Like");
            liked = false;
        }
        else {
            $("#likesCount").text("1");
            $("#likeButton").addClass("Liked");
            $("#likeButton").removeClass("Like"); 
            liked = true;
        }
    })
});

