<?php 
		require('views/header.php'); 
?>
<div class="body">
			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-dark-scale-1 page-header-md">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">

								<h1 class="text-light font-weight-bold text-8">Featured Posts</h1>
								<span class="sub-title text-light">Welcome <?php echo $_SESSION['userName'] ?> !</span>

								<span class="sub-title text-light">Check out our Latest Posts!</span>
							</div>

							<div class="col-md-12 align-self-center order-1">

								<ul class="breadcrumb d-block text-center">
									<li><a href="#">Home</a></li>
									<li class="active">User Welcome </li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">
					
					<div class="row">
						<div class="col">
							<div class="blog-posts">

								<div class="row">

									<?php 
										foreach($top_posts as $post) {
											$image = APP_NON_WEB_BASE_DIR . 'uploadedFiles/' . $post->post_img;
											// Read image path, convert to base64 encoding
											$imageData = base64_encode(file_get_contents($image));
											
											// Format the image SRC:  data:{mime};base64,{data};
											$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
											echo
												'<div class="col-md-4">
													<article class="post post-medium border-0 pb-0 mb-5">
														<div class="post-image" style="text-align:center;">
															<a href="?ctlr=post&amp;action=readPost&amp;id=' . $post->post_id . '">
																<img src="'. $src . '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" style="max-height:350px;" alt="" />
															</a>
														</div>
														<div class="post-content">
															<h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="?ctlr=post&amp;action=readPost&amp;id=' . $post->post_id . '">'. $post->post_title . '</a></h2>
															<p>';
															if(strlen($post->post_msg)> 50) {
																echo substr($post->post_msg, 0 , 50) . '...';
															}else{
																echo $post->post_msg;
															} 
															echo '</p>
															<div class="post-meta">
																<span><i class="far fa-user"></i> By <a href="#">' . $post->post_user . '</a> </span>
																<span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>
																<span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
																<span class="d-block mt-2"><a href="?ctlr=post&amp;action=readPost&amp;id=' . $post->post_id . '" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
															</div>
														</div>
													</article>
												</div>';
										}
									?>
									<!-- <div class="col-md-4">
										<article class="post post-medium border-0 pb-0 mb-5">
											<div class="post-image"style="text-align:center;">
												<a href="blog-post.html">
													<img src="content/img/blog/medium/blog-1.jpg" style="max-height:350px;" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
												</a>
											</div>

											<div class="post-content">

												<h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">Amazing Mountain</a></h2>
												<p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

												<div class="post-meta">
													<span><i class="far fa-user"></i> By <a href="#">Bob Doe</a> </span>
													<span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>
													<span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
													<span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
												</div>

											</div>
										</article>
									</div> -->
										
	

							</div>
						</div>

					</div>

				</div>

			</div>

		</div>

<?php require('views/footer.php'); ?>