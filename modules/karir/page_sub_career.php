<?php
    $key = htmlspecialchars((int)$_GET["key"], ENT_QUOTES, 'UTF-8');
    $query = "SELECT kk_id, kk_title, kk_desc FROM kategori_karir WHERE kk_id = '$key'";
    if( $database->num_rows( $query ) > 0 )
    {
        list( $id, $title, $desc ) = $database->get_row( $query );
        $pagetitle = $title;
        $fdesc = nl2br($desc);
    }
?>
<h3 class="mt-4 mb-3"><?php echo $pagetitle; ?></h3>

<p>
    <?php echo $fdesc; ?>
</p>

<div id="accordion">
<?php
    $statement = "sub_kategori_karir WHERE kk_id = '$key' ORDER BY skk_title ASC";
    $query = "SELECT * FROM {$statement} ";
    $results = $database->get_results( $query );
    $i = 0;
    foreach( $results as $row )
    {
        $sid = (int)$row["skk_id"];
        $stitle = nohtml($row["skk_title"]);
        $sdesc = nl2br($row["skk_desc"]);
        $i++;
    ?>
        <div class="card-box">
            <div class="card-header" id="heading<?php echo $i;?>">
                <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-angle-right"></i> <?php echo nohtml($stitle); ?>
                </button>
                </h5>
            </div>

            <div id="collapse<?php echo $i;?>" class="collapse" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordion">
                <div class="card-body">
                    <?php echo $sdesc;?>
                    <?php
                        $statement1 = "info_karir WHERE skk_id = '$sid' ORDER BY k_title ASC";
                        $query1 = "SELECT * FROM {$statement1} ";
                        if( $database->num_rows( $query1 ) > 0 )
                        {
                            $results1 = $database->get_results( $query1 );
                    ?>
                        <table class="table table-borderless table-striped">
                            <tr>
                                <th>Subject Career</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            foreach( $results1 as $r )
                            {
                                $kslug = nohtml($r['k_slug']);
                                $ktitle = nohtml($r['k_title']);
                                echo '<tr>';
                                    echo '<td>'.$ktitle.'</td>';
                                    echo '<td><a href="?page=apply-job&key='.$kslug.'" class="btn btn-primary">Apply</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
<?php
    }
?>  
</div>
<div class="mt-4 mb-3"></div>