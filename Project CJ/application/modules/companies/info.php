<div class="container">
	
	<?php if(!empty($company->logo)) { ?>
		<span style='float: right; border: 1px solid #cccccc; margin: 5px;'><img src="<?php echo Configuration::getCompanyImagesPath() . $company->logo; ?>" height="150"></span>
	<?php } ?>
	
	<h1><?php echo $company->name; ?></h1><br>
	Job Posts : <b><?php echo $company->total_job_count; ?></b><br><br>
	<h3>Description</h3><br>
	<p><?php echo $company->description; ?></p><br>
	<h3>Address</h3>
	<p><?php echo $company->address; ?></p><br>	
	
	<?php if(!empty($company->website)) { ?>
			<?php echo CompaniesLayout::getVisitCompanyWebsiteButton($company->website); ?>
	<?php }?>
	<?php echo JobLayout::getViewAllJobsByCompanyNameButton($company->name); ?>

</div>
<br>
<h1>Latest Jobs from <?php echo $company->name; ?></h1>
<div class="container">
	<?php echo JobLayout::formatList($latest_jobs);?>
	<center><?php echo JobLayout::getViewOtherJobsButton(); ?></center>
</div>