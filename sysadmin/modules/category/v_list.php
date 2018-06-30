<?php
$pagetitle = "Career Category";
$act = "modules/category/do_task.php";

$getpage = "list-kategori";
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
                            <th>Title</th>
                            <th>Url Slug</th>
                            <th>Pict</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM kategori_karir ORDER BY kk_id DESC ";
                            $results = $database->get_results( $query );
                            foreach( $results as $row )
                            {
                                $img_path = '../' . UPLOADS_DIR . 'images' . DIRECTORY_SEPARATOR;
                                $pict = !empty($row["kk_pict"]) ? '<img class="img-responsive" src="'.$img_path.$row["kk_pict"].'" width="100px">' : 'NO IMAGE';
                                echo '<tr>';
                                    echo '<td>
                                            <a href="?page='.$getpage.'&act=edit&key='.$row["kk_id"].'"><i class="fa fa-edit"></i> Edit</a> | 
                                            <a href="'.$act.'?page='.$getpage.'&act=delete&key='.$row["kk_id"].'"><i class="fa fa-trash"></i> Delete</a>
                                        </td>';
                                    echo '<td>'.$row["kk_title"].'</td>';
                                    echo '<td>'.$row["kk_slug"].'</td>';
                                    echo '<td class="text-center">'.$pict.'</td>';
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
                        <label class="col-sm-2 control-label">Picture</label>
                        <div class="col-sm-6">
                            <input type="file" name="fupload" class="form-control" id="fupload" accept="image/x-png,image/jpeg">
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
$query = "SELECT * FROM kategori_karir WHERE kk_id = '$key' ";
if( $database->num_rows( $query ) > 0 )
{
    list( $id, $title, $slug, $desc, $pict ) = $database->get_row( $query );
    
    $img_path = "../" . UPLOADS_DIR . "images" . DIRECTORY_SEPARATOR;
    $img = !empty($pict) ? '<img class="img-responsive" src="'.$img_path.$pict.'">' : 'NO IMAGE';
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
                        <label class="col-sm-2 control-label">Picture</label>
                        <div class="col-sm-6">
                            <?php echo $img;?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Change Picture</label>
                        <div class="col-sm-6">
                            <input type="file" name="fupload" class="form-control" id="fupload" accept="image/x-png,image/jpeg">
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