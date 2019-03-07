@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="new_banner_area">
		<div class="banner-img bg-overlay-39">
			<div class="container">
				<h1>Semua Event</h1>
				<ul>
	              <li><a href="index.html">Home</a></li>
	              <li>Semua Event</li>
	            </ul>
			</div>
			<div class="box-position" style="background-image: url(client/img/banner/banner-bg.jpg);"></div>
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
							<select class="sorting" id="category" onchange="searchCategory(this.value)">
								@if(isset($oldCategoryId))
								<option value="{{ $oldCategoryId }}">{{ $oldCategoryName }}</option>
								<option value="all">Semua Kategori</option>
								@else
								<option value="all">Semua Kategori</option>
								@endif

								@foreach($categories as $data)
								<option value="{{ $data->id }}">{{ $data->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

          <div class="latest_product_inner row">

						@if(isset($subEvents) and ! is_null( $subEvents) )
						@php $x = 1000; @endphp
							@foreach($subEvents as $subEvent)
							<div class="col-md-3">
								<div class="f_p_item">
									<div class="f_p_img">
										<img class="img-fluid load-delay{{$subEvent->id}}" src="/client/css/images/bx_loader.gif" data-original="{{asset('storage/poster/_medium/'. $subEvent->photo)}}" alt="">
										<div class="p_icon">											
											@if(\Carbon\Carbon::parse($subEvent->created_at)->format('Y-m-d') == \Carbon\Carbon::now()->toDateString())
											<span class="badge" style="color:black;">New</span>&nbsp;&nbsp;&nbsp;&nbsp;
											@endif
											<a href="{{asset('client/img/icon/qr-kode.png')}}">
												<i class="fa fa-qrcode" aria-hidden="true"></i>
											</a>
											<a href="{{asset('storage/poster/_medium/'. $subEvent->photo)}}">
												<i class="fa fa-search-plus"></i>
											</a>
										</div>
									</div>
									<div class="f_p_body">
										<div class="p_desc">
											<span class="p_title" style="font-size: 80%; font-weight: bolder">
												@php
													$string = $subEvent->name;
													$string = strip_tags($string);

													if (strlen($string) > 15) {
														$trimstring = substr($string, 0, 15) . ' ..';
													} else {
														$trimstring = $string;
													}
													echo $trimstring ;
												@endphp
											</span>
											<span class="p_caption" style="font-size: 80%">
												<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ \Carbon\Carbon::parse($subEvent->date)->format('d F Y') }}</p>
												<p><i class="fa fa-map-marker" aria-hidden="true"></i>
													@php
														$string = $subEvent->location;
														$string = strip_tags($string);

														if (strlen($string) > 20) {
															$trimstring = substr($string, 0, 20)  . ' ..';
														} else {
															$trimstring = $string;
														}
														echo $trimstring;
													@endphp
												</p>
											</span>
											<div class="p_properti">
												<span class="p_contact">
													<h4></h4>
													<ul class="ul-contact">
														<!-- <li><a href="#" class="orange active"></a></li> -->
														<li><a href="{{ url('http://wa.me/'. $subEvent->whatsapp) }}" target="_blank"><img src="{{ asset('client/img/icon/whatsapp.png') }}"></a></li>
														<!-- <li><a href="#" class="yellow"></a></li> -->
													</ul>
												</span>
												<span class="p_detail">
													<a href="/event/{{ $subEvent->slug }}" style="font-size: 90% !important; font-weight: bolder">Detail</a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<script type="text/javascript">
								$(document).ready(function () {
								setTimeout(function () {
									$('.load-delay{{ $subEvent->id }}').each(function () {
										var imagex = $(this);
										var imgOriginal = imagex.data('original');
										$(imagex).attr('src', imgOriginal);
									});
								}, 1000 + {{ $x }});
								});
							</script>
							@php $x = $x + 1000; @endphp
							@endforeach
						@else
							<div class="alert alert-danger" role="alert">
								Data Tidak Ditemukan!
							</div>
						@endif

					</div>
				</div>

				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets p_filter_widgets">
							<div class="l_w_title">
								<h3>Filter Event</h3>
							</div>
							<div class="widgets_inner">
								<h4>Kampus</h4>
								<ul class="list">
									<li class="{{ Request::is('event','event/all/*') ? 'active' : '' }}">
										<a href="#" onclick="searchKampus('all')">All</a>
									</li>
								@foreach($campus as $campus)
									<li class="{{ Request::is('event/'. $campus->id .'/*') ? 'active' : '' }}">
										<a href="#campus-{{ $campus->id }}" id="campus-{{ $campus->id }}" onclick="searchKampus({{ $campus->id }})">{{ $campus->name }}</a>
									</li>
								@endforeach
								</ul>
							</div>
							<div class="widgets_inner">
								<h4>Organisasi</h4>
								<ul class="list">
									<li class="{{ Request::is('event','event/*/all/*') ? 'active' : '' }}">
										<a href="#" onclick="searchOrganization('all')">All</a>
									</li>
									@foreach($organizations as $organization)
										<li class="{{ Request::is('event/*/'. $organization->id.'/*') ? 'active' : '' }}">
											<a href="#organization-{{ $organization->id }}" id="organization-{{ $organization->id }}" onclick="searchOrganization({{ $organization->id }})">{{ $organization->name }}</a>
										</li>
									@endforeach
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-5"></div>
					<div class="col-md-4">
						<div style="margin: 2%">
						  {{ $subEvents->links( "pagination::bootstrap-4") }}
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>

			<!-- <div class="row" style="margin-top: 50px;margin-left: 60px;">
				<div class="dll">
					<a href="category.php" class="genric-btn success circle arrow">Lihat Lagi
						<span class="lnr lnr-arrow-right"></span>
					</a>
				</div>
			</div> -->

		</div>
	</section>
	<!--================End Category Product Area =================-->

	<!--================ Subscription Area ================-->
	@include('partial/_subscribe_area')
	<!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
	@include('partial/_footer')
	<!--================ End footer Area  =================-->

	@include('partial/_js_searching')


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
