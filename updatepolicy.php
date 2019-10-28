<!DOCTYPE html>
<html>

<head>
	<title>DCF Policies</title>

	<?php include("./includes/header.php"); ?>

	 <style>
            .policyform {
                border-width: 1px;
                border-color: blue;
                border-radius: 25px;
                padding: 20px;
            }

            .btn-primary {
                padding: 10px;
                border-radius: 10px;

            }

            .btn-primary:hover {
                padding: 10px;
                border-radius: 10px;
                text-decoration: none;
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
				<h1>DCF Policy Manuals</h1>
                <h3>Update Policy</h3>
                <p>Along with updating the actual policy page, fill out this form to log the change that was made:</p>
                <form class="policyform">
                    Choose a policy to update: <select name="policy">
                        <option value="1">Policy 1</option>
                        <option value="1">Policy 2</option>
                        <option value="1">Policy 3</option>
                        <option value="1">Policy 4</option>
                        <option value="1">Policy 5</option>
                    </select><br><br>
                    <script>$('.datepicker').datepicker();</script>

                    Date change was made: <input data-provide="datepicker"><br><br>
                    Describe change made: <input type="text" style="width: 400px; height: 100px;"><br><br>
                   <button class="btn-primary">Update Policy</button>

                </form>
                <br><br><br><br><br><br>
                <a class="btn-primary" href="NJPage.html">&#8592; Back</a>

			</div>
		</div>


	<?php include("./includes/jslibraries.php"); ?>
</body>
</html>