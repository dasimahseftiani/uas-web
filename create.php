<?php
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'uas');

    
    if (isset($_POST['nim_mahasiswa']) && isset($_POST['nama_mata_kuliah']) && isset($_POST['semester']) && isset($_POST['tahun_ajaran'])) {
        $nim_mahasiswa = $_POST['nim_mahasiswa']; 
        $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
        $semester = $_POST['semester'];
        $tahun_ajaran = $_POST['tahun_ajaran'];

        
        $insert = $mysqli->query("INSERT INTO krs(nim_mahasiswa, nama_mata_kuliah, semester, tahun_ajaran) 
                                            VALUES ('$nim_mahasiswa', '$nama_mata_kuliah', '$semester', '$tahun_ajaran')");
        if ($insert) {
            $_SESSION['success'] = true;
            $_SESSION['message'] = 'Data KRS Berhasil Ditambahkan';
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
    <title>Form Tambah KRS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
    <h1 class="text-center">Tambah KRS Mahasiswa</h1>
    <form method="POST">
        <!-- NIM Mahasiswa -->
        <div class="mb-3">
            <label for="nim_mahasiswa" class="form-label">NIM Mahasiswa</label>
            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa">
        </div> 

        <!-- Nama Mata Kuliah -->
        <div class="mb-3">
            <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah">
        </div>

        <!-- Semester -->
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester">
        </div>

        <!-- Tahun Ajaran -->
        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran">
        </div>

        <!-- Tombol Submit -->
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
