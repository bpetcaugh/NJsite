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
	 </style>

</head>

<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<table>
					<tr>
						<td width="25%">
							<a href="NJadminpage.html"><img src="icon-login.png" width="45px"></a>
						</td>
						<td width="75%" style="padding-left: 15px;">
							<h3>Navigation</h3>
						</td>
					</tr>
				</table>

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
						<a href="http://www.nj.gov/dcf/about/divisions/oa/" target=_blank border="0"><strong>the Office of Advocacy</strong></a>
						by calling 1-877-543-7864 or via email at
						<a href="mailto:askdcf@dcf.state.nj.us">askdcf@dcf.state.nj.us</a>.
						</p>

					<h2>List of Policies</h2>
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
									<a class="btn btn-primary" href="policysample1.html" role="button">Go To Policy</a>
									<a class="btn btn-primary" href="CPP-II-E-1-100.pdf" role="button">Download (PDF)</a>

                                </div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>

			</div>
		</div>

	<?php include("./includes/jslibraries.php"); ?>
</body>
</html>