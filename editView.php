<!DOCTYPE html>
<html lang="en" dir="ltr">

<head?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kasus 3 sait</title>
    <!-- Connecting CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome CDN link -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!-- <style type="text/css">
    .wrapper {
        width: 500px;
        margin: 0 auto;
    }
    </style> -->
    </head>

    <body>
        <header>
            <?php
$id = $_GET['id'];
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
curl_setopt($curl, CURLOPT_URL, 'http://192.168.56.103/project_api_sait/taylor_api.php?id=' . $id . '');
$res = curl_exec($curl);
$json = json_decode($res, true);
//var_dump($json);
?>
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="page-header">
                                <h2 align="center">Update Song</h2>
                            </div>
                            <p align="center">Please fill this form and submit to add song record to the database.
                            </p>
                            <form action="editDo.php" method="post">
                                <input type="hidden" name="id" value="<?php echo "$id"; ?>">
                                <div class="form-group">
                                    <label>Song's Title</label>
                                    <input type="text" name="judul" class="form-control"
                                        value="<?php echo ($json["data"][0]["judul"]); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Album</label>
                                    <input type="mobile" name="album" class="form-control"
                                        value="<?php echo ($json["data"][0]["album"]); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="number" name="tahun" class="form-control"
                                        value="<?php echo ($json["data"][0]["tahun"]); ?>">
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>

</html>