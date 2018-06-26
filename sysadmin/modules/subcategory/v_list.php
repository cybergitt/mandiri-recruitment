<?php
$pagetitle = "Sub Career Category";
$act = "modules/subcategory/do_task.php";

$getpage = "list-sub-kategori";
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
                            <th>Career Category</th>
                            <th>Title</th>
                            <th>Url Slug</th>
                            <th>Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT s.*, k.kk_title FROM sub_kategori_karir AS s "
                                    . "INNER JOIN kategori_karir AS k ON s.kk_id = k.kk_id "
                                    . "ORDER BY s.skk_id DESC ";
                            $results = $database->get_results( $query );
                            foreach( $results as $row )
                            {
                                $publish = $row["skk_publish"] == "Y" ? "Yes" : "No";
                                echo '<tr>';
                                    echo '<td>
                                            <a href="?page='.$getpage.'&act=edit&key='.$row["skk_id"].'"><i class="fa fa-edit"></i> Edit</a> | 
                                            <a href="'.$act.'?page='.$getpage.'&act=delete&key='.$row["skk_id"].'"><i class="fa fa-trash"></i> Delete</a>
                                        </td>';
                                    echo '<td>'.$row["kk_title"].'</td>';
                                    echo '<td>'.$row["skk_title"].'</td>';
                                    echo '<td>'.$row["skk_slug"].'</td>';
                                    echo '<td class="text-center">'.$publish.'</td>';
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
                <h5>Data Form</h5>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="POST" action="<?php echo $act.'?page='.$getpage;?>&act=save" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category Career</label>
                        <div class="col-sm-6">
                            <select name="fcat" class="form-control" id="fcat">
                                <?php
                                    $query = "SELECT * FROM kategori_karir ORDER BY kk_title";
                                    $results = $database->get_results( $query );
                                    foreach( $results as $row )
                                    {
                                        echo '<option value="'.$row["kk_id"].'">'.$row["kk_title"].'</option>';
                                    }
                                ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="ftitle" class="form-control" id="ftitle" placeholder="Career Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="fdesc" class="form-control summernote" id="fdesc" placeholder="Career Description"></textarea>
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
$query = "SELECT * FROM sub_kategori_karir WHERE skk_id = '$key' ";
if( $database->num_rows( $query ) > 0 )
{
    list( $id, $kid, $title, $slug, $desc, $publish ) = $database->get_row( $query );
    $p_yess = $publish == "Y" ? "selected" : "";
    $p_no = $publish == "N" ? "selected" : "";
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>Data Form</h5>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="POST" action="<?php echo $act.'?page='.$getpage;?>&act=update" enctype="multipart/form-data">
                <input type="hidden" name="fkey" value="<?php echo $key;?>" readonly>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category Career</label>
                        <div class="col-sm-6">
                            <select name="fcat" class="form-control" id="fcat">
                                <?php
                                    $query = "SELECT * FROM kategori_karir ORDER BY kk_title";
                                    $results = $database->get_results( $query );
                                    foreach( $results as $row )
                                    {
                                        if($row["kk_id"] == $kid){
                                            echo '<option value="'.$row["kk_id"].'" selected>'.$row["kk_title"].'</option>';
                                        }else{
                                            echo '<option value="'.$row["kk_id"].'">'.$row["kk_title"].'</option>';
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