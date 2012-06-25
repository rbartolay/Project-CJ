<center>
	<table id="form-table">
		<thead>
			<th colspan="2"><b><?php echo @$page; ?> Page not found </b></th>
		</thead>
		<tr>
			<td>
				The page you requested may have been moved or deleted.
				<br><br>
				Please try one of the following: If you bookmarked the page, please
				use the search at the top right corner to find what you are looking
				for. If you typed in the address, be sure it was entered correctly.
				<br><br>
				What were you trying to do?
				<br><br>
				<ul>
					<li><a href="<?php echo Configuration::getURLPath(); ?>/registration">Register as a Career Seeker</a></li>
					<li><a href="<?php echo Configuration::getURLPath(); ?>/default/login">Login to account</a></li>
					<li><a href="<?php echo Configuration::getURLPath(); ?>/profile">Manage Your Account</a></li>
					<li><a href="<?php echo Configuration::getURLPath(); ?>/search/advance">Search Careers</a></li>
				</ul><br>Please visit the
				<a href="<?php echo Configuration::getURLPath(); ?>">Hammer</a>
				homepage.
					
			</td>
		</tr>
	</table>
</center>
