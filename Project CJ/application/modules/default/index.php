<table cellspacing="10">
	<tr>
		<td width="70%" valign="top">
		<?php echo Form::quickSearch(); ?>
		<img src="<?php echo Configuration::getImagePath() . "bigpicture.jpg"; ?>" width="650">
		<h1>Most Recent Job Posts</h1>
		
			<div class="container">
			<?php echo JobLayout::formatList($records);	?>
			<?php echo "<center>" . JobLayout::getViewOtherJobsButton() . "</center>"; ?>
			</div>
			
		</td>
		<td valign="top">
		<h1>Featured Company</h1>
		
		<div class="container">
		<?php echo CompaniesLayout::featureCompany($featured_company); ?>
		</div>
		
		<br>
		<h1>Top Trending Jobs</h1>
		
		<div class="container">
			<?php echo JobLayout::formatList($trending_jobs, true); ?>			
		</div>
		<br>
		<h1>Hiring Companies</h1>
		
		<div class="container">
			<?php echo CompaniesLayout::formatList($companies); ?>
			<?php echo "<center>" . CompaniesLayout::getViewAllCompaniesButton() . "</center>"; ?>
		</div>
		
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<h1>Popular job titles:</h1>
		<div class="container">
		<?php 
		foreach($trending_jobs as $job) {
			echo "<a href='#'>". $job->jobtitle ."</a> <br>";
		}
		?>
		</div>
		</td>
	</tr>
</table>

