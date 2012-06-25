<table width="100%">
<tr>
	<td><h1>Jobs</h1></td>
	<td align="right"><?php echo Form::quickSearch(); ?></td>
	</tr>
</table>

<?php echo "<table align='center'><tr><td>" . HTMLLayout::pagination($jobs->pages, $jobs->current_page) . "</td></tr></table>"; ?>
<div class="container">
	<?php echo JobLayout::formatList($jobs->data); ?>
</div><br>
<?php echo "<table align='center'><tr><td>" . HTMLLayout::pagination($jobs->pages, $jobs->current_page) . "</td></tr></table>"; ?>