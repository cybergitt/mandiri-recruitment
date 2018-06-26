<?php
session_start();
$isLoggedIn = $_SESSION['isLoggedin'];

if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
    header('HTTP/1.1 403 Forbidden.', TRUE, 403);
    echo 'You dont have permissions to access this page! <a href="javascript:history.back()">Back</a>';
    exit(1); // EXIT_ERROR
}else{
    require("../../../includes/constants.php");
    require("../../../includes/common_helper.php");
    require_once("../../../includes/class.db.php");
//    include("../../../includes/verot_upload/class.upload.php");
    $database = DB::getInstance();

    $getpage = htmlspecialchars($_GET["page"], ENT_QUOTES, 'UTF-8');
    $getact = htmlspecialchars($_GET["act"], ENT_QUOTES, 'UTF-8');

    // Save data
    if ($getpage == "list-kategori" AND $getact == "save"){
        $random = rand(000000,999999);
        $ftitle = isset($_POST["ftitle"]) ? filter_var($_POST['ftitle'], FILTER_SANITIZE_STRING) : null;
        $fslug = strtolower(str_replace(" ", "-", $ftitle));
        $fdesc = isset($_POST["fdesc"]) ? $_POST['fdesc'] : null;
        $fupload = $_FILES['fupload'];
        
        $arrValue = array();
        
        if(empty($fupload['tmp_name'])){
            $arrValue = array(
                'kk_title' => $ftitle,
                'kk_slug' => $fslug,
                'kk_desc' => $fdesc
            );
        }else{
            uploadFile($fupload, "cat_".$random, "images");
            $arrValue = array(
                'kk_title' => $ftitle,
                'kk_slug' => $fslug,
                'kk_desc' => $fdesc,
                'kk_pict' => "cat_".$random.$fupload['name']
            );
        }

        $add_query = $database->insert( 'kategori_karir', $arrValue );
        if( $add_query )
        {
            header('location:../../?page='.$getpage);
        }
    }
    // Update data
    elseif ($getpage == "list-kategori" AND $getact == "update"){
        $random = rand(000000,999999);
        $fkey = isset($_POST["fkey"]) ? filter_var($_POST['fkey'], FILTER_SANITIZE_STRING) : null;
        $ftitle = isset($_POST["ftitle"]) ? filter_var($_POST['ftitle'], FILTER_SANITIZE_STRING) : null;
        $fslug = isset($_POST["fslug"]) ? filter_var($_POST['fslug'], FILTER_SANITIZE_STRING) : null;
        $fdesc = isset($_POST["fdesc"]) ? $_POST['fdesc'] : null;
        $fupload = $_FILES['fupload'];
        
        $arrValue = array();
        
        if(empty($fupload['tmp_name'])){
            $arrValue = array(
                'kk_title' => $ftitle,
                'kk_slug' => $fslug,
                'kk_desc' => $fdesc
            );
        }else{
            uploadFile($fupload, "cat_".$random, "images");
            $arrValue = array(
                'kk_title' => $ftitle,
                'kk_slug' => $fslug,
                'kk_desc' => $fdesc,
                'product_pict' => "cat_".$random.$fupload['name']
            );
        }
        
        //Add the WHERE clauses
        $arrWhere = array(
            'kk_id' => $fkey
        );
        $updated = $database->update( 'kategori_karir', $arrValue, $arrWhere, 1 );
        if( $updated )
        {
            header('location:../../?page='.$getpage);
        }
    }
    // Delete data
    elseif ($getpage == "list-kategori" AND $getact == "delete"){
        $key = htmlspecialchars($_GET["key"], ENT_QUOTES, 'UTF-8');
        $query = "SELECT kk_pict FROM kategori_karir WHERE kk_id = '$key' ";
        //Add the WHERE clauses
        $where_clause = array(
            'kk_id' => $key
        );
        if( $database->num_rows( $query ) > 0 )
        {
            list( $pict ) = $database->get_row( $query );
        }
        if (!empty($pict)){
            //Query delete
            $deleted = $database->delete( 'kategori_karir', $where_clause);
            if( $deleted )
            {
                unlink("../../../uploads/images/$pict");
            }
             
        }
        else{
            //Query delete
            $deleted = $database->delete( 'kategori_karir', $where_clause);
        }
        header('location:../../?page='.$getpage);
    }
}
?>