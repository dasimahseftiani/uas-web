<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'uas');

$sql = $mysqli->query("SELECT krs.id, krs.nim_mahasiswa, krs.nama_mata_kuliah, krs.semester, krs.tahun_ajaran
                        FROM krs");

$push = [];

while ($row = $sql->fetch_assoc()) {
    array_push($push, $row);
}

$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KRS Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container"> 
    <h1 class="text-center">Data KRS Mahasiswa</h1>
    <?php if (isset($_SESSION['success']) && $_SESSION['success'] == true){ ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['message'] ?>
    </div>
    <?php } ?>  
    
    <a href="create.php" class="btn btn-primary">Add</a>
    <a href="logout.php" class="btn btn-warning">Logout</a><br></br>

    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIM Mahasiswa</th>
            <th class="text-center">Nama Mata Kuliah</th>
            <th class="text-center">Semester</th>
            <th class="text-center">Tahun Ajaran</th>
            <th class="text-center">Aksi</th>
        </tr>
        <?php foreach ($push as $row ) { ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $row['nim_mahasiswa']; ?></td>
                <td><?= $row['nama_mata_kuliah']; ?></td>
                <td><?= $row['semester']; ?></td>
                <td><?= $row['tahun_ajaran']; ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin data ini akan dihapus?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>  
    </div>  
</body>
</html>

<?php

unset($_SESSION['success']);
unset($_SESSION['message']);
?>
