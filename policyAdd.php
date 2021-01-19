<?php 
	include("connect.php");
    require("functions.php");
	checkSession();
	
	if (isset($_GET['download'])) {
		if(isset($_SESSION['policy_file']) )
		{
		  $name = $_SESSION['policy_file'];
		  $url = "location: ./res/policies/". $name .".pdf";
		  header($url);
		} 
	}
	
	if (isset($_GET['category'])) {
		unset($_SESSION['volume']);
		unset($_SESSION['chapter']);
		unset($_SESSION['subch']);
		unset($_SESSION['policy']);
	} else if (isset($_GET['volume'])) {
		unset($_SESSION['chapter']);
		unset($_SESSION['subch']);
		unset($_SESSION['policy']);
	} else if (isset($_GET['chapter'])) {
		unset($_SESSION['subch']);
		unset($_SESSION['policy']);
	} else if (isset($_GET['subch'])) {
		unset($_SESSION['policy']);
	}
	
	if (isset($_GET['reset'])) {
		if ($_GET['reset'] == 1) {
			//reset variables
			unset($_GET['category']);
			unset($_SESSION['category']);
			unset($_GET['volume']);
			unset($_SESSION['volume']);
			unset($_GET['chapter']);
			unset($_SESSION['chapter']);
			unset($_SESSION['subch']);
			unset($_SESSION['policy']);
			unset($_SESSION['policy_file']);
		}
	}

	//If comments are set, then send in request to delete
	if (isset($_POST['comments'])) {
			//Add deletion request to DB: add_policy_approval_item($id_user, $id_policy, $category, $comments);
			add_policy_approval_item($_SESSION["id"], $_SESSION['policy_file'], 'DELETE', $_POST['comments']);

			setAlert("success", "Policy deletion was sent in for approval."); 

			
			//reset variables
			unset($_GET['category']);
			unset($_SESSION['category']);
			unset($_GET['volume']);
			unset($_SESSION['volume']);
			unset($_GET['chapter']);
			unset($_SESSION['chapter']);
			unset($_SESSION['subch']);
			unset($_SESSION['policy']);
			unset($_SESSION['policy_file']);
	}
	
	if (isset($_GET['category'])) {
		$_SESSION['category'] = $_GET['category'];
	} 
	
	if (isset($_GET['volume'])) {
		$_SESSION['volume'] = $_GET['volume'];
	} 
	
	if (isset($_GET['chapter'])) {
		$_SESSION['chapter'] = $_GET['chapter'];
	} 
	
	if (isset($_GET['subch'])) {
		$_SESSION['subch'] = $_GET['subch'];
	} 
	
	if (isset($_GET['policy'])) {
		$_SESSION['policy'] = $_GET['policy'];
	} 
	
	//DEBUGGING
	/*
	echo "GET Cat: " . $_GET['category'] . "<br>";
	echo "GET Vol: " . $_GET['volume']. "<br>";
	echo "GET Chap: " . $_GET['chapter']. "<br>";
	echo "GET SubCh: " . $_GET['subch']. "<br>";
	echo "GET Policy: " . $_GET['policy']. "<br>";
	echo "SESSION Cat: " . $_SESSION['category']. "<br>";
	echo "SESSION Vol: " . $_SESSION['volume']. "<br>";
	echo "SESSION Chap: " . $_SESSION['chapter']. "<br>";
	echo "SESSION SubCh: " . $_SESSION['subch']. "<br>";
	echo "SESSION Policy: " . $_SESSION['policy']. "<br>";
	*/

?>

<!DOCTYPE html>
<html>

<head>
	<title>DCF Policies</title>

	<?php include("header.php"); ?>

</head>

<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<?php include("adminSidebar.php"); ?>

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
				<!-- Your code goes here -->
				<?php showAlert(); ?>
                <h1>Add a New Policy</h1>
                <p>Use this form to add a policy under a particular heading.</p>
				
				<h2>Search Policies</h2>

<p>Use the search below to find a particular policy.</p>

<form style="margin-bottom: 20px;">
	Select A Category: 
	<select name="category" onchange="this.form.submit()">
		<option value="" disabled <?php if (!isset($_SESSION['category'])) {echo "selected";}?>>--select--</option>
		<?php
			$sql = "SELECT DISTINCT category
			FROM policies ORDER BY category ASC;";
			$result = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					if (isset($_SESSION['category']) && ($_SESSION['category'] == $row['category'])) {
						echo '<option value="' . $row['category'] . '" selected>' . $row['category'] . '</option>';
					} else {
						echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
					}
				}
			}
		?>
	</select>
</form>

<form style="margin-bottom: 20px; visibility:<?php if (isset($_SESSION['category'])) {echo 'visible';} else {echo 'hidden;position:absolute';} ?>;">
	Select A Volume: 
	<select name="volume" onchange="this.form.submit()">
		<option value="" disabled selected>--none--</option>
		<?php
			if (isset($_SESSION['category'])) {
				$sql = "SELECT volume_num, volume_name, category FROM policies WHERE category='{$_SESSION['category']}' GROUP BY volume_num, volume_name ORDER BY volume_num ASC;";
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						if (isset($_SESSION['volume']) && ($_SESSION['volume'] == $row['volume_num'])) {
							echo '<option value="' . $row['volume_num'] . '" selected> Vol.' . $row['volume_num'] . ' - ' . $row['volume_name'] . '</option>';
						} else {
							echo '<option value="' . $row['volume_num'] . '"> Vol.' . $row['volume_num'] . ' - ' . $row['volume_name'] . '</option>';
						}                                   
					}
				}
			}
		?>
	</select>
</form>

<form style="margin-bottom: 20px; visibility:<?php if (isset($_SESSION['volume'])) {echo 'visible';} else {echo 'hidden;position:absolute';} ?>;">
	Select A Chapter: 
	<select name="chapter" onchange="this.form.submit()">
		<option value="" disabled selected>--none--</option>
		<?php
			if (isset($_SESSION['volume'])) {
				$sql = "SELECT chapter_num, chapter_name, volume_num, category FROM policies WHERE category='{$_SESSION['category']}' AND volume_num='{$_SESSION['volume']}' GROUP BY chapter_num, chapter_name ORDER BY chapter_num ASC;";
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						if (isset($_SESSION['chapter']) && ($_SESSION['chapter'] == $row['chapter_num'])) {
							echo '<option value="' . $row['chapter_num'] . '" selected> Chapter ' . $row['chapter_num'] . ' - ' . $row['chapter_name'] . '</option>';
						} else {
							echo '<option value="' . $row['chapter_num'] . '"> Chapter ' . $row['chapter_num'] . ' - ' . $row['chapter_name'] . '</option>';
						}   
					}
				} else {
					$_SESSION['chapter'] = 'None';
					header('Location: searchcategory.php');
				}
			}
		?>
	</select>
</form>

<form style="margin-bottom: 20px; visibility:<?php if (isset($_SESSION['chapter'])) {echo 'visible';} else {echo 'hidden;position:absolute';} ?>;">
	Select A Sub-Chapter: 
	<select name="subch" onchange="this.form.submit()">
		<option value="" disabled selected>--none--</option>
		<?php
			if (isset($_SESSION['chapter'])) {
				$sql = "SELECT subch_name, subch_num, chapter_num, volume_num, category FROM policies WHERE category='{$_SESSION['category']}' AND volume_num='{$_SESSION['volume']}' AND chapter_num='{$_SESSION['chapter']}' GROUP BY subch_num, subch_name ORDER BY subch_num ASC;";
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						if (isset($_SESSION['subch']) && ($_SESSION['subch'] == $row['subch_num'])) {
							echo '<option value="' . $row['subch_num'] . '" selected> Sub-Chapter ' . $row['subch_num'] . ' - ' . $row['subch_name'] . '</option>';
						} else {
							echo '<option value="' . $row['subch_num'] . '"> Sub-Chapter ' . $row['subch_num'] . ' - ' . $row['subch_name'] . '</option>';
						}   
					}
				} else {
					$_SESSION['subch'] = 'None';
					header('Location: searchcategory.php');
				}
			}
		?>
	</select>
</form>

<form style="margin-bottom: 20px; visibility:<?php if (isset($_SESSION['subch'])) {echo 'visible';} else {echo 'hidden;position:absolute';} ?>;">
	Select A Policy: 
	<select name="policy" onchange="this.form.submit()">
		<option value="" disabled selected>--none--</option>
		<?php
			if (isset($_SESSION['subch'])) {
				$sql = "SELECT id, policy_num, policy_name, file_name, subch_name, subch_num, chapter_num, volume_num, category FROM policies WHERE category='{$_SESSION['category']}' AND volume_num='{$_SESSION['volume']}' AND chapter_num='{$_SESSION['chapter']}' AND subch_num='{$_SESSION['subch']}' ORDER BY policy_num ASC;";
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						if (isset($_SESSION['policy']) && ($_SESSION['policy'] == $row['policy_num'])) {
							echo '<option value="' . $row['policy_num'] . '" selected>' . $row['policy_num'] . ' - ' . $row['policy_name'] . ' - ' . $row['file_name']  . '</option>';
							$_SESSION['policy_file'] = $row['file_name'];
						} else {
							echo '<option value="' . $row['policy_num'] . '">' . $row['policy_num'] . ' - ' . $row['policy_name'] . ' - ' . $row['file_name']  . '</option>';
						}   
					}
				} 
			}
		?>
	</select>
</form>

<div class='btn-group'>
	<a class="btn btn-success" href="policyAdd.php?download=1" style="visibility:<?php if (isset($_SESSION['policy'])) {echo 'visible';} else {echo 'hidden;position:absolute';} ?>;">Download Policy</a>  
	<!--<a class="btn btn-danger" href="policyUpdate.php?delete=1" style="visibility:<?php if (isset($_SESSION['policy'])) {echo 'visible';} else {echo 'hidden;position:absolute';} ?>;">Delete Policy</a>  -->
	<a class="btn btn-primary" href="policyAdd.php?reset=1">Reset Search</a>
</div>

<br /><br />

<form  style="margin-bottom: 20px; visibility:<?php if (isset($_SESSION['policy'])) {echo 'visible';} else {echo 'hidden;position:absolute';} ?>;" class="needs-validation" method="post" action="policyUpdate.php" novalidate>

  <div class="form-group">
    <label for="suggestionsComments">Describe Reason for New Policy</label>
    <textarea name="comments" class="form-control" id="suggestionsComments" rows="4" required></textarea>
  </div>

  <input type="file" name="fileToUpload" id="fileToUpload">

  <button type="submit" class="btn btn-danger">Confirm</button>
</form>
	
</form>

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