<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Halaman Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5 fw-bold">Edit Data</h2>

        <?php
            if(isset($_GET['id_teman'])){
                $sql = "SELECT * FROM tb_teman_crud WHERE id_teman = " . $_GET['id_teman'];

                $dataTeman = mysqli_query($con, $sql);
                $data = mysqli_fetch_array($dataTeman);
        ?>

        <form action="edit.php" method="post" class="mt-5">
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?php echo $data['nama_teman']; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">ALAMAT</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="alamat"><?php echo $data['alamat_teman']; ?></textarea>
            </div>

            <input type="hidden" name="id" value="<?php echo $data['id_teman']; ?>">

            <div class="text-center">
                <input type="submit" value=" Update " class="btn btn-success"> &nbsp; <a href="index.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>

        <?php
            }
            else{
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $id = $_POST['id'];

                $sql_update = "UPDATE tb_teman_crud SET nama_teman = '$nama', alamat_teman = '$alamat' WHERE id_teman = '$id'";

                mysqli_query($con, $sql_update);
                header("location:index.php");
            }
        ?>
    </div>
</body>
</html>