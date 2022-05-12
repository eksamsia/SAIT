<?php
include_once 'config.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];

    //memasukkan data ke database lokal
    $sql = "INSERT INTO mahasiswa2 (nama,alamat,prodi) VALUES ('$nama','$alamat','$prodi')";
    if (mysqli_query($link, $sql)) {
        echo "<center>New record has been added successfully to local database! <br>
        </center>";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($link);

//memasukkan data di ubuntu
    //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
    $url = 'http://192.168.56.103/sait_project_api/mahasiswa_api.php?function=insert_mhs';
    $ch = curl_init($url);
// data yang akan dikirim ke REST api, dengan format json
    $jsonData = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'prodi' => $prodi,
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