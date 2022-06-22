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
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="page-header">
                                <h2 align="center">Add New Data</h2>
                            </div>
                            <p align="center">Please fill this form and submit to add song record to the database.
                            </p>
                            <form action="insertDo.php" method="POST">
                                <div class="form-group">
                                    <label>Song's Title</label>
                                    <input type="text" name="judul" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Album</label>
                                    <input type="text" name="album" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" class="form-control">
                                </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>

</html>