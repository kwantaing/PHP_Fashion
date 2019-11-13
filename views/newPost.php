<?php 
		require('views/header.php');
		session_start();

?>

<div class="body">
	<div role="main" class="main">

		<section class="page-header page-header-classic page-header-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Create a new Post</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-right">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">New Post</li>
                        </ul>
                    </div>
				</div>
			</div>
		</section>

		<div class="container py-2">

			<div class="row">
				<!-- <div class="col-lg-3 order-2 order-lg-1">
					<aside class="sidebar mt-2">
						<h5 class="font-weight-bold">Forms Layouts</h5>
						<ul class="nav nav-list flex-column">
							<li class="nav-item"><a class="nav-link" href="elements-forms-basic-contact.html">Basic Contact Form</a></li>
							<li class="nav-item"><a class="nav-link text-dark active" href="elements-forms-advanced-contact.php">Advanced Contact Form</a></li>
							<li class="nav-item"><a class="nav-link" href="elements-forms-contact-recaptcha-v2.html">Contact Form with Recaptcha v2</a></li>
							<li class="nav-item"><a class="nav-link" href="elements-forms-contact-recaptcha-v3.html">Contact Form with Recaptcha v3</a></li>
							<li class="nav-item"><a class="nav-link" href="elements-forms-login.html">Login</a></li>
							<li class="nav-item"><a class="nav-link" href="elements-forms-signup.html">Sign Up</a></li>
							<li class="nav-item"><a class="nav-link" href="elements-forms-lost-password.html">Lost Password</a></li>
							<li class="nav-item"><a class="nav-link" href="elements-forms-user-profile.html">User Profile</a></li>
							<li class="nav-item"><a class="nav-link" href="elements-forms-checkout.html">Checkout</a></li>
						</ul>
					</aside>
				</div> -->
                <div class="col-lg-1"></div>
				<div class="col-lg-10 order-1 order-lg-2">
					
					<div class="offset-anchor" id="contact-sent"></div>

					<div class="overflow-hidden mb-1">
						<h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">Make a New Fashion Post</strong></h2>
					</div>
					<div class="overflow-hidden mb-4 pb-3">
						<p class="mb-0">Feel free to ask for details, don't save any questions!</p>
					</div>

					<form id="contactFormAdvanced" action="<?php echo basename($_SERVER['PHP_SELF']); ?>#contact-sent" method="POST" enctype="multipart/form-data">
						<input type="hidden" value="true" name="emailSent" id="emailSent">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="required font-weight-bold text-dark">Name</label>
								<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label class="font-weight-bold text-dark">Article of Clothing</label>
								<select data-msg-required="Please enter the subject." class="form-control" name="subject" id="subject" required>
									<option value="">...</option>
									<option value="top">Top</option>
									<option value="bottom">Bottom</option>
									<option value="shoes">Shoes</option>
									<option value="accessories">Accessories</option>
								</select>
							</div>
						</div>
						<!-- <div class="form-row">
							<div class="form-group col-md-6">
								<p class="mb-2">Checkboxes</p>
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" name="checkboxes[]" type="checkbox" data-msg-required="Please select at least one option." id="inlineCheckbox1" value="option1"> 1
									</label>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" name="checkboxes[]" type="checkbox" data-msg-required="Please select at least one option." id="inlineCheckbox1" value="option2"> 2
									</label>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" name="checkboxes[]" type="checkbox" data-msg-required="Please select at least one option." id="inlineCheckbox1" value="option3"> 3
									</label>
								</div>
							</div>
							<div class="form-group col-md-6">
								<p class="mb-2">Radios</p>
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="radios" data-msg-required="Please select at least one option." id="inlineRadio1" value="option1"> 1
									</label>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="radios" data-msg-required="Please select at least one option." id="inlineRadio2" value="option2"> 2
									</label>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="radios" data-msg-required="Please select at least one option." id="inlineRadio3" value="option3"> 3
									</label>
								</div>
							</div>
						</div> -->
						<div class="form-row">
							<div class="form-group col-md-12">
								<label class="font-weight-bold text-dark">Attachment <span class="font-weight-light text-dark">&nbsp (img, png, jpg files accepted)<span></label>
								<input class="d-block" type="file" name="attachment" id="attachment">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12 mb-4">
								<label class="required font-weight-bold text-dark">Post Message</label>
								<textarea maxlength="5000" data-msg-required="Please enter your message." rows="6" class="form-control" name="message" id="message" required></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<hr>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12 mb-5">
								<input type="submit" id="contactFormSubmit" value="Send Message" class="btn btn-primary btn-modern pull-right" data-loading-text="Loading...">
							</div>
						</div>
					</form>

				</div>
			</div>

		</div>

	</div>
</div>
<?php require('views/footer.php');
