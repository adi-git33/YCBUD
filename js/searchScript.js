$(document).ready(function() {

    const sub = $("#sortAnd");
    const msub = $("#mFilter");
    const form = document.getElementById("search-aside");
    const list = $(".list");

    sub.on('click', function(e) {
        e.preventDefault();
        list.html("<span class='l'>Loading...<span>");
        savePost();
    })

    msub.on('click', function(e) {
        e.preventDefault();
        list.html("<span class='l'>Loading...<span>");
        savePost();
    })

    const savePost = async() => {
        try {
            debugger
            let response = await fetch('sortFilter.php', {
                method: 'POST',
                body: new FormData(form),
            });
            const result = await response.json();
            list.html(result.retVal);
        } catch (error) {
            console.log(error);
        }
    }

});