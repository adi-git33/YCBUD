$(document).ready(function(){
    $("#nextButton").click = function(event){
        event.PreventDefault();
        // $("#part1").hide();
        $("#part1").addClass("hide");
        $("#part2").removeClass("hide");
    }

    $("#backButton").click = function(event){
        event.PreventDefault();
        // $("#part2").hide();
        $("#part2").addClass("hide");
        
        // $("#part1").show();
        $("#part1").removeClass("hide");

    }
})

