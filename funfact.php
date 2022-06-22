<!-- kasus 4

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kasus 4 sait</title>
    <!-- Connecting CSS -->
<link rel="stylesheet" href="style.css">
<!-- Font Awesome CDN link -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<style>
h2 {
    color: black;
    text-align: center;
    background-color: yellow;
    padding: 0.1em 0.2em;
    /* font-family: "Times New Roman", Times, serif; */
}

/* h5 {
    color: black;
    text-align: center;
    /* font-family: "Times New Roman", Times, serif; */
}

/* .ini {
    margin-top: 50px;
} */
li {
    padding-bottom: 0.5em;
    font-weight: 600;
}

li>span {
    text-decoration: underline;
    color: black;
    font-weight: 600;
    /* color: rgb(67, 124, 230); */
}

a {
    text-decoration: underline;
    /* color: rgb(67, 124, 230); */
    font-style: italic;
    color: black;
}

.capitalize {
    text-transform: capitalize;
    text-align: center;
}

#lyrics {
    text-align: center;
}

#fetch {
    color: orange;
    font-weight: bold;
    font-size: larger;
    /* font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; */
    /* font-family:Verdana, Geneva, Tahoma, sans-serif; */
    font-family: "Pacifico", cursive;
    font-style: italic;
    text-align: center;
}

#quotes {
    font-size: xx-large;
}

button {
    border: none;
    background: #fff;
    cursor: pointer;
}

button>i,
#tweet-quote {
    color: red;
}
</style>

</head>

<body>
    <header>
        <br>
        <!-- <h2> Get the quote! </h2>
        <h5> Best Part of Songs </h5> -->
        <h2>
            Random Taylor Quote
            <button class="btn" id="new-quote">
                <i class="fa fa-refresh"></i>
            </button>
        </h2>
        <div id="fetch">
            <span id="quotes">"</span>
            <div id="lyrics">
                I don't know what I want, so don't ask me / 'Cause I'm
                still trying to figure it out
            </div>
            <span id="quotes">"</span>
            <p>
                <span class="capitalize" id="song">- a place in this world, </span><span class="capitalize"
                    id="album">Taylor Swift</span>
            <p>
    </header>
    <script>
    function getQuotesJson() {
        $.ajax({
            method: "GET",
            url: "https://taylorswiftapi.herokuapp.com/get",
            dataType: "json",
            success: onSuccess,
            error: onError,
        });
    }

    function onSuccess(jsonReturn) {
        console.log("success");
        quoteData = jsonReturn;

        // {"quote":"Cold was the steel of my axe to grind for the boys who broke my heart /
        //  Now I send their babies presents",
        //  "song":"Invisible String",
        //  "album":"folklore"}

        var newquote = quoteData.quote;
        var song = quoteData.song;
        var album = quoteData.album;
        $("#lyrics").html(newquote);
        $("#song").html("- " + song + ", ");
        $("#album").html(album);

        $("#tweet-quote").attr(
            "href",
            "http://www.twitter.com/intent/tweet?text=" +
            newquote +
            " -" +
            song +
            ", " +
            album
        );
    }

    function onError(jsonReturn) {
        console.log("error");
    }
    $("#new-quote").on("click", function() {
        getQuotesJson();
    });

    $("document").ready(function() {
        getQuotesJson();
    });
    </script>

</body>

</html>