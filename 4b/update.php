<?php 

require('controller.php');

$id = $_GET['id'];

$school = lihatData("SELECT * FROM school_tb WHERE id = $id")[0];

if(isset($_POST['submit'])){
    if (ubahData($_POST) > 0) {
        echo ("<script>
        alert('Data Berhasil Diubah');
        document.location.href = 'index.php';
    </script>");
    } else {
        echo ("<script>
        alert('Data Gagal Diubah');
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
    <div class="container">
        <h1 style="text-align: center;">Ubah Data Sekolah</h1> <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">NPSN</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" value="<?= $school['NPSN'] ?>" name="NPSN" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Nama Sekolah</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $school['name_school'] ?>" name="nama_sekolah" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" required><?= $school['address'] ?></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Skala Sekolah</label>
                    <select class="form-control" name="skala_sekolah" id="exampleFormControlSelect1" required>
                        <option selected value="<?= $school['school_level'] ?>"><?= $school['school_level'] ?></option>
                        <option>Kota / Kabupaten</option>
                        <option>Provinsi</option>
                        <option>Nasional</option>
                        <option>Internasional</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Status Sekolah</label>
                    <select class="form-control" name="status_sekolah" id="exampleFormControlSelect1" required>
                        <option selected value="<?= $school['status_school'] ?>"><?= $school['status_school'] ?></option>
                        <option>Swasta</option>
                        <option>Negeri</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="foto-sekolah">Tambah Foto Sekolah : </label>
                <input type="file" name="foto_sekolah" id="foto-sekolah">
            </div>
            <input type="hidden" name="id_school" value="<?= $school['id'] ?>">
            <input type="hidden" name="photo_school" value="<?= $school['logo_school'] ?>">
            <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</body>
</html>