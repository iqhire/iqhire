<?php $page_id = "contact"; ?>
<?php 

	$mail_success = false;
	$submit = "";
	$name = "";
	$company = "";
	$email = "";
	$phone = "";
	$comments = "";
	$robot = "";

	if (isset($_POST['submit'])) { $submit 		= $_POST['submit']; }	
	if (isset($_POST['name'])) 	 { $name 		= $_POST['name']; }
	if (isset($_POST['company'])) { $company 	= $_POST['company']; }
	if (isset($_POST['email']))  { $email 		= $_POST['email']; }
	if (isset($_POST['phone'])) { $phone 		= $_POST['phone']; }
	if (isset($_POST['comments'])) { $comments 	= $_POST['comments']; }
	if (isset($_POST['robot'])) { $robot	 	= $_POST['robot']; }

	if(isset($_POST['submit']))
	{	
				
		if(!$name || !$company || !$email || !$robot)
		{

			if(!$name) $name_null = true;	
			if(!$company) $company_null = true;	
			if(!$email) $email_null = true;
			if(!$robot) $robot_null = true;

			$display_message = true;

		} else {
			
			if($robot == "No" || $robot == "no") {
				$email_message = "The following person filled out the contact form on the Inquirehire website:\n\n";
				$email_message .= "Name = $name\n";	
				$email_message .= "Company = $company\n";
				$email_message .= "Phone = $phone\n";				
				$email_message .= "Email Address = $email\n\n";		
				$email_message .= "Comments:\n\n$comments\n\n";

				$email_headers = "From: no-reply@inquirehire.com";

				//send email to recipients for processing
				mail("dan@recreant.com", "Contact From Inquirehire Website", $email_message, $email_headers);

				$mail_success = true;
			} else {
				
				$robot_null = true;
				$display_message = true;
			}
			
			
		}//end else		

	}
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/header.php');?>
<div class="row pagehead">
	<div class="span12">
		<h1 class="cushycms" title="Heading">Contact Inquirehire</h1>
	</div>
</div>
<div class="row">
	<div class="span8 cushycms" title="Content">
		<?php if ($mail_success) {?>

			<div class="well">
				<h3>Thank You</h3>
				<p>Thank you for your interest. An Inquirehire representative will be in touch with you shortly.</p>
				<p><a href="/">Click here to return to the home page.</a></p>
			</div>

		<?php } else { ?>

			<?php if ($display_message) {?>
				<div class="alert alert-error">
				  <a class="close" data-dismiss="alert">×</a>
				  <h4 class="alert-heading">Missing Fields</h4>
				  Please be sure to complete the missing fields before submitting the contact form. Thanks.
				</div>
			<?php } ?>

			<form id="contact" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="row">
					<div class="span4 control-group<?php if($name_null) echo " error"; ?>">
			  			<label for="name">Your Name</label>
			  			<input type="text" class="span4" name="name" id="name" value="<?php echo $name ?>" />
					</div>
					<div class="span4 control-group<?php if($company_null) echo " error"; ?>">
						<label for="company">Company</label>
			  			<input type="text" class="span4" name="company" id="company" value="<?php echo $company ?>" />
					</div>
				</div>
				<div class="row">
					<div class="span4 control-group<?php if($email_null) echo " error"; ?>">
			  			<label for="email">Email</label>
			  			<input type="text" class="span4" id="email" name="email" value="<?php echo $email ?>" />
					</div>
					<div class="span4 control-group<?php if($phone_null) echo " error"; ?>">
						<label for="phone">Phone</label>
			  			<input type="text" class="span4" name="phone" id="phone" value="<?php echo $phone ?>" />
					</div>
				</div>
				<div class="row">
						<div class="span-8">
							<label>Comment</label>
							<textarea name="comments" id="comments" class="span8"><?php echo $comments ?></textarea>
						</div>
				</div>
				<div class="row">
					<div class="span-8 control-group<?php if($robot_null) echo " error"; ?>">
						<label for="phone">Are you a robot? (Type "No", to help us cut down on spam)</label>
		  				<input type="text" class="span8" name="robot" id="robot" value="<?php echo $robot ?>" />
					</div>
				</div>
				
			  	<button t type="submit" name="submit" class="btn btn-primary">Contact Us</button>
			</form>
			
		<?php } ?>
	</div>
	<div class="span4">
		<ul class="nav">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/nav-about.php');?>
		</ul>
		
		<div class="sidebox">
			<p>We would like to hear from you! If you have comments or questions feel free to contact us by phone or the form below.</p>
			<p>Inquirehire<br/>
			320 LeClaire Street<br/>
			Davenport, IA 52801<br/>
			Phone: (800) 494-5922<br/>
			Fax: (563) 323-5441</p>
		</div>
	</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/footer.php');?>