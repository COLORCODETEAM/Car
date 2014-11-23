﻿<?php 
include 'src/class/ManageCar.php';
$objcar = new ManageCar();
if(@$_GET['delete']=='true'){
	$id = $_GET['id'];
	if($objcar->delete($id))
		echo '<meta http-equiv=REFRESH CONTENT=0;url=ManageCarProfile.php>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ระบบจัดแสดงรถยนต์</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
<!--script src="js/less-1.3.3.min.js"></script-->
<!--append ‘#!watch’ to the browser URL, then refresh the page. -->

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/modern-business.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
        <![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="img/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="img/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="img/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="img/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="img/favicon.png">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
	<!-- Navigation panel -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">หน้าหลัก</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">เปรียบเทียบรถยนต์</a>
					</li>
					<li>
						<a href="ManageCarProfile.php">จัดการรถยนต์</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการหมวดหมู่รถยนต์<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="ManageBrand.php">จัดการยี่ห้อ</a>
							</li>
							<li>
								<a href="ManageModel.php">จัดการรุ่น</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">จัดการสมาชิก</a>
					</li>
				</ul>
				<!-- Login form -->
				<form class="form-inline pull-right" style="margin-top:10px;" role="form">
					<div class="form-group">
						<div class="input-group">
							<label class="sr-only" for="exampleInputEmail2">ชื่อผู้ใช้</label>
							<input type="email" class="form-control" id="exampleInputEmail2" placeholder="ชื่อผู้ใช้">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputPassword2">รหัสผ่าน</label>
						<input type="password" class="form-control" id="exampleInputPassword2" placeholder="รหัสผ่าน">
					</div>
					<button type="submit" class="btn btn-default">เข้าสู่ระบบ</button>
					<div class="form-inline">
						<label>
							<a href="#">สมัครสมาชิก</a>
						</label>
					</div>
				</form>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
		<div>
		</div>
	</nav>
	
	<!-- Header image -->
	<header id="myCarousel" class="carousel slide">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
				<div class="carousel-caption">
					<h2>Caption 1</h2>
				</div>
			</div>
			<div class="item">
				<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
				<div class="carousel-caption">
					<h2>Caption 2</h2>
				</div>
			</div>
			<div class="item">
				<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
				<div class="carousel-caption">
					<h2>Caption 3</h2>
				</div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="icon-next"></span>
		</a>
	</header>
		
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class=" panel panel-default">
					<div class="panel-heading">
						<h4>รายการรถยนต์</h4>
						<small></small>
					</div>

					<div class="panel-body">
						<div class="row clearfix">
							<div class="col-md-12 column">
								<a href="addCarProfile.php"><button type="button"
										class="btn btn-primary btn-lg">เพิ่มรถยนต์</button></a>
								<table class="table">
									<thead>
										<tr>
											<th>จัดการ</th>
											<th>รายการ</th>

										</tr>
									</thead>
									<tbody>
                                         <?php 

                                        $rsCar = $objcar->getCarAll();
                                        while($rowCar = mysql_fetch_object($rsCar)){
                                        ?>
                                            <tr>
											<td>
												<a href="editCarProfile.php?id=<?php echo $rowCar->id;?>"<button type="button" class="btn btn-warning btn-lg">แก้ไข&nbsp;</button></a>
												<a href="ManageCarProfile.php?delete=true&id=<?php echo $rowCar->id;?>"><button type="button" class="btn btn-danger btn-lg">&nbsp;&nbsp;&nbsp;ลบ&nbsp;&nbsp;</button></a>
											</td>
											<td><?php echo $rowCar->car_year.' '.$rowCar->body_number.' '.$rowCar->fuel_tank?></td>
										</tr>

<?php }?>
									</tbody>
								</table>
							</div>
						</div>

						<nav>
							<ul class="pagination">
								<li><a>หน้าที่</a></li>
								<li><a href="#"><span aria-hidden="true">&laquo;</span><span
										class="sr-only">Previous</span></a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#"><span aria-hidden="true">&raquo;</span><span
										class="sr-only">Next</span></a></li>
							</ul>
						</nav>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column"></div>
	</div>
	</div>
	<div class="row clearfix">
		<p></p>
	</div>
	<footer class="panel-footer">
		<div class="container">
			<p class="text-muted">Copyright © Your Website 2014</p>
		</div>
	</footer>

</body>
</html>
