$(document).ready(function () {
    $("#part2").hide();
    $("#artSelection").hide();
    $("#nextButton").click(function () {
        $("#part1").css("display", "none");
        $("#part2").css("display" ,"flex");
    });

    let choosenCategories = [];
    $('li').click(function(){
        let clickedItem = $(this).text();
        choosenCategories.push(clickedItem);
        let SeperatedCat = choosenCategories.join(', ');
        $('#cat').val(SeperatedCat);
        $(this).hide();
    })

    $("#allowArt").click(function(){
        if($("#allowArt").prop('checked')){
            $("#artSelection").show();
        }
        else{
        $("#artSelection").hide();
        }
    })

    $("#backButton").click(function(){
        $("#part1").css("display", "flex");
        $("#part2").css("display" ,"none");
    });

    $(".srch").click(function () {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
    });
});

