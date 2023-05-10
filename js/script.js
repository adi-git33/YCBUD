$(document).ready(function(){
    $("#nextButton").click(function(){
        debugger
        $("#part1").addClass("hide");
        $("#part2").removeClass("hide");
        // event.PreventDefualt();
    });

    $("#backButton").click(function(){
        $("#part2").addClass("hide");
        $("#part1").removeClass("hide");
        // event.PreventDefualt();
    });
});

