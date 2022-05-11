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
$id_mhs = $_GET['id_mhs'];
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
curl_setopt($curl, CURLOPT_URL, 'http://192.168.56.103/sait_project_api/mahasiswa_api.php?id_mhs=' . $id_mhs . '');
$res = curl_exec($curl);
$json = json_decode($res, true);
//var_dump($json);
?>
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="page-header">
                                <h2 align="center">Update Data</h2>
                            </div>
                            <p align="center">Please fill this form and submit to add student record to the database.
                            </p>
                            <form action="editDo.php" method="post">
                                <input type="hidden" name="id_mhs" value="<?php echo "$id_mhs"; ?>">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="<?php echo ($json["data"][0]["nama"]); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="mobile" name="alamat" class="form-control"
                                        value="<?php echo ($json["data"][0]["alamat"]); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Prodi</label>
                                    <input type="mobile" name="prodi" class="form-control"
                                        value="<?php echo ($json["data"][0]["prodi"]); ?>">
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