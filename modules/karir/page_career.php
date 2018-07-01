<?php
    $key = htmlspecialchars($_GET["key"], ENT_QUOTES, 'UTF-8');
    $query = "SELECT k_id, skk_id, k_title, k_slug, k_desc, k_requirements FROM info_karir WHERE k_slug = '$key'";
    if( $database->num_rows( $query ) > 0 )
    {
        list( $id, $skkid, $title, $slug, $desc, $requirements ) = $database->get_row( $query );
        $fid = (int)$id;
        $fskkid = (int)$skkid;
        $pagetitle = $title;
        $fslug = $slug;
        $fdesc = nl2br($desc);
        $frequirements = nl2br($requirements);
    }
?>
<div class="row">
    <div class="col-md-9 offset-md-1">
        <h3 class="mt-4 mb-3"><?php echo $pagetitle; ?></h3>
        <hr>
        <strong>Description</strong>
        <p><?php echo $fdesc; ?></p>
        <strong>Requirements</strong>
        <p><?php echo $frequirements; ?></p>
        <hr>
        <button onclick="location.href='?page=apply-job-new&key=<?php echo $fslug; ?>';" class="btn btn-primary">Apply</button>
    </div>
</div>
<div class="mt-4 mb-3"></div>