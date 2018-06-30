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
                <span class="pull-right"><button class="btn btn-primary" onclick="location.href='?page=<?php echo $getpage; ?>&act=add';"><i class="fa fa-plus-circle"></i> Add New</button> </span>
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
                            $query = "SELECT p.*, k.k_title FROM pelamar_kerja AS p "
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
                                            <a href="?page='.$getpage.'&act=edit&key='.$row["p_email"].'"><i class="fa fa-edit"></i> Edit</a> | 
                                            <a href="'.$act.'?page='.$getpage.'&act=delete&key='.$row["p_email"].'"><i class="fa fa-trash"></i> Delete</a>
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

case "edit";
$key = htmlspecialchars($_GET["key"], ENT_QUOTES, 'UTF-8');
$query = "SELECT * FROM info_karir WHERE k_id = '$key' ";
if( $database->num_rows( $query ) > 0 )
{
    list( $id, $skkid, $title, $slug, $desc, $req, $publish ) = $database->get_row( $query );
    $p_yess = $publish == "Y" ? "selected" : "";
    $p_no = $publish == "N" ? "selected" : "";
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="pull-left"><h5>Data Form</h5></span>
                <span class="pull-right"><a href="javascript:history.back()" class="btn btn-default"><i class="fa fa-reply"></i> Back</a></span>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="POST" action="<?php echo $act.'?page='.$getpage;?>&act=update" enctype="multipart/form-data">
                <input type="hidden" name="fkey" value="<?php echo $key;?>" readonly>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category Career</label>
                        <div class="col-sm-6">
                            <select name="fcat" class="form-control" id="fcat">
                                <?php
                                    $query = "SELECT * FROM sub_kategori_karir ORDER BY skk_title";
                                    $results = $database->get_results( $query );
                                    foreach( $results as $row )
                                    {
                                        if($row["skk_id"] == $kid){
                                            echo '<option value="'.$row["skk_id"].'" selected>'.$row["skk_title"].'</option>';
                                        }else{
                                            echo '<option value="'.$row["skk_id"].'">'.$row["skk_title"].'</option>';
                                        }
                                    }
                                ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="ftitle" class="form-control" id="ftitle" value="<?php echo $title;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Url Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="fslug" class="form-control" id="fslug" value="<?php echo $slug;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="fdesc" class="form-control summernote" id="fdesc"><?php echo $desc;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Requirements</label>
                        <div class="col-sm-10">
                            <textarea name="freq" class="form-control summernote" id="freq"><?php echo $req;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Publish</label>
                        <div class="col-sm-2">
                            <select name="fpublish" class="form-control" id="fpublish">
                                <option value="Y" <?php echo $p_yess;?>>Yes</option>
                                <option value="N" <?php echo $p_no;?>>No</option>
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