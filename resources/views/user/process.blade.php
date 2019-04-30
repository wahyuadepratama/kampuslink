@include('partial/_header')
	<!--================Home Banner Area =================-->
	<section class="new_banner_area">
		<div class="banner-img bg-overlay-39">
			<div class="container">
				<h1 style="margin-top:3%">Proses Pembayaran</h1>
				<ul>
          <li><a href="{{ url('/') }}">Home</a></li>
					<li>Process</li>
        </ul>
			</div>
			<div class="box-position"><img src="{{ url('client/img/banner/banner-bg.jpg') }}" alt=""> </div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			@if($message = Session::get('error'))
				<div class="alert alert-danger">
					{{$message}}
				</div>
			@endif
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Event</th>
								<th scope="col">Jenis</th>
								<th scope="col">Harga</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
            <form id="my_form" action="{{ url('event/' .$slug)}}/process" method="post">
            {{ csrf_field() }}
						<tbody>
              @php $limit = false; @endphp
              @foreach($subEventTicket as $key)
							<tr>
								<td>
                  @if($limit == false)
									<div class="media">
										<div class="d-flex">
											{{ $key->subEvent->event->name }}
										</div>
										<div class="media-body">
											<p>{{ $key->subEvent->name }}</p>
										</div>
									</div>
                  @endif
								</td>
								<td>
									<span class="jenis">{{ $key->type }}</span>
								</td>
								<td>
									<h5>Rp {{number_format(($key->price),0,',','.')}}</h5>
								</td>
								<td>
									<div class="product_count">
                    <input type="number" name="qty[{{ $key->type }}]" id='sst{{ $key->id }}' maxlength="12" value="0" title="Quantity:" class="input-text qty{{ $key->id }}">
										<input type="hidden" id="qty{{ $key->id }}">
										<button onclick="var result = document.getElementById('sst{{ $key->id }}'); var sst{{ $key->id }} = result.value; if( !isNaN( sst{{ $key->id }} )) result.value++;return false;"
										 class="increase items-count btn-plus-{{ $key->id }}" type="button">
											<i class="lnr lnr-chevron-up"></i>
										</button>
										<button onclick="var result = document.getElementById('sst{{ $key->id }}'); var sst{{ $key->id }} = result.value; if( !isNaN( sst{{ $key->id }} ) &amp;&amp; sst{{ $key->id }} > 0 ) result.value--;return false;"
										 class="reduced items-count btn-min-{{ $key->id }}" type="button">
											<i class="lnr lnr-chevron-down"></i>
										</button>
									</div>
								</td>
								<td>
									<h5>Rp <span id="total{{ $key->id }}">0</span></h5>
								</td>
							</tr>

              <script type="text/javascript">
                $(document).ready(function(){
                  // reguler
                  $('#sst{{ $key->id }}').on("keyup", function(){

                      var qty = [];
                      var reguler = [];
                      var total = [];
                      qty['{{ $key->id }}'] = $('#sst{{ $key->id }}').val();
                      reguler['{{ $key->id }}'] = {{ $key->price }};
                      total['{{ $key->id }}'] = qty['{{ $key->id }}'] * reguler['{{ $key->id }}'];
                      $('#total{{ $key->id }}').text(new Intl.NumberFormat('en-CA', {style: 'decimal'}).format(total['{{ $key->id }}']));
                      $('#qty{{ $key->id }}').val(total['{{ $key->id }}']);

                      var subtotal = 0;
                      <?php foreach($subEventTicket as $data){ ?>
                        qty['{{ $data->id }}'] = parseInt($('#qty{{ $data->id }}').val());
                        if (!qty['{{ $data->id }}']) {
                          qty['{{ $data->id }}'] = 0;
                        }
                        subtotal = subtotal + qty['{{ $data->id }}'];
                      <?php } ?>

                      $('#subtotal').text(new Intl.NumberFormat('en-CA', {style: 'decimal'}).format(subtotal));

                  });

                  $('.btn-plus-{{ $key->id }}').click(function(){

                    var qty = [];
                    var reguler = [];
                    var total = [];
                    qty['{{ $key->id }}'] = $('#sst{{ $key->id }}').val();
                    reguler['{{ $key->id }}'] = {{ $key->price }};
                    total['{{ $key->id }}'] = qty['{{ $key->id }}'] * reguler['{{ $key->id }}'];
                    $('#total{{ $key->id }}').text(new Intl.NumberFormat('en-CA', {style: 'decimal'}).format(total['{{ $key->id }}']));
                    $('#qty{{ $key->id }}').val(total['{{ $key->id }}']);

                    var subtotal = 0;
                    <?php foreach($subEventTicket as $data){ ?>
                      qty['{{ $data->id }}'] = parseInt($('#qty{{ $data->id }}').val());
                      if (!qty['{{ $data->id }}']) {
                        qty['{{ $data->id }}'] = 0;
                      }
                      subtotal = subtotal + qty['{{ $data->id }}'];
                    <?php } ?>

                    $('#subtotal').text(new Intl.NumberFormat('en-CA', {style: 'decimal'}).format(subtotal));

                  });

                  $('.btn-min-{{ $key->id }}').click(function(){

                    var qty = [];
                    var reguler = [];
                    var total = [];
                    qty['{{ $key->id }}'] = $('#sst{{ $key->id }}').val();
                    reguler['{{ $key->id }}'] = {{ $key->price }};
                    total['{{ $key->id }}'] = qty['{{ $key->id }}'] * reguler['{{ $key->id }}'];
                    $('#total{{ $key->id }}').text(new Intl.NumberFormat('en-CA', {style: 'decimal'}).format(total['{{ $key->id }}']));
                    $('#qty{{ $key->id }}').val(total['{{ $key->id }}']);

                    var subtotal = 0;
                    <?php foreach($subEventTicket as $data){ ?>
                      qty['{{ $data->id }}'] = parseInt($('#qty{{ $data->id }}').val());
                      if (!qty['{{ $data->id }}']) {
                        qty['{{ $data->id }}'] = 0;
                      }
                      subtotal = subtotal + qty['{{ $data->id }}'];
                    <?php } ?>

                    $('#subtotal').text(new Intl.NumberFormat('en-CA', {style: 'decimal'}).format(subtotal));

                  });

                });
              </script>

                @php $limit = true; @endphp
              @endforeach

								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<h5>Rp <span id="subtotal">0</span></h5>
								</td>
							</tr>
							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td align="right">
									<div class="checkout_btn_inner">
										<!-- <a class="gray_btn" href="#">Continue Shopping</a> -->
                    <a class="main_btn" href="javascript:{}" onclick="document.getElementById('my_form').submit();" id="proses_btn">Proceed to checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
            </form>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->

	<!--================ start footer Area  =================-->
	@include('partial/_footer')
	<!--================ End footer Area  =================-->




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('client/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('client/js/popper.js')}}"></script>
<script src="{{ asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('client/js/stellar.js')}}"></script>
<script src="{{ asset('client/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{ asset('client/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('client/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{ asset('client/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{ asset('client/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('client/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset('client/js/mail-script.js')}}"></script>
<script src="{{ asset('client/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{ asset('client/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('client/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{ asset('client/js/theme.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#proses_btn').('class','btn-block');
});
</script>
</body>

</html>
