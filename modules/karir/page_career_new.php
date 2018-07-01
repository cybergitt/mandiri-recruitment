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
        <form role="form" class="form-horizontal" method="POST" action="?page=do_apply_career" enctype="multipart/form-data">
        <input type="hidden" name="fid" value="<?php echo $fid;?>" readonly>
        <input type="hidden" name="furl" value="<?php echo $getpage.'&key='.$key;?>" readonly>
            <div class="form-group row">
                <label class="col-sm-2 control-label">No. KTP</label>
                <div class="col-sm-6">
                    <input type="text" name="fktp" class="form-control" id="fktp" placeholder="No. KTP">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">No. NPWP</label>
                <div class="col-sm-6">
                    <input type="text" name="fnpwp" class="form-control" id="fnpwp" placeholder="No. NPWP">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="femail" class="form-control" id="femail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" name="fnama" class="form-control" id="fnama" placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Tempat/Tgl. Lahir</label>
                <div class="col-sm-5">
                    <input type="text" name="ftempat" class="form-control" id="ftempat" placeholder="Tempat Lahir">
                </div>
                <div class="col-sm-3">
                    <input type="date" name="ftgl" class="form-control" id="ftgl">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-3">
                    <select name="fjkel" id="fjkel" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea name="falamat" class="form-control" id="falamat" placeholder="Alamat" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">No. Telepon</label>
                <div class="col-sm-6">
                    <input type="text" name="ftel" class="form-control" id="ftel" placeholder="No. Telepon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Headline</label>
                <div class="col-sm-10">
                    <textarea name="fheadline" class="form-control summernote" id="fheadline" placeholder="Headline"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Upload Resume</label>
                <div class="col-sm-6">
                    <input name="fupload" id="fupload" type="file" class="form-control" required="required">
                    <small>Harap upload CV Anda dalam format pdf atau word.</small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Submit your application</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="mt-4 mb-3"></div>