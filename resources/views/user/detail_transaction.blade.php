@include('partial/_header')

<!--================Order Details Area =================-->

	<section class="order_details p_120">
		<div class="container">

			@if($status == "Konfirmasi Tiket")
			<div class="alert alert-primary" role="alert">
			  Silahkan isi nama pemilik untuk masing - masing tiket. Nama pada tiket juga akan digunakan oleh organisasi untuk membuat sertifikat.
			</div>
      @elseif($status == "Menunggu Pembayaran")
      <div class="alert alert-info" role="alert">
			  Terima Kasih. e-tiket kamu akan kami proses setelah melakukan pembayaran.
			</div>
      @elseif($status == "Pembayaran Dibatalkan")
      <div class="alert alert-warning" role="alert">
			  Maaf. e-tiket kamu tidak kami proses karna melewati jangka waktu pembayaran.
			</div>
      @elseif($status == "Diproses")
      <div class="alert alert-primary" role="alert">
			  Mohon tunggu, tiket kamu sedang diproses.
			</div>
      @elseif($status == "Ditolak")
      <div class="alert alert-danger" role="alert">
			  Maaf, pemesanan tiket kamu dibatalkan! Info lebih lanjut hubungi kami.
			</div>
      @elseif($status == "Pembayaran Berhasil")
      <div class="alert alert-success" role="alert">
			  Terima kasih telah menggunakan KampusLink untuk pemesanan tiket, jika ada saran atau komentar tentang kami, silahkan kirimkan pesan melalui email <i>tanyakami@kampuslink.com</i> .
			</div>
      @endif

			<div class="row" style="margin-top: 5%">
				<div class="col-md-4">
					<div class="row order_d_inner">
							<div class="details_item">
								<h4>Info Pembayaran</h4>
								<ul class="list">
									<li>
										<a href="#">
											<span>Kode Pembayaran</span> : #{{ $transaction->unique_code }}</a>
									</li>
									<li>
										<a href="#">
											<span>Tanggal Pemesanan</span> : @php echo \Carbon\Carbon::parse($transaction->created_at)->format('l, d F Y'); @endphp</a>
									</li>
									<li>
										<a href="#">
											<span>Total</span> : Rp {{number_format(($total),0,',','.')}}</a>
									</li>
									@if($status == "Pembayaran Berhasil")
									<br><input type="submit" onclick="printDiv('printableArea')" value="Download Ticket" class="btn btn-success form-control">
									@endif
									@if($status == "Diproses" | $status == "Pembayaran Berhasil")  @else
									<li>
										<a href="#">
											<span>Waktu Pembayaran</span> : <div id="waktu_pembayaran"></div></a>
									</li>
									@endif
									<br>
								</ul>
							</div>
					</div>
				</div>

				@if($status == "Konfirmasi Tiket")

				<div class="col-md-8 order_details_div">
					<div class="order_details_table">
						<h2>Detail Tiket {{ $transaction->subEvent->name }}</h2>
						<div class="table-responsive">
							<table class="table" width="100%">
								<thead>
									<tr>
										<th scope="col">Jenis</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									<form class="" action="{{ url('transaction/'. $transaction->unique_code . '/confirm') }}" method="post">
									{{ csrf_field() }}

									@php $ticket = \App\Models\Ticket::where('transaction_id', $transaction->id)->get(); @endphp
									@foreach($ticket as $data)
									<tr>
										<td>{{ $data->type }}</td>
										<td>Rp {{number_format(($data->price),0,',','.')}}</td>
										<td>
											<input type="text" name="value[{{ $data->id }}]" class="form-control" placeholder="Nama Pemilik Tiket">
										</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="2">
										</td>
										<td>
											<input type="submit" value="Konfirmasi" class="form-control btn btn-sm btn-success">
										</td>
									</tr>
									</form>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				@elseif($status == "Ditolak" | $status == "Pembayaran Dibatalkan")

				<div class="col-md-8 order_details_div">
					<div class="order_details_table">
						<h2>Detail Tiket {{ $transaction->subEvent->name }}</h2>
						<div class="table-responsive">
							<table class="table" width="100%">
								<thead>
									<tr>
										<th scope="col">Jenis</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									@php $ticket = \App\Models\Ticket::where('transaction_id', $transaction->id)->get(); @endphp

									@foreach($ticket as $data)
									<tr>
										<td>{{ $data->type }}</td>
										<td>Rp {{number_format(($data->price),0,',','.')}}</td>
									</tr>
									@endforeach

									<tr>
										<td>
											<h4>Total SEMUA</h4>
										</td>
										<td>
											<p>Rp {{number_format(($total),0,',','.')}}</p>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div><br><br>

				@else

				<div class="col-md-8 order_details_div">
					<div class="order_details_table">
						<h2>Detail Tiket {{ $transaction->subEvent->name }}</h2>
						<div class="table-responsive">
							<table class="table" width="100%">
								<thead>
									<tr>
										<th scope="col">Jenis</th>
										<th scope="col">Total</th>
										<th scope="col">Nama</th>
									</tr>
								</thead>
								<tbody>
									@php $ticket = \App\Models\Ticket::where('transaction_id', $transaction->id)->get(); @endphp

									@foreach($ticket as $data)
									<tr>
										<td>{{ $data->type }}</td>
										<td>Rp {{number_format(($data->price),0,',','.')}}</td>
										<td>{{ $data->owner }}</td>
									</tr>
									@endforeach

									<tr>
										<td>
											<h4>Total SEMUA</h4>
										</td>
										<td>
											<p>Rp {{number_format(($total),0,',','.')}}</p>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					@if($status == "Menunggu Pembayaran")
					<div class="order_details_table">
						<h2>Proses Pembayaran</h2>
						<div class="table-responsive">
							<table class="table" width="100%">
								<thead>
									<tr>
										<th scope="col">Bank</th>
										<th scope="col">A/N</th>
										<th scope="col">No Rekening</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="{{ asset('client/img/icon/mandiri.png') }}" width="90px"></td>
										<td>Badu Badui</td>
										<td>6218721183298</td>
									</tr>
									<tr>
										<td><img src="{{ asset('client/img/icon/bni.png') }}" width="90px"></td>
										<td>Badu Badui</td>
										<td>6218721183298</td>
									</tr>
									<tr>
										<td><img src="{{ asset('client/img/icon/bri.png') }}" width="90px"></td>
										<td>Badu Badui</td>
										<td>6218721183298</td>
									</tr>
									<tr>
										<td colspan="3">
											<form class="" action="{{ url('/transaction/'. $transaction->unique_code . '/proof/upload') }}" method="post" enctype="multipart/form-data">
												<input type="file" name="proof" class="form-control-file"><br> {{ csrf_field() }}
												<input type="submit" class="btn btn-sm btn-success form-control" value="Upload">
											</form>
										</td>
									</tr>
									<tr>
										<td colspan="3">
												<li>Lakukan pembayaran ke salah satu rekening di atas.</li>
												<li>Upload bukti pembayaran pada form di atas atau</li>
												<li>Upload bukti pembayaran melalui nomor WhatsApp berikut: 0812XXXXX</li>
												<li>Pembayaran anda akan segera diproses setelah anda melakukan konfirmasi</li>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					@endif

				</div>

				@endif

			</div>

		@if($status == "Pembayaran Berhasil")

			<div id="printableArea">
			@foreach($ticket as $data)
			<section class="tiket_box_area">
				<div class="row" style="display: flex;justify-content: center;align-items: center; margin-right: 0;">
					<div class="col-12 col-md-12">

						<div class="box-tiket">
							<div class="box-tiket2">
								<div class="head-tiket">
									<h1>{{ $transaction->subEvent->name }}</h1>
									<p>{{ \Carbon\Carbon::parse($transaction->subEvent->date)->format('l, d F Y') }}</p>
									<p>{{ \Carbon\Carbon::parse($transaction->subEvent->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($transaction->subEvent->end_time)->format('H:i') }}</p>
								</div>
								<div class="body-tiket">
									<div class="row">
										<div class="col-md-10">
											<div class="row">
												<div class="col-md-3">
													<div class="kode">
														<p>TIKET</p>
														<p>#{{ $data->id }}</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="kode">
														<p>PEMBELI</p>
														<p>{{ $data->owner }}</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="kode">
														<p>JENIS TIKET</p>
														<p>{{ $data->type }}</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="kode">
														<p>ORGANISASI</p>
														<p>{{ $transaction->subEvent->organization->name }}</p>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-9">
													<div class="kode lok">
														<p>LOKASI</p>
														<p>{{ $transaction->subEvent->location }}</p>
													</div>
												</div>
												<div class="col-md-3" style="display: flex;justify-content: center;align-items: center;">
													<img src="{{asset('client/img/logo/logo.png')}}" class="logo">
												</div>
											</div>
										</div>
										<div class="col-md-2 qr" style="display: flex;justify-content: center;align-items: center;">
											<img src="{{asset('client/img/icon/qr-kode.png')}}">
										</div>
								</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			@endforeach
			</div>

			<script type="text/javascript">
				function printDiv(divName) {
					 var printContents = document.getElementById(divName).innerHTML;
					 var originalContents = document.body.innerHTML;

					 document.body.innerHTML = printContents;

					 window.print();

					 document.body.innerHTML = originalContents;
				}
			</script>

		@endif

						<br><br>
	<!--================End Order Details Area =================-->

@include('partial/_footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('client/js/popper.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/js/stellar.js')}}"></script>
<script src="{{asset('client/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<!-- <script src="vendors/lightbox/lightbox-plus-jquery.min.js"></script> -->
<script src="{{asset('client/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('client/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('client/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('client/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('client/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('client/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<!-- <script src="{{asset('client/vendors/flipclock/timer.js')}}"></script> -->
<script src="{{asset('client/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('client/js/mail-script.js')}}"></script>
<!-- <script src="{{asset('client/js/theme.js')}}"></script> -->
<script type="text/javascript">
$(document).ready(function () {
// Set the date we're counting down to
var countDownDate = new Date("@php echo \Carbon\Carbon::parse($transaction->countdown)->format('M d, Y H:i:s'); @endphp").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Output the result in an element with id="demo"
  // document.getElementById("getting-started").innerHTML = days + "d " + hours + "h "
  // + minutes + "m " + seconds + "s ";
   document.getElementById("waktu_pembayaran").innerHTML = hours + ":"
  + minutes + ":" + seconds;

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("waktu_pembayaran").innerHTML = "KADALUARSA";
  }
}, 1000);
});
</script>
