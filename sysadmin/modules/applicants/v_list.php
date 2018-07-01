<?php
$pagetitle = "Applicants";
$act = "modules/applicants/do_task.php";

$getpage = "list-pelamar";
$getact = htmlspecialchars($_GET["act"], ENT_QUOTES, 'UTF-8');
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?php echo $baseurl;?>">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active"><?php echo $pagetitle;?></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $pagetitle;?></h1>
    </div>
</div><!--/.row-->
<?php
switch($getact){
    // Show List
    default:
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>List Data</h5>
                <!--<span class="pull-right"><button class="btn btn-primary" onclick="location.href='?page=<?php echo $getpage; ?>&act=add';"><i class="fa fa-plus-circle"></i> Add New</button> </span>-->
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Reg. No.</th>
                            <th>Choosen Career</th>
                            <th>Headline</th>
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT p.*, r.reg_id, r.reg_status, k.k_title FROM pelamar_kerja AS p "
                                    . "INNER JOIN registrasi AS r ON r.p_email = p.p_email "
                                    . "INNER JOIN info_karir AS k ON k.k_id = p.k_id "
                                    . "ORDER BY r.reg_date DESC ";
                            $results = $database->get_results( $query );
                            foreach( $results as $row )
                            {
                                $stat = (int)$row["reg_status"];
                                switch ($stat){
                                    case 1:
                                        $status = strtoupper("process");
                                        $html = '-';
                                    break;
                                    case 2:
                                        $status = strtoupper("file verified");
                                        $html = '-';
                                    break;
                                    case 3:
                                        $status = strtoupper("pass");
                                    break;
                                    case 4:
                                        $status = strtoupper("not pass");
                                        $html = '-';
                                    break;
                                    default:
                                        $status = strtoupper("process");
                                        $html = '-';
                                    break;
                                }
                                echo '<tr>';
                                    echo '<td>
                                            <a href="?page='.$getpage.'&act=info&key='.$row["p_email"].'"><i class="fa fa-eye"></i> View</a>
                                        </td>';
                                    echo '<td>'.$row["reg_id"].'</td>';
                                    echo '<td>'.$row["k_title"].'</td>';
                                    echo '<td>'.$row["p_headline"].'</td>';
                                    echo '<td>'.$row["p_email"].'</td>';
                                    echo '<td>'.$row["p_nama_lengkap"].'</td>';
                                    echo '<td>'.$row["p_no_hp"].'</td>';
                                    echo '<td class="text-center">'.$status.'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.row-->
<?php
break;

case "add":
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="pull-left"><h5>Data Form</h5></span>
                <span class="pull-right"><a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-reply"></i> Back</a></span>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="POST" action="<?php echo $act.'?page='.$getpage;?>&act=save" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subject Career</label>
                        <div class="col-sm-6">
                            <select name="fcat" class="form-control" id="fcat">
                                <?php
                                    $query = "SELECT * FROM info_karir ORDER BY k_title";
                                    $results = $database->get_results( $query );
                                    foreach( $results as $row )
                                    {
                                        echo '<option value="'.$row["k_id"].'">'.$row["k_title"].'</option>';
                                    }
                                ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. KTP</label>
                        <div class="col-sm-6">
                            <input type="text" name="fktp" class="form-control" id="fktp" placeholder="No. KTP">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. NPWP</label>
                        <div class="col-sm-6">
                            <input type="text" name="fnpwp" class="form-control" id="fnpwp" placeholder="No. NPWP">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="femail" class="form-control" id="femail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="fnama" class="form-control" id="fnama" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tempat/Tgl. Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" name="ftempat" class="form-control" id="ftempat" placeholder="Tempat Lahir">
                        </div>
                        <div class="col-sm-5">
                            <input type="date" name="fdate" class="form-control" id="fdate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-2">
                            <select name="fjkel" id="fjkel" class="form-control">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="falamat" class="form-control" id="falamat" placeholder="Alamat" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Telepon</label>
                        <div class="col-sm-6">
                            <input type="text" name="ftel" class="form-control" id="ftel" placeholder="No. Telepon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Headline</label>
                        <div class="col-sm-10">
                            <textarea name="fheadline" class="form-control summernote" id="fheadline" placeholder="Headline"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--/.row-->
<?php
break;

case "info";
$key = htmlspecialchars($_GET["key"], ENT_QUOTES, 'UTF-8');
$query = "SELECT p.*, r.reg_id, r.reg_date, r.reg_status, b.berkas_nama, b.berkas_file, "
        . "b.berkas_status, k.k_title FROM pelamar_kerja AS p "
        . "INNER JOIN registrasi AS r ON r.p_email = p.p_email "
        . "LEFT JOIN berkas_docs AS b ON b.p_email = p.p_email "
        . "INNER JOIN info_karir AS k ON p.k_id = k.k_id "
        . "WHERE p.p_email = '$key' ";
if( $database->num_rows( $query ) > 0 )
{
    list( $pid, $pktp, $pnpwp, $pemail, $pnama, $ptempat, $ptgllhr, $pjkel, $palamat, $ptel, $pheadline, $pkid, 
            $rregid, $rdate, $rstatus, $bnama, $bfile, $bstatus, $ktitle ) = $database->get_row( $query );
    $tgllahir = tgl_indo($ptgllhr);
    $tglreg = tgl_indo($rdate);
    $gender = $pjkel == "L" ? "Laki-Laki" : "Perempuan";
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="pull-left"><h5>Detail Data</h5></span>
                <span class="pull-right"><a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-reply"></i> Back</a></span>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="POST" action="<?php echo $act.'?page='.$getpage;?>&act=update" enctype="multipart/form-data">
                <input type="hidden" name="fkey" value="<?php echo $key;?>" readonly>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subject Career</label>
                        <div class="col-sm-6">
                            <p><?php echo $ktitle; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Headline</label>
                        <div class="col-sm-10">
                            <p><?php echo $pheadline; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. KTP</label>
                        <div class="col-sm-6">
                            <p><?php echo $pktp; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. NPWP</label>
                        <div class="col-sm-6">
                            <p><?php echo $pnpwp; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                            <p><?php echo $pemail; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <p><?php echo $pnama; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tempat/Tgl. Lahir</label>
                        <div class="col-sm-6">
                            <p><?php echo $ptempat.', '.$tgllahir; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-2">
                            <p><?php echo $gender; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <p><?php echo $palamat; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No. Telepon</label>
                        <div class="col-sm-6">
                            <p><?php echo $ptel; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-3">
                            <select name="fstatus" id="fstatus" class="form-control" onchange="this.form.submit()">
                                <?php
                                if($rstatus != 0){
                                    echo '<option value="0">Status Pelamar</option>';
                                    echo '<option value="3">Diterima</option>';
                                    echo '<option value="4">Tidak Diterima</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--/.row-->
<?php
}else{
echo '<div class="row"><div class="col-lg-12"> '
    . '<div class="panel panel-default">'
    . '<div class="panel-body"><h2 class="text-center">Data Not Available</h2></div>'
    . '</div>'
    . '</div></div>';
}
break;
}
?>