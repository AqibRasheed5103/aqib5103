<?php
include_once('includes/config.php');
?>

<?php
include_once('includes/above_body_tag.php');
?>
<style>
#home_nav
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
	<!-- Carousel ================================================== -->
    <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#homeCarousel" data-slide-to="1"></li>
			<li data-target="#homeCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> <img src="assets/images/img_slider/1.jpg" alt="">
				<div class="container">
					<div class="carousel-caption">
						<h2 class="carousel-title bounceInDown animated slow">Because they need your help</h2>
						<h4 class="carousel-subtitle bounceInUp animated slow ">Do not let them down</h4>
					</div>
					<!-- /.carousel-caption -->
				</div>
			</div>
			<!-- /.item -->
			<div class="item "> <img src="assets/images/img_slider/2.jpg" alt="">
				<div class="container">
					<div class="carousel-caption">
						<h2 class="carousel-title bounceInDown animated slow">Together we can improve their lives</h2>
						<h4 class="carousel-subtitle bounceInUp animated slow"> So let's do it !</h4>
					</div>
					<!-- /.carousel-caption -->
				</div>
			</div>
			<!-- /.item -->
			<div class="item "> <img src="assets/images/img_slider/3.jpg" alt="">
				<div class="container">
					<div class="carousel-caption">
						<h2 class="carousel-title bounceInDown animated slow">A penny is a lot of money, if you have not got a penny.</h2>
						<h4 class="carousel-subtitle bounceInUp animated slow">You can make the diffrence !</h4>
					</div>
					<!-- /.carousel-caption -->
				</div>
			</div>
			<!-- /.item -->
		</div>
		<a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev"> <span class="fa fa-angle-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
		<a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next"> <span class="fa fa-angle-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
	</div>
	<!-- /.carousel -->

	<div class="section-home about-us fadeIn animated">
        <div class="container">
            <h2 class="title-style-1">About US <span class="title-under"></span></h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="about-us-col">
                        <div class="col-icon-wrapper"> <img src="assets/images/icons/our-mission-icon.png" alt=""> </div>
                        <h3 class="col-title">our mission</h3>
                        <div class="col-details">
                            <p>We are here to give you the best for your donations where you can give your donations according to your satisfaction </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="about-us-col">
                        <div class="col-icon-wrapper"> <img src="assets/images/icons/make-donation-icon.png" alt=""> </div>
                        <h3 class="col-title">Make donation</h3>
                        <div class="col-details">
                            <p>You can donate to various charities according to your need and satisfaction.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="about-us-col">
                        <div class="col-icon-wrapper"> <img src="assets/images/icons/help-icon.png" alt=""> </div>
                        <h3 class="col-title">Help & support</h3>
                        <div class="col-details">
                            <p>We are here to help you and give an appropriate support that you need</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="about-us-col">
                        <div class="col-icon-wrapper"> <img src="assets/images/icons/programs-icon.png" alt=""> </div>
                        <h3 class="col-title">our programs</h3>
                        <div class="col-details">
                            <p>We donate according to your needed organizations and department that will satisfy you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.about-us -->
	
    <div class="section-home our-sponsors animate-onscroll fadeIn">
        <div class="container">
            <h2 class="title-style-1">Our Sponsors <span class="title-under"></span></h2>
            <ul class="owl-carousel list-unstyled list-sponsors">
                <li> <img src="assets/images/img_sponsors/bus.png" alt=""></li>
                <li> <img src="assets/images/img_sponsors/wikimedia.png" alt=""></li>
                <li> <img src="assets/images/img_sponsors/one-world.png" alt=""></li>
                <li> <img src="assets/images/img_sponsors/wikiversity.png" alt=""></li>
                <li> <img src="assets/images/img_sponsors/united-nations.png" alt=""></li>
                <li> <img src="assets/images/img_sponsors/bus.png" alt=""></li>
                <li> <img src="assets/images/img_sponsors/wikimedia.png" alt=""></li>
                <li> <img src="assets/images/img_sponsors/one-world.png" alt=""></li>
            </ul>
        </div>
    </div>
    <?php
	include_once('includes/footer.php');
	?>

	<?php
	include_once('includes/js_files.php');
	?>
</body>

</html>