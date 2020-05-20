<nav id="sidebar">
	<div class="sidebar-header">
		<table>
			<tr>
				<td width="25%">
                    <form action="logout.php">
                        <input type="submit" class="btn btn-primary login mx-auto d-block" value="Logout" />
                    </form>
				</td>
				<td width="75%" style="padding-left: 15px;">
					<h4>Navigation</h4>
				</td>
            </tr>
            <tr>
                <h5 class="text-center" style="color:#69d658;"><?php echo "Welcome, " . getUserInfo($_SESSION['id'], "username"); ?></h5>
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