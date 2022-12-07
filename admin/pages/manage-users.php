<?php
include "../koneksi.php";
$query = "SELECT * FROM tb_user";
$hasil = mysqli_query($koneksi, $query);
?>

<div class="container-fluid">
    <h3>Manage User</h3>
    <hr>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Username</th>
            <th>Transaksi</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $i = 1;
        while ($data = mysqli_fetch_assoc($hasil)) :
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['username'] ?></td>
                <td>
                    <?php if (true) {
                        $idUser = $data['id_user'];
                        $queryTransaksi = "SELECT * FROM tb_transaksi WHERE id_user='$idUser'";
                        $hasilTransaksi = mysqli_query($koneksi, $queryTransaksi);
                        $jumlah = mysqli_num_rows($hasilTransaksi);
                        if ($jumlah > 0) {
                            echo $jumlah;
                        } else {
                            echo 0;
                        }
                    } ?>
                </td>
                <td class="text-primary"><a href="controller/p-delete-user.php?id=<?= $idUser ?>" onclick="confirm('Apakah anda yakin ingin menghapus user ini?')">Delete</a></td>
            </tr>
        <?php endwhile ?>
    </table>
</div>