$(document).ready(function () {
    $("#part2").hide();
    $("#nextButton").click(function () {
        $("#part1").css("display", "none");
        $("#part2").css("display" ,"flex");
    });

    $("#backButton").click(function(){
        $("#part1").css("display", "flex");
        $("#part2").css("display" ,"none");
    });

    $(".srch").click(function () {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
    });
});

