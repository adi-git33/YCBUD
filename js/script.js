$(document).ready(function() {
    $("#part2").hide();
    $("#artSelection").hide();
    $('#circle1 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
    $("#nextButton").click(function(event) {
        $("#part1").css("display", "none");
        $("#part2").css("display", "flex");
        $('#circle1 text').css({ 'fill': '#000', 'font-size': '20px' });
        $('#circle2 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
        event.preventDefault();
        return false;

    });

    let choosenCategories = [];
    $('.categoriesUl').click(function() {
        let clickedItem = $(this).text();
        choosenCategories.push(clickedItem);
        let SeperatedCat = choosenCategories.join(', ');
        $('#cat').val(SeperatedCat);
        $(this).hide();
    });

    $("#allowArt").click(function() {
        if ($("#allowArt").prop('checked')) {
            $("#artSelection").show();
        } else {
            $("#artSelection").hide();
        }
    });

    $("#backButton").click(function(event) {
        $("#part1").css("display", "flex");
        $("#part2").css("display", "none");
        $('#circle1 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
        $('#circle2 text').css({ 'fill': '#000', 'font-size': '20px' });
        event.preventDefault();
        return false;
    });

    $(".srch").click(function() {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
    });

    let liked = false;
    $("#likeButton").click(function() {
        let count = $("#likesCount").text();
        if (liked) {
            count--;
            $("#likesCount").text(count);
            $("#likeButton").removeClass("Liked");
            $("#likeButton").addClass("Like");
            liked = false;
        } else {
            count++;
            $("#likesCount").text(count);

            $("#likeButton").addClass("Liked");
            $("#likeButton").removeClass("Like");
            liked = true;
        }
    })
    
    let humOpen = false;
    $('.ham').click(function() {
        if(humOpen){
            $('#hamburger-con').css("transform","translateX(-100%)");
            $('.ham').css("transform","translateX(0)");
            humOpen = false;
        }
        else{
            $('#hamburger-con').css("transform","translateX(0)");
            $('.ham').css("transform","translateX(1400%)");
            humOpen = true;
        }
      });
});