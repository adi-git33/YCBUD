$(document).ready(function(){
    $("#nextButton").click(function(){
        debugger
        // $("#part1").addClass("hide");
        $("#part1").css("display", "none");

        // $("#part2").removeClass("hide");
        $("#part2").css("display" ,"block");


        // event.PreventDefualt();
    });

    $("#backButton").click(function(){
        // $("#part2").addClass("hide");
        $("#part2").css("display", "none");

        // $("#part1").removeClass("hide");
        $("#part1").css("display", "block");

        // event.PreventDefualt();
    });
});

