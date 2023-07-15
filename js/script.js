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

    // search post
    $(".srch").click(function() {
        $(this).css("display", "none");
        $(".form-control").css("display", "block");
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
    const Bursa = { lat: 32.083947, lng: 34.800791 };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: Azrieli,
    });

    // const contentString =
    //     '<div id="content">' +
    //     '<div id="siteNotice">' +
    //     "</div>" +
    //     '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
    //     '<div id="bodyContent">' +
    //     "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
    //     "sandstone rock formation in the southern part of the " +
    //     "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
    //     "south west of the nearest large town, Alice Springs; 450&#160;km " +
    //     "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
    //     "features of the Uluru - Kata Tjuta National Park. Uluru is " +
    //     "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
    //     "Aboriginal people of the area. It has many springs, waterholes, " +
    //     "rock caves and ancient paintings. Uluru is listed as a World " +
    //     "Heritage Site.</p>" +
    //     '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
    //     "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
    //     "(last visited June 22, 2009).</p>" +
    //     "</div>" +
    //     "</div>";

    let azString = "";
    let dizString = "";

    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: "Azrieli",
    });
    const azMarker = new google.maps.Marker({
        position: Azrieli,
        map,
        title: "Azrieli Billboard",
    });

    const dizMarker = new google.maps.Marker({
        position: Dizingof,
        map,
        title: "Dizingof Billborad",
    });

    azMarker.addListener("click", () => {
        infowindow.open({
            anchor: azMarker,
            map,
        });
    });

    dizMarker.addListener("click", () => {
        infowindow.open({
            anchor: marker,
            map,
        });
    });
}