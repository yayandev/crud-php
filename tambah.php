<?php
require 'functions.php';
$success = "";
$error = "";

if(isset($_POST["simpan"])){
    if(createData($_POST) > 0){
        $success = true;
    }else{
        $error = true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    .form {
        width: 400px;
        height: auto;
        background-color: white;
        padding: 10px;
    }
    </style>
</head>

<body style="background-color: #eaeaea;">
    <div class="container p-3 d-flex justify-content-center">
        <form action="" class="form" method="post">
            <?php if($success): ?>
            <div class="mb-3">
                <div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan!
                </div>
            </div>
            <?php endif; ?>
            <?php if($error): ?>
            <div class="mb-3">
                <div class="alert alert-danger" role="alert">
                Data Sudah Ada!
                </div>
            </div>
            <?php endif; ?>
            <div class="mb-3">
                <h1 class="text-center">Tambah Data</h1>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input required type="text" id="nama" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input required type="number" id="nim" class="form-control" name="nim">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input required type="text" id="alamat" class="form-control" name="alamat">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary form-control" type="submit" name="simpan">Simpan</button>
            </div>
            <div class="mb-3">
                <a href="index" class="btn btn-secondary form-control text-white">kembali</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>