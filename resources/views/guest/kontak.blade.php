@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="new_banner_area">
		<div class="banner-img bg-overlay-39">
			<div class="container">
				<h1>Kontak</h1>
				<ul>
	              <li><a href="/">Home</a></li>
	              <li>Kontak</li>
	            </ul>
			</div>
			<div class="box-position" style="background-image: url(client/img/banner/banner-bg.jpg);"></div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Contact Area =================-->
    <section class="contact_area pad_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Gedung Pusat Kegiatan Mahasiswa Lt.2 Universitas Andalas</h6>
                            <p>Neo Telemetri</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>
                                <a href="#">085263xxxxxx</a>
                            </h6>
                            <p>Setiap hari 9.00 - 18.00</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>
                                <a href="#">tanyakami@kampuslink.com</a>
                            </h6>
                            <p>Kirimi kami pertanyaan Anda kapan saja!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Alamat email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Judul">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Masukan Pesan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

    <div class="section-top-border p_120">
    	<div class="container">
    		<h3 class="title_color team">Team Kami</h3>
			<div class="row gallery-item">
				<div class="col-md-3">
					<div class="single-footer-widget teamx f_social_wd">
						<div class="team-content">
							<img src="{{ url('client/img/team/alfikri.jpg') }}">
							<p class="team">Alfikri</p>
							<div class="f_social">
								<a href="#">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#">
									<i class="fa fa-instagram"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="single-footer-widget teamx f_social_wd">
						<div class="team-content">
							<img src="{{ url('client/img/team/alfikri.jpg') }}">
							<p class="team">Alfikri</p>
							<div class="f_social">
								<a href="#">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#">
									<i class="fa fa-instagram"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="single-footer-widget teamx f_social_wd">
						<div class="team-content">
							<img src="{{ url('client/img/team/alfikri.jpg') }}">
							<p class="team">Alfikri</p>
							<div class="f_social">
								<a href="#">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#">
									<i class="fa fa-instagram"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="single-footer-widget teamx f_social_wd">
						<div class="team-content">
							<img src="{{ url('client/img/team/alfikri.jpg') }}">
							<p class="team">Alfikri</p>
							<div class="f_social">
								<a href="#">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#">
									<i class="fa fa-instagram"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	@include('partial/_footer')

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	@include('partial/_script_footer')

</body>

</html>
