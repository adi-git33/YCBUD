$(document).ready(function() {

    // newPost next
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

    // Choosing Categories
    let choosenCategories = [];
    $('.categoriesLi').click(function() {
        let clickedItem = $(this).text();
        choosenCategories.push(clickedItem);
        let SeperatedCat = choosenCategories.join(', ');
        $('.cat').val(SeperatedCat);
        $(this).hide();
    });

    // Allow art in Post
    $("#allowArt").click(function() {
        if ($("#allowArt").prop('checked')) {
            $("#artSelection").show();
        } else {
            $("#artSelection").hide();
        }
    });

    // back to part1
    $("#backButton").click(function(event) {
        $("#part1").css("display", "flex");
        $("#part2").css("display", "none");
        $('#circle1 text').css({ 'fill': '#9d261d', 'font-size': '24px' });
        $('#circle2 text').css({ 'fill': '#000', 'font-size': '20px' });
        event.preventDefault();
        return false;
    });

    // liked function
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
    });

    // comments mobile
    $('#cmnt').on('input', function() {
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

    $("#cmntBtmMobile").click(function() {
        if (cmnOn) {
            $("#cmntBtmMobile").addClass('cmntBtmMobUnSel');
            $("#cmntBtmMobile").removeClass('cmntBtmMobSel');
            cmnOn = false;
            if (mediaQuery.matches) {
                $('.commentSection').removeClass('commentSectionShow');
            }
        } else {
            $("#cmntBtmMobile").addClass('cmntBtmMobSel');
            $("#cmntBtmMobile").removeClass('cmntBtmMobUnSel');
            cmnOn = true;
            if (mediaQuery.matches) {
                $('.commentSection').addClass('commentSectionShow');
            }
        }
    });

    // form validation
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
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

    window.initMap = initMap;
});

// Map
function initMap() {
    const Azrieli = { lat: 32.074304, lng: 34.792095 };
    const Dizingof = { lat: 32.0753317, lng: 34.7748661 };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: Azrieli,
    });

    let azString = '<div class="bilbrd"><img src="/images/uploads/BringJusticeback.png" alt="bringJustice"><section><h6>Bringing Justice Back</h6><span>Art by ipsum loren</span><p>Azrieli Towers<br>Ipsum Loren</p></div>';
    let dizString = '<div class="bilbrd"><img src="/images/uploads/Rage.png" alt="bringJustice"><section><h6>Rage</h6><span>Art by ipsum loren</span><p>Dizingof Center<br>Ipsum Loren</p></section></div>';


    const azMarker = new google.maps.Marker({
        position: Azrieli,
        map,
        title: "Azrieli Billboard",
    });

    const azinfowindow = new google.maps.InfoWindow({
        content: azString,
        ariaLabel: "Azrieli",
    });

    azMarker.addListener("click", () => {
        azinfowindow.open({
            anchor: azMarker,
            map,
        });
    });

    const dizMarker = new google.maps.Marker({
        position: Dizingof,
        map,
        title: "Dizingof Billborad",
    });

    const dizinfowindow = new google.maps.InfoWindow({
        content: dizString,
        ariaLabel: "Azrieli",
    });

    dizMarker.addListener("click", () => {
        dizinfowindow.open({
            anchor: dizMarker,
            map,
        });
    });
}