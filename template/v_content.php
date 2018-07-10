<!-- Page Content -->
<div class="container">
    <?php
    // Checking if the string contains parent directory
    if (strstr($_GET['page'], '../') !== false) {
        throw new \Exception("Directory traversal attempt!");
    }

    // Checking remote file inclusions
    if (strstr($_GET['page'], 'file://') !== false) {
        throw new \Exception("Remote file inclusion attempt!");
    }

//    if (empty($_SESSION['isSession'])){
        $page_files = array( 
            'career-cat'=>'modules/karir/page_sub_career.php',
            'apply-job'=>'modules/karir/page_career.php',
            'apply-job-new'=>'modules/karir/page_career_new.php',
            'do_apply_career'=>'modules/karir/do_submit_career.php',
            'selection-results'=>'modules/hasil-seleksi/page_seleksi.php',
            'home'=>'modules/home.php'
        );
//    }else{
//        $page_files = array(
//            'home'=>'modules/home.php'
//        );
//    }

    if (in_array($_GET['page'],array_keys($page_files))) {
        include $page_files[$_GET['page']];
    } else {
        include $page_files['home'];
    }

    ?>
</div>