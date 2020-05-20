<?php include("connect.php"); ?>
<?php
    require("./functions.php");
	checkSession();
	$fileset = false;
	
	if(isset($_POST['myFile']) )
	{
		$fileset = true;
	}

?>


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
		<?php include("./includes/sidebarAdmin.php"); ?>

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
					<img src="./res/NJ_DCF_Logo.png" alt="Holy Ghost Prep" style="width: 45%; height: 50%;" class="headerLogo">
				    <!--<h1 class="headerTitle">New Jersey</h1>-->
				</div>
			</div>
			<div class="body-wrapper">
				<!-- Your code goes here -->
                <h1>DCF Policy Manuals - ADMINISTRATOR </h1>
                <p>This is the adminstration side of the website. You are able to view old versions of documents,
                    and/or make changes to existing documents. Choose a document below. </p>

				<?php
				if ($fileset) {
					echo "Uploaded New File Successfully";
				}
				?>
				<!-- Jozef part of site
                <h3>Download Document Version</h3>
				<div class="form-group policy-selection policy-download"></div>
				<br><br>
				<h3>Update Document Version</h3>
	            <div class="form-group policy-selection policy-upload"></div>
				-->

				<h3>Download Document Version</h3>

				<form method="get" action="getpolicydoc.php">
  <div class="form-group">
    <label for="cat">Category</label>
    <select class="form-control" id="cat">
      <option>Administrative Orders</option>
    </select>
  </div>
  <div class="form-group">
    <label for="vol">Volumes</label>
    <select class="form-control" id="vol">
      <option>Vol. I - Mission, Vision and Guiding Principles</option>
    </select>
  </div>
  <div class="form-group">
    <label for="chapter">Chapter</label>
    <select class="form-control" id="chapter">
      <option>Chapter A - Mission, Vision and Guiding Principles</option>
    </select>
  </div>
  <div class="form-group">
    <label for="subchapter">SubChapter</label>
    <select class="form-control" id="subchapter">
      <option>Subchapter 1 - Mission, Vision and Guiding Principles</option>
    </select>
  </div>
  <div class="form-group">
    <label for="subchapter">Policy</label>
    <select name="policy_name" class="form-control" id="policy">
      <option value="CPP-I-A-1-100">100 - CP&P Mission, Vision and Goals - CPP-I-A-1-100</option>
	  <option value="CPP-I-A-1-150">150 - Legal Provisions for Intervention - CPP-I-A-1-150</option>
	  <option value="CPP-I-A-1-200">200 - Case Management Philosophy - CPP-I-A-1-200</option>
	  <option value="CPP-I-A-1-300">300 - Partnership in Assessment, Case Planning, and Service Implementation - CPP-I-A-1-300</option>
	  <option value="CPP-I-A-1-400">400 - Comprehensive Community Support System - CPP-I-A-1-400</option>
	  <option value="SAMPLE-POLICY-1">500 - SAMPLE POLICY TO TEST</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Download DOCX</button>
</form>

<br><br>
				<h3>Update Document Version</h3>
				<form class="policyform" action="fileUpload.php" method="post" enctype="multipart/form-data">
                    Choose a policy to update:   <div class="form-group">
    <label for="subchapter">Policy</label>
    <select name="policy_name" class="form-control" id="policy">
      <option value="CPP-I-A-1-100">100 - CP&P Mission, Vision and Goals - CPP-I-A-1-100</option>
	  <option value="CPP-I-A-1-150">150 - Legal Provisions for Intervention - CPP-I-A-1-150</option>
	  <option value="CPP-I-A-1-200">200 - Case Management Philosophy - CPP-I-A-1-200</option>
	  <option value="CPP-I-A-1-300">300 - Partnership in Assessment, Case Planning, and Service Implementation - CPP-I-A-1-300</option>
	  <option value="CPP-I-A-1-400">400 - Comprehensive Community Support System - CPP-I-A-1-400</option>
	  <option value="SAMPLE-POLICY-1">500 - SAMPLE POLICY TO TEST</option>
    </select>
  </div><br><br>
                    <script>$('.datepicker').datepicker();</script>

                    Date change was made: <input data-provide="datepicker"><br><br>
                    Describe change made: <input type="text" style="width: 400px; height: 100px;"><br><br>
                   <button class="btn-primary">Update Policy</button>


        Upload a File:
        <input type="file" name="myfile" id="fileToUpload">
        <input type="submit" name="submit" value="Upload File Now" >
    </form>

			</div>
		</div>
    </div>
	<?php include("./includes/jslibraries.php"); ?>
	<!--<script src="NJadminpage.js"></script>-->
</body>
</html>