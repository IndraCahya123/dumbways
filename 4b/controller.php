<?php

$host = 'localhost';
$username = 'root';
$password = "";
$db = 'dumbways_2';

$conn = mysqli_connect($host, $username, $password, $db, 3306);

function lihatData($query)
{
    global $conn;

    $data = mysqli_query($conn, $query);
    
    $rows = [];

    if($data === null){
        return $rows;
    }else{    
        while($row = mysqli_fetch_assoc($data)){
            $rows[] = $row;
        }
        return $rows;
    }
}

function tambahData($data){
    global $conn;

    $npsn = htmlspecialchars($data['NPSN']);
    $nama_sekolah = htmlspecialchars($data['nama_sekolah']);
    $alamat = htmlspecialchars($data['alamat']);
    $skala_sekolah = htmlspecialchars($data['skala_sekolah']);
    $status_sekolah = htmlspecialchars($data['status_sekolah']);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO school_tb VALUES
                ('', '$npsn', '$nama_sekolah', '$alamat', '$foto' , '$skala_sekolah', '$status_sekolah', 1);";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $nama = $_FILES['foto_sekolah']['name'];
    $ukuran = $_FILES['foto_sekolah']['size'];
    $error = $_FILES['foto_sekolah']['error'];
    $tmp = $_FILES['foto_sekolah']['tmp_name'];
    
    if ($error === 4) {
        echo `
            <script>
                alert('Foto Sekolah Belum Dipilih!');
            </script>
        `;

        return false;
    }

    $typeFile = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $nama);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $typeFile)) {
        echo `
            <script>
                alert('Foto Sekolah Harus Berupa Gambar!');
            </script>
        `;

        return false;
    }

    if ($ukuran > 2000000) {
        echo `
            <script>
                alert('Foto Sekolah Harus Berukuran Kurang Dari 2MB!');
            </script>
        `;

        return false;
    }

    $generateNameFile = uniqid();
    $generateNameFile .= '.';
    $generateNameFile .= $ekstensiFile;

    move_uploaded_file($tmp, './img/'.$generateNameFile);

    return $generateNameFile;
}

function ubahData($data){
    global $conn;

    $id = $data['id_school'];
    $npsn = htmlspecialchars($data['NPSN']);
    $nama_sekolah = htmlspecialchars($data['nama_sekolah']);
    $alamat = htmlspecialchars($data['alamat']);
    $skala_sekolah = htmlspecialchars($data['skala_sekolah']);
    $status_sekolah = htmlspecialchars($data['status_sekolah']);

    if ($_FILES['photo_school']['error'] === 4) {
        $gambar = $_FILES['photo_school'];
    } else {
        $gambar = upload();
    }
    

    $query = "UPDATE school_tb SET 
                NPSN = '$npsn',
                name_school = '$nama_sekolah',
                address = '$alamat',
                logo_school = '$gambar',
                school_level = '$skala_sekolah',
                status_school = '$status_sekolah'
                WHERE id = $id
                ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusData($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM school_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $email = $data['email'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    $selectionUsername = mysqli_query($conn, "SELECT name FROM user WHERE name = '$username';");

    if (mysqli_num_rows($selectionUsername) === 1) {
        echo `
            <script>
                alert('Username Sudah Ada!');
            </script>
        `;

        return false;
    }    

    if ($password !== $password2) {
        echo `
            <script>
                alert('Validasi Password Gagal!');
            </script>
        `;

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}