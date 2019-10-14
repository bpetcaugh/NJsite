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

		#mycustomform {
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
                                    <button type="button" class="btn btn-primary">Download Document (Word)</button>
                                    <button type="button" class="btn btn-primary">Download Document (PDF)</button>
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">See Past Versions</button>
<br />
                                    <div id="demo" class="collapse">
                                        <br /><br />
                                        <div class="roundednow">
                                            <h4>Policy Updated 09-18-2018</h4>
                                            <h5> Description of Changes Made:</h5>
                                            <p>A spelling error was corrected in line 145 of the document.</p>
                                            <button type="button" class="btn btn-primary">Download Document (Word)</button>
                                            <button type="button" class="btn btn-primary">Download Document (PDF)</button>
                                            <hr />
                                            <h4>Policy Updated 02-10-2018</h4>
                                            <h5> Description of Changes Made:</h5>
                                            <p>The 3rd paragraph of the document was updated to include new terminology.</p>
                                            <button type="button" class="btn btn-primary">Download Document (Word)</button>
                                            <button type="button" class="btn btn-primary">Download Document (PDF)</button>
                                            <hr />
                                            <h4>Policy Updated 01-15-2018</h4>
                                            <h5> Description of Changes Made:</h5>
                                            <p>A new portion was added in the final section of the document.</p>
                                            <button type="button" class="btn btn-primary">Download Document (Word)</button>
                                            <button type="button" class="btn btn-primary">Download Document (PDF)</button>
                                            <hr />
                                            <h4>Policy Updated 11-13-2017</h4>
                                            <h5> Description of Changes Made:</h5>
                                            <p>A spelling error was corrected in line 10 of the document.</p>
                                            <button type="button" class="btn btn-primary">Download Document (Word)</button>
                                            <button type="button" class="btn btn-primary">Download Document (PDF)</button>
                                        </div>
                                        </div>
                                        </div>


                                </div>

<br /> <br />

                    <h3>Update Document Version</h3>
                    <div class="form-group" id="mycustomform">
	                    <select name="volume" class="form-control">
	                            <option value="vol1">Vol 1: Mission, Vision, and Guiding Principles</option>
	                            <option value="vol2">Vol 2: Intake, Investigation, and Response</option>
	                            <option value="vol3">Vol 3: Case Management</option>
	                            <option value="vol4">Vol 4: Out of Home Placement</option>
	                            <option value="vol5">Vol 5: Health</option>
	                          </select>
	                        <br>
	                    <select name="chapter" class="form-control">
	                        <option value="vol1chapterA">Chapter A: Mission, Vision, and Guiding Principles</option>
		                </select>
		                <br>
		                <select name="subchapter" class="form-control">
		               		<option value="vol1chapterAsub1">Subchapter 1: Mission, Vision, and Guiding Principles</option>
		                </select>
		                <br>
		                <select name="policy" class="form-control">
	                        <option value="pol100">CPP-I-A-1-100: CP&P Mission, Vision and Goals</option>
	                        <option value="pol150">CPP-I-A-1-150: Legal Provisions for Intervention</option>
	                        <option value="pol200">CPP-I-A-1-200: Case Management Philosophy</option>
	                        <option value="pol300">CPP-I-A-1-300: Partnership in Assessment, Case Planning, and Service Implementation</option>
	                        <option value="pol400">CPP-I-A-1-400: Comprehensive Community Support System</option>
	                    </select>
	                    <br>
	                    <form>
	                        <p>Describe what changes you are making in the document. Then upload the
	                            new version (*This will include directions on what the file name should be*).
	                        </p>
	                        <textarea rows="6" cols="70"></textarea>
	                        <br /><br />
	                        <p>Upload the new version of your document here:</p>
	                        <input type="file" class="filestyle">
	                        <br /><br />
	                        <button type="button" class="btn btn-primary">Update</button>
	                    </form>
                    </div>
			</div>
        </div>
	<?php include("./includes/jslibraries.php"); ?>
</body>
</html>