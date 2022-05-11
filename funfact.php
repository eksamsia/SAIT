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
    /* font-family: "Times New Roman", Times, serif; */
}

h5 {
    color: black;
    text-align: center;
    /* font-family: "Times New Roman", Times, serif; */
}

.ini {
    margin-top: 50px;
}
</style>

</head>

<body>
    <header>
        <br>
        <h2> Get to Know ! </h2>
        <h5> Astronomy Picture Of The Day </h5>
        <div class="container">
            <div class="ini row">
                <div class="col-md-4">
                    <img class="col-md-10" src="https://apod.nasa.gov/apod/image/2205/CatsPaw_Bemmerl_960.jpg">
                </div>
                <div class="col-md-2">
                    <div class="wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-15">
                                    <div class="scroll">
                                        <?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// silahkan ditaruh file API ini di window.
// Silahkan ganti IP address dengan IP address linux
curl_setopt($curl, CURLOPT_URL, 'https://api.nasa.gov/planetary/apod?api_key=auxmY8ER4AzyubdprEyUSq6J1W0sPsdUalSGDljZ');
$res = curl_exec($curl);
$json = json_decode($res, true);

echo '<table class="table table-bordered table-striped">';
echo "<thead>";
echo "<tr>";
echo "<th>Title</th>";
echo "<th> {$json["title"]} </th>";
echo "</tr>";
echo "<tr>";
echo "<th>Date</th>";
echo "<th> {$json["date"]} </th>";
echo "</tr>";
echo "<th>Copyright</th>";
echo "<th> {$json["copyright"]} </th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "</tbody>";
echo "</table>";

curl_close($curl);
?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </header>

</body>

</html>