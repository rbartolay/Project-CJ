<h1>Companies</h1><br>

<?php echo "<table align='center'><tr><td>" . CompaniesLayout::getAlphabeticalPagination($current) . "</td></tr></table>"; ?>
<div class="container">
<?php
echo CompaniesLayout::formatList($companies);
?>
</div>