<?php require('views/header.php'); ?>
<div class="body">


    <div role="main" class="main">

        <section class="page-header page-header-classic page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Your Account Information</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-right">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Account Information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pt-5">

            <div class="row py-4 mb-2">
                <div class="col-md-7 order-2">
                    <div class="overflow-hidden">
                        <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><?php echo $current_user->firstName ." " .$current_user->lastName; ?></h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Fashionista</p>
                    </div>
                    <hr>
                                        <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700"><?php echo "Email: " .$current_user->email ?><a href="#"></a></p>
                                        <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700"><?php echo "First Name: " .$current_user->firstName ?><a href="#"></a></p>
                                        <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700"><?php echo "Last Name: " .$current_user->lastName ?><a href="#"></a></p>



                    <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <a href="#">vehicula</a> sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam. Donec ante risus, dapibus sed lectus non, lacinia vestibulum nisi. Morbi vitae augue quam. Nullam ac laoreet libero.</p>
                    <!--<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p>-->
                    <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                    <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                        <div class="col-lg-6">
                            <a href="#" class="btn btn-modern btn-dark mt-3">Edit Profile</a>
                        </div>
                        <div class="col-sm-6 text-lg-right my-4 my-lg-0">
                            <strong class="text-uppercase text-1 mr-3 text-dark">Connect to </strong>
                            <ul class="social-icons float-lg-right">
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                    <img src="content/img/team/team-7.jpg" class="img-fluid mb-2" alt="">
                </div>
            </div>
        </div>
    </div>

    
</div>

		
<?php require('views/footer.php'); ?>
