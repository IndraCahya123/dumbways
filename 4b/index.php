<?php 

if (!isset($_SESSION['login'])) {
    echo ("<script>
        alert('Login Dulu);
        document.location.href = 'home.php';
    </script>");
}

require('controller.php');

$schools = lihatData("SELECT * FROM school_tb");

// join user on school_tb.user_id = user.id
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dumbways</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light p-5">
    <div class="container">
        <header class="d-flex justify-content-between align-items-center w-100 p-3 border-bottom border-dark">
            <h1 style="text-align: center;">Dumbways</h1>
            <div class="top-action">
                <a type="button" class="btn btn-primary" href="tambah_data.php">Tambah Data</a>
                <a type="button" class="btn btn-danger" href="./logout.php">Logout</a>
            </div>
        </header>

        <main class="d-flex justify-content-center m-4">
        <div class="d-flex flex-wrap justify-content-around">
            <?php foreach($schools as $school) : ?>
                <div class="card m-3">
                    <img class="card-img-top p-2" src="./img/<?= $school['logo_school'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $school['name_school'] ?></h5>
                        <p class="card-text">Alamat : <?= $school['address'] ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted">Added By : </small>
                        <div class="action">
                            <a href="./hapus.php?id=<?= $school['id'] ?>" type="button" class="btn-sm btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Delete</a>
                            <a href="./update.php?id=<?= $school['id'] ?>" type="button" class="btn-sm btn-success">Ubah</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
                
                
        </main>

        <footer>
        
        </footer>
    </div>
</body>
</html>