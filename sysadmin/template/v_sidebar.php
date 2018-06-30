	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
                            <div class="profile-usertitle-name"><a href="?page=user-list&act=edit&key=<?php echo $_SESSION['vUser']; ?>"><?php echo $_SESSION['vName']; ?></a></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="<?php echo $baseurl; ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                        <li><a href="?page=list-pelamar"><em class="fa fa-user-circle-o">&nbsp;</em> List Applicants</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                            <em class="fa fa-suitcase">&nbsp;</em> Career <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                            </a>
                            <ul class="children collapse" id="sub-item-1">
                                <li>
                                    <a class="" href="?page=list-kategori">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Career Category
                                    </a>
                                </li>
                                <li>
                                    <a class="" href="?page=list-sub-kategori">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Career Sub Category
                                    </a>
                                </li>
                                <li>
                                    <a class="" href="?page=list-karir">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Career List
                                    </a>
                                </li>
                            </ul>
			</li>
                        <li><a href="?page=user-list"><em class="fa fa-user-md">&nbsp;</em> User List</a></li>
                        <li><a href="?page=list-pages"><em class="fa fa-sitemap">&nbsp;</em> Site Pages</a></li>
                        <li><a href="#"><em class="fa fa-book">&nbsp;</em> Reports</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->