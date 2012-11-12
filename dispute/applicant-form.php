<?php $page_id = "applicant-form"; ?>
<?php 

	$mail_success = false;
	$submit = "";
	$name = "";
	$email = "";
	$address1 = "";
	$address2 = "";
	$city = "";
	$state = "";
	$zip = "";
	$ssn = "";
	$comments = "";
	$robot = "";

	if (isset($_POST['submit'])) { $submit = $_POST['submit']; }	
	if (isset($_POST['name'])) { $name = $_POST['name']; }
	if (isset($_POST['email'])) { $email = $_POST['email']; }
	if (isset($_POST['address1'])) { $address1 = $_POST['address1']; }
	if (isset($_POST['address2'])) { $address2 = $_POST['address2']; }
	if (isset($_POST['city'])) { $city = $_POST['city']; }
	if (isset($_POST['state'])) { $state = $_POST['state']; }
	if (isset($_POST['zip'])) { $zip = $_POST['zip']; }
	if (isset($_POST['ssn'])) { $ssn = $_POST['ssn']; }
	if (isset($_POST['comments'])) { $comments = $_POST['comments']; }
	if (isset($_POST['robot'])) { $robot = $_POST['robot']; }

	if(isset($_POST['submit']))
	{	
				
		if(!$name || !$email || !$address1 || !$city || !$state || !$zip || !$ssn || !$robot)
		{

			if(!$name) $name_null = true;
			if(!$email) $email_null = true;
			if(!$address1) $address_null = true;
			if(!$city) $city_null = true;
			if(!$state) $state_null = true;
			if(!$zip) $zip_null = true;
			if(!$ssn) $ssn_null = true;
			if(!$robot) $robot_null = true;

			$display_message = true;

		} else {
			
			if($robot == "No" || $robot == "no") {
				$email_message = "The following person filled out the 'Applicant Dispute Form' form on the Inquirehire website:\n\n";
				$email_message .= "Name = $name\n";	
				$email_message .= "Email Address = $email\n\n";
				$email_message .= "Address 1 = $address1\n\n";
				$email_message .= "Address 2 = $address2\n\n";
				$email_message .= "City  = $city\n\n";
				$email_message .= "State = $state\n\n";
				$email_message .= "Zip = $zip\n\n";
				$email_message .= "SSN = $ssn\n\n";
				$email_message .= "Comments:\n\n$comments\n\n";

				$email_headers = "From: no-reply@inquirehire.com";

				//send email to recipients for processing
				mail("dan@recreant.com", "Inquirehire Form: Applicant Dispute Form", $email_message, $email_headers);

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
		<h1 class="cushycms" title="Heading">Applicant Dispute Form</h1>
	</div>
</div>
<div class="row">
	<div class="span8 cushycms" title="Content">
		<?php if ($mail_success) {?>

			<div class="well">
				<h3>Thank You</h3>
				<p>Your dispute has submitted.  Inquirehire’s Compliance Officer will contact you within 
					1 business day.  If you do not hear from the compliance officer or someone  within the 
					Inquirehire organization, please call 1-800-494-5922.</p>
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
			  			<label for="name">Your Full Name</label>
			  			<input type="text" class="span4" name="name" id="name" value="<?php echo $name ?>" />
					</div>
					<div class="span4 control-group<?php if($email_null) echo " error"; ?>">
						<label for="ssn">Email Address</label>
			  			<input type="text" class="span4" name="email" id="email" value="<?php echo $email ?>" />
					</div>
				</div>
				<div class="row">
					<div class="span8 control-group<?php if($address_null) echo " error"; ?>">
			  			<label for="address1">Mailing Address</label>
			  			<input type="text" class="span8" id="address1" name="address1" value="<?php echo $address1 ?>" />
						<input type="text" class="span8" id="address2" name="address2" value="<?php echo $address2 ?>" />
					</div>
				</div>
				<div class="row">
					<div class="span4 control-group<?php if($city_null) echo " error"; ?>">
			  			<label for="city">City</label>
			  			<input type="text" class="span4" name="city" id="city" value="<?php echo $city ?>" />
					</div>
					<div class="span2 control-group<?php if($state_null) echo " error"; ?>">
						<label for="state">State</label>
			  			<input type="text" class="span2" name="state" id="state" value="<?php echo $state ?>" />
					</div>
					<div class="span2 control-group<?php if($zip_null) echo " error"; ?>">
						<label for="zip">Zip</label>
			  			<input type="text" class="span2" name="zip" id="zip" value="<?php echo $zip ?>" />
					</div>
					
				</div>
				<div class="row">
					<div class="span4 control-group<?php if($ssn_null) echo " error"; ?>">
						<label for="ssn">Last 4 of SSN</label>
			  			<input type="text" class="span4" name="ssn" id="ssn" value="<?php echo $ssn ?>" />
					</div>
				</div>
				<div class="row">
						<div class="span-8">
							<label>Describe inaccurate or disputed information</label>
							<textarea name="comments" id="comments" class="span8"><?php echo $comments ?></textarea>
						</div>
				</div>
				<div class="row">
					<div class="span-8 control-group<?php if($robot_null) echo " error"; ?>">
						<label for="phone">Are you a robot? (Type "No", to help us cut down on spam)</label>
		  				<input type="text" class="span8" name="robot" id="robot" value="<?php echo $robot ?>" />
					</div>
				</div>
				
			  	<button t type="submit" name="submit" class="btn btn-primary">Submit Dispute</button>
			</form>
			
		<?php } ?>
	</div>
	<div class="span4">
		<ul class="nav">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/nav-dispute.php');?>
		</ul>
	</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/footer.php');?>