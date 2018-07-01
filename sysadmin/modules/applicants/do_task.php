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
    if ($getpage == "list-pelamar" AND $getact == "save"){
        $random = rand(000000,999999);
        $fcat = isset($_POST["fcat"]) ? filter_var($_POST['fcat'], FILTER_SANITIZE_NUMBER_INT) : null;
        $ftitle = isset($_POST["ftitle"]) ? filter_var($_POST['ftitle'], FILTER_SANITIZE_STRING) : null;
        $fslug = strtolower(str_replace(" ", "-", $ftitle));
        $fdesc = isset($_POST["fdesc"]) ? $_POST['fdesc'] : null;
        $freq = isset($_POST["freq"]) ? $_POST['freq'] : null;
        
        $arrValue = array();
        
        $arrValue = array(
            'skk_id' => $fcat,
            'k_title' => $ftitle,
            'k_slug' => $fslug,
            'k_desc' => $fdesc,
            'k_requirements' => $freq
        );

        $add_query = $database->insert( 'info_karir', $arrValue );
        if( $add_query )
        {
            header('location:../../?page='.$getpage);
        }
    }
    // Update data
    elseif ($getpage == "list-pelamar" AND $getact == "update"){
        $fkey = isset($_POST["fkey"]) ? filter_var($_POST['fkey'], FILTER_SANITIZE_STRING) : null;
        $fstatus = isset($_POST["fstatus"]) ? filter_var($_POST['fstatus'], FILTER_SANITIZE_NUMBER_INT) : null;
        
        $arrValue = array();
        
        $arrValue = array(
            'reg_status' => $fstatus
        );
        
        //Add the WHERE clauses
        $arrWhere = array(
            'p_email' => $fkey
        );
        $updated = $database->update( 'registrasi', $arrValue, $arrWhere, 1 );
        if( $updated )
        {
            header('location:../../?page='.$getpage);
        }
    }
    // Delete data
    elseif ($getpage == "list-pelamar" AND $getact == "delete"){
        $key = htmlspecialchars($_GET["key"], ENT_QUOTES, 'UTF-8');
        //Add the WHERE clauses
        $where_clause = array(
            'k_id' => $key
        );
        //Query delete
        $deleted = $database->delete( 'info_karir', $where_clause);
        header('location:../../?page='.$getpage);
    }
}
?>