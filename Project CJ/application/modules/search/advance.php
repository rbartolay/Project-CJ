<table cellspacing="10" width="100%">
	<tr>
		<td valign="top">
		<h1>Job Search</h1>
			<div class="container">
				<form class="form" method="POST">
					<table>
						<tr>
							<td><label for="name">Job</label></td>
							<td><input type="text" name="name" id="name" /></td>
						</tr>
						
						<tr>
							<td><label for="email">Company</label></td>
							<td><input type="text" name="email" id="email" /></td>
						</tr>
						
						<tr>
							<td> <label for="web">Website</label></td>
							<td><input type="text" name="web" id="web" /></td>
						</tr>
						
						<tr>
							<td colspan="2"><input  class="submit" type="submit" value="Send" /></td>
						</tr>
					</table>
				</form>
			</div>
		</td>
		<td valign="top" width="30%">
			<h1>Hiring Companies</h1>
			<div class="container">
				<?php echo CompaniesLayout::formatList($companies); ?>
			</div>
		</td>
	</tr>
</table>