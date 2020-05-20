<?php
	require("functions.php");
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

	<!-- JS Tree -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/themes/default/style.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/jstree.min.js"></script>

</head>

<body>
	<!-- Sidebar -->
	<div class="nav-side-menu">
		<h3 class="text-center name">NJ DCF Policies</h3>
		<button type="button" class=" btn btn-primary login mx-auto d-block" data-toggle="modal" data-target="#login"><i class="fa icon fa-sign-in fa-lg"></i>Login</button>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	<!--
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
		-->

		<div id="treecontainer"></div>
<script>
$(function() {
  $('#treecontainer').jstree({
    'core' : {
      'data' : [
        { "text" : "Vol 1: Mission, Vision, and Guiding Principles", "children" : [
			{ "text" : "Child node 1", "children" : [
				{"text":"Super Child1"}, 
				{"text":"Super Child2"}
			]},
            { "text" : "Child node 2"}
          ]
		} , 
		{ "text": "CPP-I-A-1-300: Partnership in Assessment, Case Planning, and Service Implementation", "children" : [
			{"text":"Super Child1"}, 
			{"text":"Super Child2",
				"attr" : { "href" : "http://www.google.com" } }
		]}
      ]
    }
  });

  $("#treecontainer").jstree().bind("select_node.jstree", function (e, data) {
	if (href[0] !== "#") {
		window.open( data.node.a_attr.href, data.node.a_attr.target );
	}
});
});


/*
.bind("select_node.jstree", function (e, data) {
	var href = data.node.a_attr.href;
	var parentId = data.node.a_attr.parent_id;
	if(href == '#')
	return '';
 
	window.open(href);
})*/
</script>

	</div>

	<div class="container-fluid">
			<div class="jumbotron">
				<img src="seal-dcf.jpg" class="mx-auto d-block logo" alt="Logo"><hr>
				<?php showAlert(); ?>
				<h1>DCF Policy Manuals</h1>
				<p>This section of the DCF web site is devoted to communicating the policies
						and procedures by which DCF provides its services. Policy and procedures are
						issued by the Department and its divisions and offices.  For more information
						on DCF's divisions and offices, please
						<a href="http://www.nj.gov/dcf/" target="_blank"><strong>click here.</strong></a>
						</p>
						
						<p><strong>Searching for Policies and Procedures</strong></p>
						
						<p>Each policy manual displays its content by Volume, Chapter, Subchapter,
						and Issuance. Use the menu on the left to navigate to issuances. Issuances
						are available in PDF format - simply click on the Adobe PDF icon to open,
						save, or print a policy.<br><br>Use the Search bar at the top right of any
						Policy Manual page to find a particular policy or procedure. For best results,
						select the search option that limits your query to the DCF Policy Manuals.
						<a href="Manual%20Search%20Instructions.pdf" target="_blank"><strong>Click here
						for detailed instructions on searching the DCF Policy Manuals.</strong></a>
						</p>

								<!-- Search form -->
<input class="form-control" type="text" placeholder="Search" aria-label="Search">

						<!-- See all forms -->
						<form action='seeallfiles.php' method='get'> 
  							<input value="See All Files" class=" btn btn-primary mx-auto d-block" type="submit" id="allfiles" name="allfiles"><hr>
						</form> 

						
						<p><strong>Disclaimer</strong></p>
						
						<p>Please note that DCF Policy is subject to change without notice in order to
						reflect the Department's current practices.
						<a href="mailto:policy@dcf.nj.gov"><strong>Click here</strong></a>
						to contact the Office of Policy and Regulatory Development for information
						regarding specific policies.
						</p>
						
						<p><strong>Other Contacts</strong></p>
						
						<p>To report child abuse and neglect, call 1-877-NJ-ABUSE (1-877-652-2873).
						For more information on how and when to report child abuse and neglect,
						<a href="http://www.nj.gov/dcf/reporting/how/index.html" target="_blank"><strong>click here.</strong></a>
						</p>
						
						<p>For information, referral, and advocacy services, contact
						<a href="http://www.nj.gov/dcf/about/divisions/oa/" target=_blank><strong>the Office of Advocacy</strong></a>
						by calling 1-877-543-7864 or via email at
						<a href="mailto:askdcf@dcf.state.nj.us">askdcf@dcf.state.nj.us</a>.
						</p>

					<h2>List of Policies</h2><hr>
					<p>Below is a comprehensive list of all policies:</p>
					<h3>Download Document Version</h3>
                    <div class="form-group" id="mycustomform">
                            <select name="volume" class="form-control">
                                    <option value="vol1">Vol 1: Mission, Vision, and Guiding Principles</option>
                                    <option value="vol2">Vol 2: Intake, Investigation, and Response</option>
                                    <option value="vol3">Vol 3: Case Management</option>
                                    <option value="vol4">Vol 4: Out of Home Placement</option>
                                    <option value="vol5">Vol 5: Health</option>
                                  </select> 
                                <br />
                            <select name="chapter" class="form-control">
                                <option value="vol1chapterA">Chapter A: Mission, Vision, and Guiding Principles</option>
                              </select> 
                              <br />
                              <select name="subchapter" class="form-control">
                                    <option value="vol1chapterAsub1">Subchapter 1: Mission, Vision, and Guiding Principles</option>
                                  </select> 
                                  <br />
                                  <select name="policy" class="form-control">
                                        <option value="pol100">CPP-I-A-1-100: CP&P Mission, Vision and Goals</option>
                                        <option value="pol150">CPP-I-A-1-150: Legal Provisions for Intervention</option>
                                        <option value="pol200">CPP-I-A-1-200: Case Management Philosophy</option>
                                        <option value="pol300">CPP-I-A-1-300: Partnership in Assessment, Case Planning, and Service Implementation</option>
                                        <option value="pol400">CPP-I-A-1-400: Comprehensive Community Support System</option>
                                    </select> 
									<br />
									<div class="row">
										<div class="col">
											<a class="btn btn-primary line" href="policysample1.html" role="button">Go To Policy</a> 
										</div>
										<div class="col">
											<a class="btn btn-primary line" href="CPP-II-E-1-100.pdf" role="button">Download (PDF)</a>
										</div>
									</div>                   
                    
                                </div>  

			</div>

			<!-- Login modal -->
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Login</h5>
                            <button type="btn" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="panel mx-auto">
                                <h2 class="text-center">Login</h2>
                                <p class="text-center">Please enter your login credentials</p><hr>
                                <form method="post" action="loginAuth.php">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

	</div>
</body>
</html>