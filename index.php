<?php
require 'functions.php';

$allMhs = query("SELECT * FROM tb_mhs ORDER BY id DESC");

if( isset($_POST["cari"]) ) {
	$allMhs = search($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body style="background-color: #eaeaea;">

    <!-- nav -->
    <ul class="nav justify-content-around p-1 shadow" style="background-color: white;">
        <div class="d-flex">
            <li class="nav-item" style="margin-right: 20px;">
                <a class=" btn btn-primary text-white" aria-current="page" href="tambah">Tambah data</a>
            </li>
            <li class="nav-item">
                <form action="" method="post" style="width: 200px;" class="d-flex">
                    <input type="text" placeholder="cari data.." name="keyword" class="form-control">
                    <button type="submit" class="btn btn-sm btn-primary text-white"
                        style="margin-left: 10px;" name="cari">cari</button>
                </form>
            </li>
        </div>

        <li class="nav-item">
            <p style="font-weight: bold;">Sistem Data Kampus</p>
        </li>
    </ul>

    <div class="container p-2 mt-3" style="background-color: white;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NIM</th>
                    <th scope="col">JURUSAN</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($allMhs as $mhs): ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["nim"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                    <td><?= $mhs["alamat"]; ?></td>
                    <td>
                        <a href="ubah?id=<?= $mhs['id']; ?>"  class="btn btn-sm btn-info">ubah</a>
                        <a href="hapus?id=<?= $mhs['id']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?');" class="btn btn-sm btn-danger">hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>