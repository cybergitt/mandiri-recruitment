<h3 class="mt-4 mb-3">Karir Mandiri</h3>

<p>
    At Mandiri, we offer various career opportunities that will help you to explore 
    and expand your strengths. You can join us through our new graduate and internship programs 
    or as experienced professionals looking to switch careers and prosper the nation. 
    Come in and find out which job best fits you.
</p>

<div class="row">
<?php
    $statement = "kategori_karir ORDER BY kk_title";
    $query = "SELECT * FROM {$statement}";
    $results = $database->get_results( $query );
    foreach( $results as $row )
    {
        $img_path = UPLOADS_DIR . 'images' . DIRECTORY_SEPARATOR;
        $pict = !empty($row["kk_pict"]) ? '<img class="card-img-top" src="'.$img_path.$row["kk_pict"].'" alt="'.nohtml($row["kk_title"]).'">' : '<img src="http://placehold.it/700x400" alt="" class="card-img-top">';
        
        echo '<div class="col-lg-4 col-sm-6">';
        echo '<div class="card h-100">';
            echo '<a href="#">'.$pict.'</a>';
            echo '<div class="card-body">';
                echo '<h4 class="card-title">';
                    echo $row["kk_title"];
                echo '</h4>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
    }
?>  
</div>

<div class="mt-4 mb-3"></div>