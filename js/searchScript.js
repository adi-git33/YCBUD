$(document).ready(function() {
    const sub = $("#sortAnd");
    const form = $("#search-aside");
    const list = $(".list");

    sub.on('click', function(e) {
        e.preventDefault();
        debugger
        list.html() = "<span class='l'>Loading<span>";
        savePost();
    })
    const savePost = async() => {
        try {
            let response = await fetch('search.php', {
                method: 'POST',
                body: new FormData(form),
            });
            const result = await response.json();
            console.log(result);
            list.html() = result.retVal;
        } catch (error) {
            console.log(error);
        }
    }

});