<?php
include_once('includes/config.php');
?>

<?php
include_once('includes/above_body_tag.php');
?>
<style>
#contact_nav
{
	background: none !important;
	color: inherit;
	border-bottom: 2px solid #fff;
}
</style>
<body>
	<?php
	include_once('includes/header.php');
	?>
	<div class="page-heading text-center">
		<div class="container zoomIn animated">
			<h1 class="page-title">CONTACT US <span class="title-under"></span></h1>
			<p class="page-description">
				If you need assistance feel free to contact us.
			</p>
		</div>
	</div>
	<div class="main-container fadeIn animated">
		<div class="container">
			<div class="row">
				<!--
				<div class="col-md-7 col-sm-12 col-form">
					<h2 class="title-style-2">CONTACT FORM <span class="title-under"></span></h2>
					<form action="php/mail.php" class="contact-form ajax-form">
						<div class="row">
							<div class="form-group col-md-6">
	                            <input type="text" name="name" class="form-control" placeholder="Name*" required>
	                        </div>
	                         <div class="form-group col-md-6">
	                            <input type="email" name="email" class="form-control" placeholder="E-mail*" required>
	                        </div>
						</div>
                        <div class="form-group">
                            <textarea name="message" rows="5" class="form-control" placeholder="Message*" required></textarea>
                        </div>
                        <div class="form-group alerts">
                        	<div class="alert alert-success" role="alert">
							</div>
							<div class="alert alert-danger" role="alert">
							</div>
                        </div>	
                         <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Send message</button>
                        </div>
                        <div class="clearfix"></div>
					</form>
				</div>
				-->
				<div class="col-md-7 col-sm-12 col-form">
					<h2 class="title-style-2">Find Us <span class="title-under"></span></h2>
					<img src="assets/images/comsats-wah-map.PNG" />
				</div>
				<div class="col-md-4 col-md-offset-1 col-contact">
					<h2 class="title-style-2">Contact Us <span class="title-under"></span></h2>
					<p>
						Thank you for your interest in  <b>Donate Now</b> . Below you will find telephone numbers, email addresses and helpful links to quickly put you in touch with those who can assist you or answer your questions. We look forward to working with you!
					</p>
					<div class="contact-items">
						<ul class="list-unstyled contact-items-list">
							<li class="contact-item"> <span class="contact-icon"> <i class="fa fa-map-marker"></i></span> COMSATS Wah Cantt, Taxila, Pakistan</li>
							<li class="contact-item"> <span class="contact-icon"> <i class="fa fa-phone"></i></span> +92-(316)-5854260</li>
							<li class="contact-item"> <span class="contact-icon"> <i class="fa fa-envelope"></i></span> aqiiibkhannn@gmail.com</li>
						</ul>
					</div>
				</div>
			</div> <!-- /.row -->
		</div>
	</div>
    <?php
	include_once('includes/footer.php');
	include_once('includes/js_files.php');
	?>
</body>

</html>