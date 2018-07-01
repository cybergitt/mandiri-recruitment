<?php
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");

$fkid = isset($_POST["fid"]) ? filter_var($_POST['fid'], FILTER_SANITIZE_NUMBER_INT) : 0;
$fktp = isset($_POST["fktp"]) ? filter_var($_POST['fktp'], FILTER_SANITIZE_STRING) : "0000000000000000";
$fnpwp = isset($_POST["fnpwp"]) ? filter_var($_POST['fnpwp'], FILTER_SANITIZE_STRING) : "000000000000000";
$femail = isset($_POST["femail"]) ? filter_var($_POST['femail'], FILTER_SANITIZE_EMAIL) : null;
$fnama = isset($_POST["fnama"]) ? filter_var($_POST['fnama'], FILTER_SANITIZE_STRING) : null;
$ftempat = isset($_POST["ftempat"]) ? filter_var($_POST['ftempat'], FILTER_SANITIZE_STRING) : null;
$ftgl = isset($_POST["ftgl"]) ? filter_var($_POST['ftgl'], FILTER_SANITIZE_STRING) : "1900-01-01";
$fjkel = isset($_POST["fjkel"]) ? filter_var($_POST['fjkel'], FILTER_SANITIZE_STRING) : "L";
$falamat = isset($_POST["falamat"]) ? filterInput($_POST["falamat"]) : null;
$ftel = isset($_POST["ftel"]) ? filter_var($_POST['ftel'], FILTER_SANITIZE_STRING) : null;
$fheadline = isset($_POST["fheadline"]) ? filter_var($_POST['fheadline'], FILTER_SANITIZE_STRING) : null;

$furl = isset($_POST["furl"]) ? filter_var($_POST['furl'], FILTER_SANITIZE_STRING) : null;
$fregid = register_id();

$random = rand(000000,999999);
$fupload = $_FILES['fupload'];


/**
 * Checking to see if a value exists
 */
$check_column = 'p_email';
$check_for = array( 'p_email' => $femail );
$exists = $database->exists( 'pelamar_kerja', $check_column,  $check_for );
if( $exists )
{
    $url = $baseurl.'?page='.$furl;
    echo "<script type='text/javascript'>alert('Alamat email sudah terdaftar, "
        . "Aplikasi Anda telah ada di sistem kami dan akan kami pertimbangkan kembali "
        . "untuk rekruitment mendatang.');window.location.href = '".$url."';</script>";
    exit();
}else{    
    $arrValue = array(
        'p_ktp' => $fktp,
        'p_npwp' => $fnpwp,
        'p_email' => $femail,
        'p_nama_lengkap' => $fnama,
        'p_tmpt_lahir' => $ftempat,
        'p_tgl_lahir' => $ftgl,
        'p_jkel' => $fjkel,
        'p_alamat' => $falamat,
        'p_no_hp' => $ftel,
        'p_headline' => $fheadline,
        'k_id' => $fkid
    );

    $arrValue_r = array(
        'reg_id' => $fregid,
        'reg_date' => date("Y-m-d"),
        'p_email' => $femail,
        'reg_status' => 1
    );
    
    
    if(empty($fupload['tmp_name'])){
        $arrValue_b = array(
            'p_email' => $femail,
            'berkas_status' => 1
        );
    }else{
        uploadDocs($fupload, $random."_", "docs");
        $arrValue_b = array(
            'p_email' => $femail,
            'berkas_nama' => "Resume ".$femail,
            'berkas_file' => $random."_".$fupload['name'],
            'berkas_status' => 1
        );
    }

    $add_query = $database->insert( 'pelamar_kerja', $arrValue );
    if( $add_query )
    {
        $add_query_r = $database->insert( 'registrasi', $arrValue_r );
        $add_query_b = $database->insert( 'berkas_docs', $arrValue_b );

//        $_SESSION['vcUid'] = $femail;
        $url = $baseurl;
        echo "<script type='text/javascript'>alert('Aplikasi lamaran Anda telah kami terima \n "
            . "kami akan menghubungi Anda kembali jika spesifikasi anda sesuai dengan kriteria kami.');window.location.href = '".$url."';</script>";
        exit();
    }
}
?>