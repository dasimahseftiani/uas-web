<?php

session_start();
$mysqli = new mysqli('localhost', 'root', '', 'uas');

$id = $_GET['id'];
$sql = $mysqli->query("SELECT * FROM krs WHERE id='$id'");
$data = $sql->fetch_assoc();

if (isset($_POST['nim_mahasiswa'])) {
    $nim_mahasiswa = $_POST['nim_mahasiswa'];
    $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
    $semester = $_POST['semester'];
    $tahun_ajaran = $_POST['tahun_ajaran'];

    $update = $mysqli->query("UPDATE krs SET nim_mahasiswa='$nim_mahasiswa', nama_mata_kuliah='$nama_mata_kuliah', semester='$semester', tahun_ajaran='$tahun_ajaran' WHERE id='$id'");

    if ($update) {
        $_SESSION['success'] = true;
        $_SESSION['message'] = 'Data KRS Berhasil Diubah';
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update KRS Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="text-center">Update KRS Mahasiswa</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nim_mahasiswa" class="form-label">NIM Mahasiswa</label>
            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" value="<?= $data['nim_mahasiswa'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah" value="<?= $data['nama_mata_kuliah'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" value="<?= $data['semester'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?= $data['tahun_ajaran'] ?>" required>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning">Cancel</a>
        </div>
    </form>   
</body>
</html>
