@include('partial/_header')

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-7">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('storage/poster/'. $subEvent->photo)}}" alt="First slide">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="s_product_text">
						<div>
							<h2>DETAIL INFO</h2>
						</div>
						<div>
							<ul class="list">
								<li>
									<a class="active" href="#">
										<span><i class="fa fa-th-large"></i></span>
										@php $count = count($categories) @endphp
										@foreach($categories as $category)

											{{$category->category->name}}

											@php $count--; @endphp

											@if($count > 0)
												@php echo ","; @endphp
											@endif

										@endforeach
									</a>
								</li>
								<li>
									<a href="#">
										<span><i class="fa fa-calendar"></i></span> {{ $subEvent->event->organization->name }}
									</a>
								</li>
								<li>
									<a href="#">
										<span><i class="fa fa-map-marker"></i></span> {{ $subEvent->location }} </a>
								</li>
								<li>Kontak :</li>
								<li>
									<a href="#"><img src="{{asset('client/img/clients-logo/wa.png')}}"> {{ $subEvent->whatsapp }} </a>
								</li>
								<li>
									<a href="#"><img src="{{asset('client/img/clients-logo/line.png')}}"> {{ $subEvent->line }}</a>
								</li>
								<li>
									<a href="#"><img src="{{asset('client/img/clients-logo/line.png')}}"> {{ $subEvent->web_link }}</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!-- Deskripsi Event -->
	<section class="deskripsi-area section_gap">
		<div class="container">
			<div class="content">
				<div class="title">
					<h2>{{ $subEvent->name }}</h2>
					<p>@php echo \Carbon\Carbon::parse($subEvent->date)->format('l, d F Y'); @endphp</p>
				</div>
				<div class="desk">
					<p>{{ $subEvent->description }}</p>
				</div>
				<div class="e-tiket">
					<a href="cart.php">BELI TIKET</a>
				</div>
			</div>
		</div>
	</section>
	<!-- END Deskripsi Event -->

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
	var lightbox = $('.card_area a.icon_btn.qr').simpleLightbox();
});
</script>

</body>

</html>
