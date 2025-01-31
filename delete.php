<?php
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'uas');
    $id = $_GET['id'];

    
    $delete = $mysqli->query("DELETE FROM krs WHERE id='$id'");

    
    if ($delete) {
        $_SESSION['success'] = true;
        $_SESSION['message'] = 'Data KRS Berhasil Dihapus';
        header("Location: index.php"); 
        exit();
    } else {
        $_SESSION['error'] = true;
        $_SESSION['message'] = 'Data KRS Gagal Dihapus';
        header("Location: index.php");
        exit();
    }
?>
