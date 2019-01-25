@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shop Category Page</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="category.html">Category</a>
						<a href="category.html">Women Fashion</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						<div class="left_dorp">
							<select class="sorting">
								<option value="1">Default sorting</option>
								<option value="2">Default sorting 01</option>
								<option value="4">Default sorting 02</option>
							</select>
							<select class="show">
								<option value="1">Show 12</option>
								<option value="2">Show 14</option>
								<option value="4">Show 16</option>
							</select>
						</div>
					</div>

          <div class="latest_product_inner row">

            <div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="{{asset('client/img/product/feature-product/1.jpeg')}}" alt="">
									<div class="p_icon">
										<a href="img/clients-logo/qr-kode.png">
											<i class="fa fa-qrcode" aria-hidden="true"></i>
										</a>
										<a href="img/product/feature-product/1.jpeg">
											<i class="fa fa-search-plus"></i>
										</a>
									</div>
								</div>
								<div class="f_p_body">
									<div class="p_desc">
										<span class="p_title">Firetech
											<span class="badge">New</span>
										</span>
										<span class="p_caption">
											<p><i class="fa fa-th-large" aria-hidden="true"></i> Teknologi</p>
											<p><i class="fa fa-calendar" aria-hidden="true"></i> 14 - 20 April 2018</p>
											<p><i class="fa fa-map-marker" aria-hidden="true"></i> Fakultas Matematika dan Ilmu Pengetahuan </p>
										</span>
										<div class="p_properti">
											<span class="p_contact">
												<h4>Contact</h4>
												<ul class="ul-contact">
													<!-- <li><a href="#" class="orange active"></a></li> -->
													<li><a href="#" class="green"><img src="img/clients-logo/wa.png"></a></li>
													<!-- <li><a href="#" class="yellow"></a></li> -->
												</ul>
											</span>
											<span class="p_detail">
												<a href="single-product.php">Detail</a>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
            						
					</div>
				</div>
				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Kategori</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									<li>
										<a href="#">All</a>
									</li>
									<li>
										<a href="#">Game</a>
									</li>
									<li>
										<a href="#">Seminar</a>
										<ul class="list">
											<li>
												<a href="#">Internasional</a>
											</li>
											<li>
												<a href="#">Nasional</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">Teknologi</a>
										<ul class="list">
											<li>
												<a href="#">Frozen Fish</a>
											</li>
											<li>
												<a href="#">Dried Fish</a>
											</li>
											<li>
												<a href="#">Fresh Fish</a>
											</li>
											<li>
												<a href="#">Meat Alternatives</a>
											</li>
											<li>
												<a href="#">Meat</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">Lomba</a>
									</li>
								</ul>
							</div>
						</aside>
						<aside class="left_widgets p_filter_widgets">
							<div class="l_w_title">
								<h3>Filter Kampus & Organisasi</h3>
							</div>
							<div class="widgets_inner">
								<h4>Kampus</h4>
								<ul class="list">
									<li class="active">
										<a href="#">All</a>
									</li>
									<li>
										<a href="#">Universitas Andalas</a>
									</li>
									<li>
										<a href="#">Universitas Negri Padang</a>
									</li>
								</ul>
							</div>
							<div class="widgets_inner">
								<h4>Organisasi</h4>
								<ul class="list">
									<li>
										<a href="#">Black</a>
									</li>
									<li>
										<a href="#">Black Leather</a>
									</li>
									<li class="active">
										<a href="#">Neo Telemetri</a>
									</li>
									<li>
										<a href="#">Gold</a>
									</li>
									<li>
										<a href="#">Spacegrey</a>
									</li>
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top: 50px;margin-left: 60px;">
				<div class="dll">
					<a href="category.php" class="genric-btn success circle arrow">Lihat Lagi
						<span class="lnr lnr-arrow-right"></span>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->

	<!--================ Subscription Area ================-->
	@include('partial/_subscribe_area')
	<!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
	@include('partial/_footer')
	<!--================ End footer Area  =================-->




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('partial/_script_footer')

<script type="text/javascript">
$(document).ready(function(){
	var lightbox = $('.f_p_img .p_icon a').simpleLightbox();
});
</script>
</body>

</html>
