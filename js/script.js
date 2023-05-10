$(document).ready(function () {
    $("#nextButton").click(function () {
        debugger
        $("#part1").addClass("hide").removeClass("show");
        $("#part2").removeClass("hide").addClass("show");
    });

    $("#backButton").click(function () {
        $("#part2").addClass("hide").removeClass("show");
        $("#part1").removeClass("hide").addClass("show");
    });

    $(".srch").click(function () {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
    });
});

