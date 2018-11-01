<?php
include'koneksi.php';

//Menampilkan dengan param id
$id = $_GET["id"];
$hasil = mysqli_query($koneksi, "select * from users where id='$id'");
if(mysqli_num_rows($hasil) > 0 ){
    $response = array();
    $response["users"] = array();
    while($x = mysqli_fetch_array($hasil)){
        $h['id'] = $x["id"];
        $h['username'] = $x["username"];
        $h['password'] = $x["password"];
        $h['level'] = $x["level"];
        $h['fullname'] = $x["fullname"];
        array_push($response["users"], $h);
    }
    echo json_encode($response);
}else {
  $response["message"]="tidak ada data";
  echo json_encode($response);
}
?>
