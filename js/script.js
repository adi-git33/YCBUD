$(document).ready(function () {
    $("#part2").hide();
    $("#artSelection").hide();
    $('#circle1 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
    $("#nextButton").click(function (event) {
        $("#part1").css("display", "none");
        $("#part2").css("display", "flex");
        $('#circle1 text').css({ 'fill': '#000', 'font-size': '20px' });
        $('#circle2 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
        event.preventDefault();
        return false;

    });

    let choosenCategories = [];
    $('.categoriesLi').click(function () {
        let clickedItem = $(this).text();
        choosenCategories.push(clickedItem);
        let SeperatedCat = choosenCategories.join(', ');
        $('.cat').val(SeperatedCat);
        $(this).hide();
    });

    $("#allowArt").click(function () {
        if ($("#allowArt").prop('checked')) {
            $("#artSelection").show();
        } else {
            $("#artSelection").hide();
        }
    });

    $("#backButton").click(function (event) {
        $("#part1").css("display", "flex");
        $("#part2").css("display", "none");
        $('#circle1 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
        $('#circle2 text').css({ 'fill': '#000', 'font-size': '20px' });
        event.preventDefault();
        return false;
    });

    $(".srch").click(function () {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
    });

    let liked = false;
    $("#likeButton").click(function () {
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
    });

    $('#cmnt').on('input', function () {
        let cmntVal = $(this).val();
        if (cmntVal.trim() !== '') {
            $('#sbmcm').prop('disabled', false);
            $('#sbmcm').css("opacity", "1");
        } else {
            $('#sbmcn').prop('disabled', true);
            $('#sbmcm').css("opacity", "0.5");
        }
    });


    let cmnOn = false;
    let mediaQuery = window.matchMedia('(max-width:1023px)');

    $("#cmntBtmMobile").click(function(){
        if(cmnOn){
            $("#cmntBtmMobile").addClass('cmntBtmMobUnSel');
            $("#cmntBtmMobile").removeClass('cmntBtmMobSel');
            cmnOn = false;
            if(mediaQuery.matches){
                $('.commentSection').removeClass('commentSectionShow');
            }
        }else{
            $("#cmntBtmMobile").addClass('cmntBtmMobSel');
            $("#cmntBtmMobile").removeClass('cmntBtmMobUnSel');
            cmnOn = true;
            if(mediaQuery.matches){
                $('.commentSection').addClass('commentSectionShow');
            }
        }
    });


    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    $("#part1").css("display", "flex");
                    $("#part2").css("display", "none");
                    $('#circle1 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
                    $('#circle2 text').css({ 'fill': '#000', 'font-size': '20px' });
                }

                form.classList.add('was-validated')
            }, false)
        });

});