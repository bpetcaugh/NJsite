<?php include("connect.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>DCF Policies</title>

	<?php include("header.php"); ?>

</head>

<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<?php include("sidebar.php"); ?>

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
                    
					<img src="./res/NJ_DCF_Logo.png" alt="NJ DCF" style="width: 45%; height: 50%;" class="headerLogo">
          
				</div>
			</div>
			<div class="body-wrapper">
        <!-- Main Body -->
        <?php require("functions.php"); showAlert(); ?>
				<h1>Department of Children and Families Policy Manual</h1>

				<p>The Department of Children and Families' focus is on promoting 
				positive, long-term outcomes for the children and families we serve 
				through ensuring everyone we encounter is safe, healthy, and connected. 
				This section of the DCF web site is devoted to communicating the policies 
				and procedures by which DCF provides its services. Policy and procedures 
				are issued by the Department and its divisions and offices.</p>

				<p>The Office of Policy and Regulatory Development (OPRD) serves DCF by 
				creating policies and regulations that support the Department in accomplishing 
				the vision of a better today and even greater tomorrow for every individual 
				we serve. OPRD issues policies for the Divisions and Offices within DCF. Policies 
				and procedures are one of the foundational elements of DCF. Designed with the 
				reader in mind, our current policies specify the purpose, authority, policies, 
				and procedures for the policy. The authority is the rule or law that mandates 
				the policy. Policies are the rules governing processes for DCF mandates and the 
				way we serve children and families. Procedures are how policies are implemented.</p>

				<p>The Office of Policy and Regulatory Development promulgates Departmental rules, 
				which are statements of general applicability and continuing effect that implement 
				or interpret law or policy, or describe the organization, procedure, or practice 
				requirements of the Department or its Divisions. Statutory authority enables the 
				Department to promulgate rules. They have the force and effect of law in New Jersey. 
				The rules are published in the New Jersey Administrative Code and are accessible 
				to everyone in libraries and online. </p>

				<p><a href="https://www.nj.gov/dcf/policy_manuals/AO-I-A-1-011_issuance.shtml" style="text-decoration: underline;" target=_blank >Administrative Order #11</a> – 
				<b>Policy Making Procedures:</b> Commissioner Beyer signed this 
				Department-wide Administrative Order, effective March 18, 2019, which establishes 
				uniform Departmental procedures for the development, promulgation, and publication 
				of policies and regulations.</p>
				<table style="width:100%;">
				<tr style="width:100%;">
					<td style="width:50%; padding: 5px;"><img style="width:100%" src="./res/polbanner.png"></td>
					<td style="width:50%; padding: 5px;"><img style="width:100%" src="./res/PolPic.jpg"></td>
				</tr>
				</table>
<p style="text-align: center;">
<b>If you need assistance finding or verifying policy, <br>
contact the Office of Policy and Regulatory Development:<br>
50 East State Street, Trenton, NJ 08625 - 3rd Floor<br>
PO Box 717<br>
Cost Code #923<br>
Main Number:  609-888-7030<br>
Policy Mailbox:  <a href="mailto:Policy@dcf.nj.gov?subject=DCF%20Policy&body=My%20Inquiry:" style="text-decoration: underline;">Policy@dcf.nj.gov</a> <br></b>

</p>

				<br>
<h4>Disclaimer</h4>
<p><a href="https://www.nj.gov/dcf/policy_manuals/Policy%20Updates_794E5FB4-41FA-49FE-9DBC-80B826CE6E7F_I%20-%20Policy%20Updates.shtml" style="text-decoration: underline;" target=_blank>“Policy Updates”</a> emails are sent to all staff bi-monthly and provide information on 
what is New, Revised, Obsolete, and Emergent in Department Policy. The Office of Policy and Regulatory 
Development catalogues all “Policy Updates” emails for easy reference as part of the Department’s <a href="https://www.nj.gov/dcf/policy_manuals/toc.shtml" target=_blank>Policy 
Manual</a>. Please note that DCF Policy may be subject to change without notice in order to reflect the 
Department's current practices. <p>


<p style="text-align: center;"><b>Have a policy inquiry or suggestion?  <a style="text-decoration: underline;" href="http://cs.holyghostprep.org/njdcf/contactform.php">Email us here.</a> <p>

<p><a href="https://www.nj.gov/dcf/" style="text-decoration: underline;">DCF Home</a></p>

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

			<!-- javascript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="NJPage.js"></script>
</body>
</html>