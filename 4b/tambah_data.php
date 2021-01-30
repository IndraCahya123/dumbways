<?php 

require('controller.php');

if(isset($_POST['submit'])){
    if (tambahData($_POST) > 0) {
        echo ("<script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'index.php';
    </script>");
    } else {
        echo ("<script>
        alert('Data Gagal Ditambahkan');
        document.location.href = 'index.php';
    </script>");
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arkademy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light p-5">
    <div class="container p-0">
        <a href="./index.php"><h1 style="text-align: center;">Tambah Data Sekolah</h1></a> <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">NPSN</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Input NPSN Sekolah" name="NPSN" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Nama Sekolah</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Nama Sekolah" name="nama_sekolah" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" placeholder="Masukkan alamat sekolah" required></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Skala Sekolah</label>
                    <select class="form-control" name="skala_sekolah" id="exampleFormControlSelect1" required>
                        <option selected disabled>Pilih Salah Satu</option>
                        <option>Kota / Kabupaten</option>
                        <option>Provinsi</option>
                        <option>Nasional</option>
                        <option>Internasional</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Status Sekolah</label>
                    <select class="form-control" name="status_sekolah" id="exampleFormControlSelect1" required>
                        <option selected disabled>Pilih Salah Satu</option>
                        <option>Swasta</option>
                        <option>Negeri</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="foto-sekolah">Tambah Foto Sekolah : </label>
                <input type="file" name="foto_sekolah" id="foto-sekolah">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>