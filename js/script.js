$(document).ready(function(){
    $("#nextButton").click(function(){
        debugger
        $("#part1").css("display", "none");
        $("#part2").css("display" ,"block");
    });

    $("#backButton").click(function(){
        $("#part2").css("display", "none");
        $("#part1").css("display", "block");
    });
});

