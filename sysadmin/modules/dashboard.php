        <?php
            $pagetitle = "Dashboard";
            $query_o = "SELECT 1 FROM registrasi WHERE reg_status = 1";
            $num_o = (int)$database->num_rows( $query_o );
            
            $query_m = "SELECT 1 FROM registrasi WHERE reg_status = 3";
            $num_m = (int)$database->num_rows( $query_m );
            
            $query_p = "SELECT 1 FROM registrasi WHERE reg_status = 4";
            $num_p = (int)$database->num_rows( $query_p );
        ?>
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
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

        <div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php echo $num_m;?></div>
							<!--<div class="large">0</div>-->
							<div class="text-muted">Total Applicants</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-user-circle color-blue"></em>
							<div class="large"><?php echo $num_o;?></div>
							<!--<div class="large">0</div>-->
							<div class="text-muted">Total Passed</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-user-circle-o color-red"></em>
							<div class="large"><?php echo $num_p;?></div>
							<!--<div class="large">0</div>-->
							<div class="text-muted">Total Not Passed</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">New Applicant</div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Reg. No</th>
                                <th>Date</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Subject Career</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT r.reg_id, r.reg_date, p.p_nama_lengkap, p.p_jkel, p.p_email, k.k_title "
                                        . "FROM pelamar_kerja AS p "
                                        . "INNER JOIN registrasi AS r ON r.p_email = p.p_email "
                                        . "INNER JOIN info_karir AS k ON p.k_id = k.k_id "
                                        . "WHERE DATE(r.reg_date) = CURDATE() AND r.reg_status = 1 ORDER BY r.reg_id DESC";
                                $results = $database->get_results( $query );
                                foreach( $results as $row )
                                {
                                    $maskemail = md5($row["p_email"]);
                                    echo "<tr>";
                                        echo "<td>
                                                <a href='?page=list-pelamar&act=info&key=$maskemail'><i class='fa fa-eye'></i> View</a>
                                            </td>";
                                        echo "<td>#$row[reg_id]</td>";
                                        echo "<td>". tgl_indo($row[reg_date]) ."</td>";
                                        echo "<td>$row[p_nama_lengkap]</td>";
                                        echo "<td>$row[p_email]</td>";
                                        echo "<td>". strtoupper($row[k_title]) ."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->