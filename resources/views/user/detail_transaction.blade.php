@include('partial/_header')

<!--================Order Details Area =================-->
	<section class="order_details p_120">
		<div class="container">

      @if($status == "Menunggu Pembayaran")
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
			  Maaf, tiket kamu ditolak mungkin dikarenakan kapasitas tiket sudah full atau hal lainnya, segera hubungi kami!
			</div>
      @elseif($status == "Pembayaran Berhasil")
      <div class="alert alert-success" role="alert">
			  Terima kasih telah menggunakan kampuslink untuk pemesanan tiket, jika ada saran atau komentar tentang kami, silahkan kirimkan pesan melalui email@email.com .
			</div>
      @endif

			<div class="row order_d_inner">
				<div class="col-lg-4">
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
							<li>
								<a href="#">
									<span>Status</span> : {{ $status }}</a>
									<!-- <span>Status</span> : Pembayaran Berhasil</a> -->
									<!-- <span>Status</span> : Menunggu Pembayaran</a> -->
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Organisasi</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span>Nama Organisasi</span> : {{ $transaction->subEvent->event->organization->name }}</a>
							</li>
							<li>
								<a href="#">
									<span>Kampus</span> : {{ $transaction->subEvent->event->organization->campus->name }}</a>
							</li>
							<li>
								<a href="#">
									<span>Waktu Pembayaran</span> : <div id="waktu_pembayaran"></div></a>
							</li>
							<li>
								<a href="#">
									<span>Link Tiket</span> : Belum Ada</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Pembeli</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span>Nama</span> : {{ Auth::user()->fullname }}</a>
							</li>
							<li>
								<a href="#">
									<span>Kampus</span> : {{ Auth::user()->programStudy->faculty->campus->name }}</a>
							</li>
							<li>
								<a href="#">
									<span>Fakultas</span> : {{ Auth::user()->programStudy->faculty->name }}</a>
							</li>
							<li>
								<a href="#">
									<span>Jurusan </span> : {{ Auth::user()->programStudy->name }}</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Detail Pembayaran</h2>
				<div class="table-responsive">
					<table class="table" width="100%">
						<thead>
							<tr>
								<th scope="col">Event</th>
								<th scope="col">Jenis</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>{{ $transaction->subEvent->name }}</p>
								</td>
								<td>
									<p>Reguler</p>
								</td>
								<td>
									<h5>x 02</h5>
								</td>
								<td>
									<p>Rp 50,000</p>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<p>VIP</p>
								</td>
								<td>
									<h5>x 02</h5>
								</td>
								<td>
									<p>Rp 100,000</p>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<h4>Total SEMUA</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Rp {{ $total }}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
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
<script src="{{asset('client/js/theme.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
// Set the date we're counting down to
var countDownDate = new Date("Feb 18, 2019 8:59:00").getTime();

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
