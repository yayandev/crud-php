<?php
//koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "crud_php";

$conn = mysqli_connect($host,$user,$pass,$db);

//function READ

function query($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

//function CREATE
function createData($data){
    global $conn;
    $nama   = htmlspecialchars($data["nama"]);
    $nim    = htmlspecialchars($data["nim"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $result = query("SELECT * FROM tb_mhs WHERE nim = '$nim'");

    if(!$result){
        $query = "INSERT INTO tb_mhs VALUES(NULL,'$nama','$nim','$jurusan','$alamat')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }else{
        return false;
    }
}

//function DELETE
function delete($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM tb_mhs WHERE id = $id");
    return mysqli_affected_rows($conn);
}

//function UPDATE
function updateData($data){
    global $conn;
    $id = $data["id"];
    $nama   = htmlspecialchars($data["nama"]);
    $nim    = htmlspecialchars($data["nim"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "UPDATE tb_mhs SET 
                    nama = '$nama',
                    nim = '$nim',
                    jurusan = '$jurusan',
                    alamat = '$alamat' WHERE id = $id";
    
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

//function search
function search($keyword){
    $query = "SELECT * FROM tb_mhs
        WHERE
    nama LIKE '%$keyword%' OR
    nim LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%'
    ";
    return query($query);
}