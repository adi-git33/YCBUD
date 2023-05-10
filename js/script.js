$(document).ready(function () {
    $("#nextButton").click(function () {
        debugger
        $("#part1").css("display", "none");
        $("#part2").css("display" ,"block");
    });

    $("#backButton").click(function(){
        $("#part2").addClass("hide").removeClass("show");
        $("#part1").removeClass("hide").addClass("show");
    });

    $(".srch").click(function () {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
    });
});

