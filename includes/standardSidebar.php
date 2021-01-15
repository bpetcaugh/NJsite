<nav id="sidebar">
	<div class="sidebar-header">
		<table>
			<tr>
				<td width="40%">
					<a href="admindash.php"><img src="./res/dcf_logo_square.png" width="100%" alt="DCF"></a>
				</td>
				<td width="60%" style="padding-left: 15px;">
				    <!-- <img src="./res/icon-login.png" width="45px"> -->
                    <form action="logout.php">
                        <input type="submit" class="btn btn-primary login mx-auto d-block" value="Logout" style="position:relative; bottom: 30px; left:20%;" />
                    </form>

				</td>
			</tr>
		</table>
    </div>
    <br />
    <h5 class="text-center" style="color:#69d658;"><?php echo "<i>Signed in as " . getUserInfo($_SESSION['id'], "username") . "</i>"; ?></h5>
    <ul class="list-unstyled components">
        <li>
			<a href="userProfile.php">My Profile</a>
		</li>
		<?php
		if ($_SESSION["setAccessLevel"]) {
			echo '		<li>
			<a href="userList.php">User Information</a>
		</li>';
		} ?>

		<li>
			<a href="filesMissing.php">Missing Files</a>
		</li>
		<li>
			<a href="filesListAll.php">List All Policies</a>
		</li>
		<?php
		if ($_SESSION["setAccessLevel"]) {
			echo '		<li>
			<a href="pendingUpdates.php">Pending Updates</a>
		</li>';
		} ?>
		<?php
		if ($_SESSION["setAccessLevel"]) {
			echo '		<li>
			<a href="logUpdates.php">Log Updates</a>
		</li>';
		} ?>
		<li>
			<a href="policyDelete.php">Policy Obsolete</a>
		</li>
		<li>
			<a href="policyUpdate.php">Policy Modify</a>
		</li>
		<li>
			<a href="policyAdd.php">Policy Add</a>
		</li>

	</ul>
</nav>