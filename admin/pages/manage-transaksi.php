<?php
include "../koneksi.php";

$query = "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC";
$hasil = mysqli_query($koneksi, $query);


// }
?>
<div class="container-fluid">
    <h5>Jumlah Transaksi : <?= mysqli_num_rows($hasil) ?></h5>
    <table class="table">
        <tr>
            <th>
                No
            </th>
            <th>
                ID User
            </th>
            <th>
                Tanggal, Waktu
            </th>
            <th>
                Username
            </th>
        </tr>
        <?php
        $i = 1;
        while ($data = mysqli_fetch_assoc($hasil)) :
        ?>
            <tr>
                <td>
                    <?= $i++ ?>
                </td>
                <td>
                    <?= $data['id_user'] ?>
                </td>
                <td>
                    <?= $data['tanggal_transaksi'] ?>, <?= $data['waktu'] ?>
                </td>
                <td>
                    <?php
                    if ($data['id_user']) {
                        $idUser = $data['id_user'];
                        $queryUser = "SELECT * FROM tb_user WHERE id_user='$idUser'";
                        $hasilUser = mysqli_query($koneksi, $queryUser);
                        $dataUser = mysqli_fetch_assoc($hasilUser);
                        if (is_null($dataUser)) {
                            echo "User Delete";
                        } else {
                            echo $dataUser['username'];
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
</div>