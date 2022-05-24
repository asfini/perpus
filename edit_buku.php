<?php
include "index.php";
include "koneksi.php";
?>

<div class="card">
    <div class="card-header">
        Input Buku
    </div>
    <div class="card-body">
        <?php
        $id_buku = $_GET['id_buku'];
        $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = $id_buku");
        $data = mysqli_fetch_array($query);
        ?>
        <form action="" method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"> ID Buku </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="id_buku" value="<?php echo $data['id_buku'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"> Judul </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="judul" value="<?php echo $data['judul'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"> Penulis </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="penulis" value="<?php echo $data['penulis'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"> Penerbit </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="penerbit" value="<?php echo $data['penerbit'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"> Tahun Terbit </label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="tahun_terbit" value="<?php echo $data['tahun_terbit'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"> Stok </label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name="stok" value="<?php echo $data['stok'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-3">
                    <input type="submit" class="btn btn-primary" value="Update" name="update">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST['update'])) {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "UPDATE buku SET judul = '$judul',penulis = '$penulis', penerbit = '$penerbit',tahun_terbit = '$tahun_terbit', stok ='$stok' WHERE id_buku = '$id_buku'");
    header("location:../buku.php");
}
?>