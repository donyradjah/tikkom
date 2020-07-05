<?php
include "config/koneksi.php";
?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">

    <tr>
        <th>No</th>
        <th style="background:green">Nama</th>
        <?php
        for ($a = 1; $a <= 20;) {
            echo "<th style='height:50px; width:50px;'>$a</th>";
            $a++;
        }

        ?>
    </tr>
    <tbody>
        <?php
        $query = "SELECT * FROM vw_jawaban";
        $sql = mysqli_query($conn, $query) or die(mysqli_error($dbnm));
        $data = "";
        $benar = "benar";
        $jwb = "";
        $i = 1;
        while ($hasil = mysqli_fetch_array($sql)) {
            $nama = $hasil['name'];

            if ($data != $nama) {
                echo "<tr >";
                echo "<td align='center'>$i</td>";
                echo "<td>$nama</td>";
                $data = $nama;
                $i++;
            } else {
                $jwb = $hasil['jawab'];
                if ($jwb = '1') {
                    $jwb = 'A';
                } else {
                    $jwb = 'B';
                }
                $status = $hasil['status'];
                if ($status != $benar) {
                    echo "<td style='background:red;height:50px; width:50px;'>$jwb</td>";
                } else {
                    echo "<td style='background:green;height:50px; width:50px;'>$jwb</td>";
                }
                $jwb = '';
            }
            var_dump($hasil);
        }
        ?>
    </tbody>
</table>