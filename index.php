<?php $page_id = "home"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/header.php');?>

<section id="feature" class="row">
	<div class="main span9">
		<div class="img">
			big block
		</div>
	</div>
	<div class="list span3">
		<ul>
			<li><a href="#"><div class="img">Item 1</div></a></li>
			<li><a href="#"><div class="img">Item 2</div></a></li>
			<li><a href="#"><div class="img">Item 3</div></a></li>
		</ul>
	</div>
</section>
<section id="testimonials" class="row">
	<div class="span6">
		<h2>What We Do</h2>
		<p>Inquirehire enables businesses to optimize their hiring process in order save time, money, and avoid costly hiring mistakes. Inquirehire solutions include, Applicant Tracking Systems, I9/E-Verify Systems, Aptitude and Behavioral Assessments, Skill Survey Professional Reference Checks, Pre-employment and Background Screening, Drug Testing, Substance Abuse Training, and Employment Tax Credit Processing (WOTC).  Inquirehire has partners and pre-integrated solutions with ERC, Honkamp Krueger, Escreen, Tazworks,  Anchor Planning and more.</p>
	</div>
	<div class="span6">
		<p>Quotes</p>
	</div>
</section>
<section id="banners" class="row">
	<div class="span4"><div class="img">Ad</div></div>
	<div class="span4"><div class="img">Ad</div></div>
	<div class="span4"><div class="img">Ad</div></div>
</section>
<section id="sitemap" class="row">
	<div class="span3">
		<h3>Services</h3>
		<ul>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/nav-services.php');?>
		</ul>
	</div>
	<div class="span3">
		<h3>Resources</h3>
		<ul>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/nav-resources.php');?>
		</ul>
	</div>
	<div class="span3">
		<h3>Partners</h3>
		<ul>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/nav-partners.php');?>
		</ul>
	</div>
	<div class="span3">
		<h3>About</h3>
		<ul>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/nav-about.php');?>
		</ul>
	</div>
</section>




<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/footer.php');?>