<?php
    include "koneksi.php";

    $sql = "SELECT * FROM tb_teman_crud";
    $dataTeman = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Tabel Teman</h1>

        <?php
            if($_POST){
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];

                $tambah_data = "INSERT INTO tb_teman_crud (nama_teman, alamat_teman) VALUES ('$nama', '$alamat')";

                mysqli_query($con, $tambah_data);
                header("location:index.php");
            }
        ?>

        <form method="get" action="#tabel" id="tabel">
            <input type="text" class="form-control mt-5" placeholder="Silahkan cari data berdasarkan nama" name="cari">
        </form>

        <table class="table table-dark table-hover table-bordered table-responsive border-light mt-4">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>AKSI</th>
                </tr>
            </thead>

            <?php
                // Pagination
                $banyakDataPerHal = 10;
                $banyakData = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_teman"));
                $banyakHal = ceil($banyakData / $banyakDataPerHal);
                if(isset($_GET['halaman'])){
                    $halamanAktif = $_GET['halaman'];
                }else{
                    $halamanAktif = 1;
                }

                $dataAwal = ($halamanAktif * $banyakDataPerHal) - $banyakDataPerHal;
                $dataTeman = mysqli_query($con, "SELECT * FROM tb_teman_crud LIMIT $dataAwal, $banyakDataPerHal");

                $no = 1;
                if(isset($_GET['cari'])){
                    $dataTeman = mysqli_query($con, "SELECT * FROM tb_teman_crud WHERE nama_teman LIKE '%" . $_GET['cari'] . "%'");
                    echo "<div class='mt-3 fw-bold alert alert-success text-dark'>Hasil Pencarian : " . $_GET['cari'] . "</div>";
                }

                // File Handling
                $myfile = fopen("data_teman.csv", "w+") or die("Unable to open file!");
                fwrite($myfile, "No Nama Alamat\n");

                foreach($dataTeman as $data){
                    fwrite($myfile, "$no " . $data['nama_teman'] . ' ' . $data['alamat_teman'] . "\n");
            ?>

            <tbody>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_teman']; ?></td>
                    <td><?php echo $data['alamat_teman']; ?></td>
                    <td class="text-center">
                        <a href='edit.php?id_teman="<?php echo $data['id_teman'] ?>"' class="btn btn-warning btn-sm">&nbsp; Edit &nbsp;</a> &nbsp; <a href='hapus.php?id_teman="<?php echo $data['id_teman']; ?>"' class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            </tbody>
            <?php
                }
                fclose($myfile);
            ?>
        </table>

    <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if($halamanAktif <= 1) { ?>
                <li class="page-item disabled">
                    <a href="?halaman=<?php echo $halamanAktif-1 ?>" class="page-link">Sebelumnya</a>
                </li>

                <?php } else{ ?>

                <li class="page-item">
                    <a href="?halaman=<?php echo $halamanAktif-1 ?>" class="page-link">Sebelumnya</a>
                </li>

                <?php } ?>

                <?php
                    for($i=1; $i <= $banyakHal; $i++){
                ?>

                <li class="page-item">
                    <a href="?halaman=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                </li>

                <?php } ?>

                <?php if($halamanAktif <= 1) { ?>

                <li class="page-item disabled">
                    <a href="?halaman=<?php echo $halamanAktif+1 ?>" class="page-link">Selanjutnya</a>
                </li>

                <?php } else { ?>

                <li class="page-item">
                    <a href="?halaman=<?php echo $halamanAktif+1 ?>" class="page-link">Selanjutnya</a>
                </li>     

                <?php } ?>
            </ul>
        </nav>

        <div class="text-center">
            <a href="tambah.php" class="btn btn-success mt-3 mb-5">&nbsp;&nbsp;&nbsp; Tambah &nbsp;&nbsp;&nbsp;</a> &nbsp;  <a href="data_teman.csv" class="btn btn-success mt-3 mb-5">Download CSV</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="script/main.js"></script>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</body>
</html>