<?php 
require 'functions.php';
$id = $_GET["id"];
if(!$id){
    header("Location: index");
}else{
    $cek = query("SELECT * FROM tb_mhs WHERE id = $id")[0];
}

if(!$cek){
    header("Location: index");
}

if(delete($id) > 0){
    echo "
    <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'index';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'index';
    </script>
    ";
}