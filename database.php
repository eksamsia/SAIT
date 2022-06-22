<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kasus 3 sait</title>
    <!-- Connecting CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome CDN link -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>

<body>
    <header>
        <div class="content-database">
            <h2 align="center">Song's List</h2>
        </div>
        <!-- tabel di windows -->
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h5 class="pull-left">Windows OS</h5>
                        <a href="insertView.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add
                            New</a>
                    </div>
                    <div class="scroll">
                        <?php
//include config file
require_once "config.php";

//attempt select query execution
$sql = "SELECT * FROM taylor";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Song's Title</th>";
        echo "<th>Album</th>";
        echo "<th>Year</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['judul'] . "</td>";
            echo "<td>" . $row['album'] . "</td>";
            echo "<td>" . $row['tahun'] . "</td>";
            echo "<td>";
            echo '<a href="editView.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
            echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
mysqli_close($link);
?>
                    </div>
                </div>
            </div>
            <!-- tabel di ubuntu -->
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-5 mb-3 clearfix">
                                <h5 class="pull-left">Ubuntu OS </h5>
                                <a href="insertView.php" class="btn btn-success pull-right"><i
                                        class="fa fa-plus"></i>Add
                                    New</a>
                            </div>
                            <div class="scroll">
                                <?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU,
curl_setopt($curl, CURLOPT_URL, 'http://192.168.56.103/project_api_sait/taylor_api.php');
$res = curl_exec($curl);
$json = json_decode($res, true);

echo '<table class="table table-bordered table-striped">';
echo "<thead>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Song's Title</th>";
echo "<th>Album</th>";
echo "<th>Year</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
for ($i = 0; $i < count($json["data"]); $i++) {
    echo "<tr>";
    echo "<td> {$json["data"][$i]["id"]} </td>";
    echo "<td> {$json["data"][$i]["judul"]} </td>";
    echo "<td> {$json["data"][$i]["album"]} </td>";
    echo "<td> {$json["data"][$i]["tahun"]} </td>";
    echo "<td>";
    echo '<a href="editView.php?id=' . $json["data"][$i]["id"] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
    echo '<a href="delete.php?id=' . $json["data"][$i]["id"] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
    echo "</td>";
    echo "</tr>";
}
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
        </div>
        </div>
        </div>
    </header>

</body>

</html>