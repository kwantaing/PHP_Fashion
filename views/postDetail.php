<?php require('views/header.php'); ?>

<div class="error" style="color:red;">
	<?php // echo var_dump($current_post); ?>	
</div>

<?php
	$image = APP_NON_WEB_BASE_DIR . 'uploadedFiles/' . $current_post->post_img;
	// Read image path, convert to base64 encoding
	$imageData = base64_encode(file_get_contents($image));
	
	// Format the image SRC:  data:{mime};base64,{data};
	$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
	?>
<?php 
	// while($current_post===null) {
	// 	sleep(1);
	// }
	?>
<div class="body">
			<div role="main" class="main">

				<!-- <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<span class="sub-title text-dark">Check out our Latest News!</span>
							</div>

							<div class="col-md-12 align-self-center order-1">

								<ul class="breadcrumb d-block text-center">
									<li><a href="#">Home</a></li>
									<li class="active">Blog</li>
								</ul>
							</div>
						</div>
					</div>
				</section> -->
				<section class="page-header page-header-classic page-header-sm">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 data-title-border>Check out this Post!</h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-right">
									<li><a href="index.php">Home</a></li>
									<li class="active"><?php echo $current_post->post_title?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4" >

					<div class="row">
						<div class="col">
							<div class="blog-posts single-post">
							
								<article class="post post-large blog-single-post border-0 m-0 p-0">
                                    <div class="post-image ml-0" style="text-align:center;">

								<h1 class="text-dark font-weight-bold text-8"><?php echo $current_post->post_title; ?></h1>
											<?php echo '<img style="display:inline-block;max-width:850px;max-height:600px;" src="' . $src . '">'; ?>										</a>
									</div>
							
									<div class="post-date ml-0">
										<span class="day">10</span>
										<span class="month">Jan</span>
									</div>
							
									<div class="post-content ml-0">
							
										<h2 class="font-weight-bold"><a href="#"><?php echo $current_post->post_title ?></a></h2>
							
										<div class="post-meta">
											<span><i class="far fa-user"></i> By <a href="#"><?php echo $current_post->post_user ?></a> </span>
											<span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Design</a> </span>
											<span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
										</div>
									<?php 
										if(!isset($current_post->post_msg) and $current_post->post_msg == null) {
											echo '
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum sit amet placerat et, bibendum nec mauris. Duis molestie, purus eget placerat viverra, nisi odio gravida sapien, congue tincidunt nisl ante nec tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis, massa fringilla consequat blandit, mauris ligula porta nisi, non tristique enim sapien vel nisl. Suspendisse vestibulum lobortis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent nec tempus nibh. Donec mollis commodo metus et fringilla. Etiam venenatis, diam id adipiscing convallis, nisi eros lobortis tellus, feugiat adipiscing ante ante sit amet dolor. Vestibulum vehicula scelerisque facilisis. Sed faucibus placerat bibendum. Maecenas sollicitudin commodo justo, quis hendrerit leo consequat ac. Proin sit amet risus sapien, eget interdum dui. Proin justo sapien, varius sit amet hendrerit id, egestas quis mauris.</p>
											<p>Ut ac elit non mi pharetra dictum nec quis nibh. Pellentesque ut fringilla elit. Aliquam non ipsum id leo eleifend sagittis id a lorem. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam massa mauris, viverra et rhoncus a, feugiat ut sem. Quisque ultricies diam tempus quam molestie vitae sodales dolor sagittis. Praesent commodo sodales purus. Maecenas scelerisque ligula vitae leo adipiscing a facilisis nisl ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
											<p>Curabitur non erat quam, id volutpat leo. Nullam pretium gravida urna et interdum. Suspendisse in dui tellus. Cras luctus nisl vel risus adipiscing aliquet. Phasellus convallis lorem dui. Quisque hendrerit, lectus ut accumsan gravida, leo tellus porttitor mi, ac mattis eros nunc vel enim. Nulla facilisi. Nam non nulla sed nibh sodales auctor eget non augue. Pellentesque sollicitudin consectetur mauris, eu mattis mi dictum ac. Etiam et sapien eu nisl dapibus fermentum et nec tortor.</p>
											<p>Curabitur nec nulla lectus, non hendrerit lorem. Quisque lorem risus, porttitor eget fringilla non, vehicula sed tortor. Proin enim quam, vulputate at lobortis quis, condimentum at justo. Phasellus nec nisi justo. Ut luctus sagittis nulla at dapibus. Aliquam ullamcorper commodo elit, quis ornare eros consectetur a. Curabitur nulla dui, fermentum sed dapibus at, adipiscing eget nisi. Aenean iaculis vehicula imperdiet. Donec suscipit leo sed metus vestibulum pulvinar. Phasellus bibendum magna nec tellus fringilla faucibus. Phasellus mollis scelerisque volutpat. Ut sed molestie turpis. Phasellus ultrices suscipit tellus, ac vehicula ligula condimentum et.</p>
											<p>Aenean metus nibh, molestie at consectetur nec, molestie sed nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec euismod urna. Donec gravida pharetra ipsum, non volutpat ipsum sagittis a. Phasellus ut convallis ipsum. Sed nec dui orci, nec hendrerit massa. Curabitur at risus suscipit massa varius accumsan. Proin eu nisi id velit ultrices viverra nec condimentum magna. Ut porta orci quis nulla aliquam at dictum mi viverra. Maecenas ultricies elit in tortor scelerisque facilisis. Mauris vehicula porttitor lacus, vel pretium est semper non. Ut accumsan rhoncus metus non pharetra. Quisque luctus blandit nisi, id tempus tellus pulvinar eu. Nam ornare laoreet mi a molestie. Donec sodales scelerisque congue. </p>';
										}else {
											echo '<p>'.$current_post->post_msg.'</p>';
										} ?>
							
							
										<div class="post-block mt-5 post-share">
											<h4 class="mb-3">Share this Post</h4>
							
											<!-- AddThis Button BEGIN -->
											<div class="addthis_toolbox addthis_default_style ">
												<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
												<a class="addthis_button_tweet"></a>
												<a class="addthis_button_pinterest_pinit"></a>
												<a class="addthis_counter addthis_pill_style"></a>
											</div>
											<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
											<!-- AddThis Button END -->
							
										</div>
									</div>
								</article>
							
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
<?php require('views/footer.php'); ?>

