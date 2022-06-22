<?php
include_once 'config.php';
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $album = $_POST['album'];
    $tahun = $_POST['tahun'];

    //memasukkan data ke database lokal
    $sql = "INSERT INTO taylor (judul,album,tahun) VALUES ('$judul','$album','$tahun')";
    if (mysqli_query($link, $sql)) {
        echo "<center>New record has been added successfully to local database! <br>
        </center>";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($link);

//memasukkan data di ubuntu
    //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
    $url = 'http://192.168.56.103/project_api_sait/taylor_api.php?function=insert_taylor';
    $ch = curl_init($url);
// data yang akan dikirim ke REST api, dengan format json
    $jsonData = array(
        'judul' => $judul,
        'album' => $album,
        'tahun' => $tahun,
    );

//Encode the array into JSON.
    $jsonDataEncoded = json_encode($jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//pastikan mengirim dengan method POST
    curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request
    $result = curl_exec($ch);
    $result = json_decode($result, true);

    curl_close($ch);

//var_dump($result);
    // tampilkan return statusnya, apakah sukses atau tidak
    print("<center><br>status :  {$result["status"]} ");
    print("<br>");
    print("message :  {$result["message"]} ");
    echo "<br>Sukses terkirim ke ubuntu server !";
    echo "<br><a href=database.php> OK </a>";
}