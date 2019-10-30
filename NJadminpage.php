<!DOCTYPE html>
<html>
<head>
	<title>DCF Policies</title>
	<?php include("./includes/header.php"); ?>

	 <style>
		.panel-heading .accordion-toggle:after {
		    /* symbol for "opening" panels */
		    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
		    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
		    float: right;        /* adjust as needed */
		    color: grey;         /* adjust as needed */
		}
		.panel-heading .accordion-toggle.collapsed:after {
		    /* symbol for "collapsed" panels */
		    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
		}
		.listcontainer {
			width: 60%;
			background-color: beige;
		}

		.panel-title {
			background-color: gray;
		}

		.policyselection {
		    width:"65%";
		    padding: 30px;
		}

		.roundednow {
		    border: 1px darkblue solid;
		    border-radius: 15px;
		    padding: 10px;
		}
	 </style>

</head>

<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3>Navigation</h3>
			</div>
			<ul class="list-unstyled components">
				<li>
					<a href="https://www.nj.gov/dcf/">DCF Home</a>
				</li>
				<li>
					<a href="https://www.nj.gov/dcf/families/">Families</a>
                </li>
                <li>
                    <a href="https://www.nj.gov/dcf/adolescent/">Adolescents</a>
                </li>
                <li>
                    <a href="https://www.nj.gov/dcf/women/">Women</a>
                </li>
                <li>
                    <a href="https://www.nj.gov/dcf/providers/">Providers & Stakeholders</a>
                </li>
                <li>
                    <a href="https://www.nj.gov/dcf/about/divisions/oa/">Advocacy</a>
                </li>
			</ul>
		</nav>

		<div id="content">
			<div class="header">
				<div class="row">
					<nav class="navbar">
						<div class="container-fluid">
							<button type="button" id="sidebarCollapse" class="navbar-btn">
								<span></span>
								<span></span>
								<span></span>
							</button>
						</div>
                    </nav>
					<img src="seal-dcf.PNG" alt="Holy Ghost Prep" style="width: 45%; height: 50%;" class="headerLogo">
				    <!--<h1 class="headerTitle">New Jersey</h1>-->
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
                <h1>DCF Policy Manuals - ADMIN </h1>
                <p>This is the adminstration side of the website. You are able to view old versions of documents,
                    and/or make changes to existing documents. Choose a document below. </p>

                <h3>Download Document Version</h3>
				<!-- innerHTML of this element and any other with the class policy-selection is manually set please dont touch it ok -->
                <div class="form-group policy-selection policy-download"></div>
				<br><br>
				<h3>Update Document Version</h3>
	            <div class="form-group policy-selection policy-upload"></div>
			</div>
		</div>
    </div>
	<?php include("./includes/jslibraries.php"); ?>
	<script src="NJadminpage.js"></script>
</body>
</html>