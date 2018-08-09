<h3 class="mt-4 mb-3">Hasil Seleksi Karir Mandiri</h3>

<div class="row">
    <table id="data_grid" class="table table-striped">
        <thead>
            <tr>
                <th>No Registrasi</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <!--<th>Aksi</th>-->
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT r.reg_id, r.reg_status, p.* "
                    . "FROM registrasi AS r INNER JOIN pelamar_kerja AS p ON r.p_email = p.p_email "
                    . "WHERE r.reg_status NOT IN(1,2) ORDER BY r.reg_id ASC";
            $results = $database->get_results( $query );
            $no = 1;
            foreach( $results as $row )
            {
                $key = filterOutput($row["reg_id"]);
                $gender = $row["p_jkel"] == "L" ? "Laki-Laki" : "Perempuan";
                $stat = (int)$row["reg_status"];
                $button = "";
                switch ($stat){
                    case 3:
                        $status = strtoupper("lulus");
                        if (empty($_SESSION['isSession'])){
                            $html = '<a href="?page=enroll">Please Login</a>';
                        }else{
                            $html = '<form method="POST" action="modules/hasil-seleksi/do_print_card.php" target="_BLANK">';
                            $html .= '<input type="hidden" name="fkey" value="'.$key.'" readonly>';
                            $html .= '<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Bukti Lulus</button>';
                            $html .= '</form>';
                        }
                    break;
                    case 4:
                        $status = strtoupper("tidak lulus");
                        $html = '-';
                    break;
                    default:
                        $status = strtoupper("proses");
                        $html = '-';
                    break;
                }
                    echo '<td>'.$row["reg_id"].'</td>';
                    echo '<td>'.$row["p_nama_lengkap"].'</td>';
                    echo '<td>'.$row["p_email"].'</td>';
                    echo '<td>'.$gender.'</td>';
                    echo '<td>'.$status.'</td>';
//                    echo '<td>'.$html.'</td>';
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
</div>

<div class="mt-4 mb-3"></div>