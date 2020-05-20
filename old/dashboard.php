<?php
    require("functions.php");
    checkSession();
?>

<!DOCTYPE html>
<html>

<head>
	<title>DCF Policies</title>

	<!-- Meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="NJ DCF Policies">

	<!-- Bootstrap, CSS, and JS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="NJPage.css">
	<script type="text/javascript" src="NJPage.js"></script>

	<link rel="icon" type="favicon" href="favicon.ico"/>

</head>

<body>
	<!-- Sidebar -->
	<div class="nav-side-menu">
		<h3 class="text-center name">NJ DCF Policies</h3>
        <form action="logout.php">
            <input type="submit" class="btn btn-primary login mx-auto d-block" value="Logout" />
        </form>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	
			<div class="menu-list">
	
				<ul id="menu-content" class="menu-content collapse out">
					<li>
						<a href="#">Dashboard</a>
					</li>

					<li  data-toggle="collapse" data-target="#products" class="collapsed active">
						<a href="#">Test 1<span class="arrow"></span></a>
					</li>
					<ul class="sub-menu collapse" id="products">
						<li class="active"><a href="#">RFT-H1</a></li>
						<li><a href="#">RFT-H2</a></li>
						<li><a href="#">BTB-H1</a></li>
						<li><a href="#">BTB-H2</a></li>
					</ul>


					<li data-toggle="collapse" data-target="#service" class="collapsed">
						<a href="#">Test 2<span class="arrow"></span></a>
					</li>  
					<ul class="sub-menu collapse" id="service">
						<li>Trendmonitoring</li>
						<li>Alarmmonitoring</li>
						<li>Audit-Trail</li>
					</ul>


					<li data-toggle="collapse" data-target="#new" class="collapsed">
						<a href="#">Test 3<span class="arrow"></span></a>
					</li>
					<ul class="sub-menu collapse" id="new">
						<li>Alarmstatistik</li>
						<li>Prozessfähigkeit</li>
					</ul>


					<li>
						<a href="#">Test 4</a>
					</li>

					<li data-toggle="collapse" data-target="#new" class="collapsed">
						<a href="#">Test 5<span class="arrow"></span></a>
					</li>
					<ul class="sub-menu collapse" id="new">
						<li>Sensorkonfiguration</li>
						<li>Betriebsarten</li>
					</ul>

				</ul>
		</div>
	</div>

	<div class="container-fluid">
			<div class="jumbotron">
				<img src="seal-dcf.jpg" class="mx-auto d-block logo" alt="Logo"><hr>
				<?php showAlert(); ?>
				<h1>DCF Policy Admin</h1><hr>
				<h4>Add a new change:</h4>
                <button type="button" class=" btn btn-primary mx-auto d-block" data-toggle="modal" data-target="#changes">Add a new change</button><hr>
				<h4>View file changes:</h4>
                <form method="get">
					<div class="form-group">
						<select class="form-control" name="file" onchange="this.form.submit()">
							<?php showChangeOptions(); ?>
						</select>
					</div>
				</form>
				<?php showChanges($_GET['file']); ?>
				<h4>How to Make Changes</h4>
				<p> Follow the guided videos below to make changes to different files.</p>
				<!--<img src="DBimg1.PNG" width="80%">-->
				<video width="80%" controls>
  					<source src="createUser.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video> 
			</div>

            <!-- Changes Modal -->
            <div class="modal fade" id="changes" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="replyLabel">Add New Change</h5>
                            <button type="btn" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="panel mx-auto">
                                <form method="post" action="addChange.php">
									<div class="form-group">
										<label>Filename</label>
										<input type="text" class="form-control" name="file" placeholder="file.txt" required>
									</div>
                                    <div class="form-group">
										<label>Description</label>
                                        <textarea name="change" rows="5" class="form-control textBx" placeholder="This file was changed..." required></textarea>
                                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

	</div>
</body>
</html>