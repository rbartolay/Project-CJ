<table cellspacing="10" width="100%">
	<tr>
		<td><h1>Jobs by <?php echo "<a href='". Configuration::getURLPath() . "/companies/info/" . $company ."'>" . $company . "</a>"; ?></h1></td>
		<td align="right">
		<button class="button" onclick="document.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'">Back to List</button>
		<?php echo CompaniesLayout::getViewCompanyInfoButton($company); ?>
		</td>
	</tr>
</table>
<div class="container">
<?php
echo JobLayout::formatList($jobs);
?>
</div>