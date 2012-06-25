<h1><?php echo $job->jobtitle; ?></h1>
<table cellspacing="10">
	<tr>
		<td valign="top">
			<div class="container">
				<span style='float: right;'><?php echo JobLayout::getApplyNowButton($job->url); ?></span>
				<?php if(!empty($job->logo)) {?>
					<img alt="<?php echo $job->company;?>" src="<?php echo Configuration::getCompanyImagesPath() . $job->logo;?>" height="100">
				<?php }?>
				<h3>Company</h3>
				<p><?php echo "<a href='". Configuration::getURLPath() ."/companies/view/". $job->company ."'>" . $job->company . "</a>"; ?></p>
				<p><?php echo $job->country; ?></p><br>
				
				<h3>Description</h3>
				<p><?php echo $job->snippet; ?></p><br>
								
				<h3>Date Posted</h3>
				<p><?php echo Calendar::formatDate($job->unix_date_posted);?></p><br>
				
				<h3>Source</h3>
				<a href="<?php echo $api->url; ?>" target="_blank"><img src="<?php echo Configuration::getAPISourcesImagesPath() . $api->logo; ?>" alt="<?php echo $api->name; ?>"></a>
				<br><br>
				
				<?php echo JobLayout::getSaveThisJobToProfile(); ?>
				<?php echo JobLayout::getEmailToFriendButton(); ?>
				<?php echo CompaniesLayout::getViewCompanyInfoButton($job->company); ?>
			</div>
		</td>
		<td valign="top" width="300px">
			<div class="container">
				<h3>Location</h3>
				<?php new Core_Map($job->latitude, $job->longitude);?>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<br>
<h2>Other Jobs from <?php echo "<a href='". Configuration::getURLPath() ."/companies/view/". $job->company ."'>" . $job->company . "</a>";?></h2>
			<div class="container">
				<?php echo JobLayout::formatList($other_jobs); ?>
			</div>
		</td>
	</tr>
</table>