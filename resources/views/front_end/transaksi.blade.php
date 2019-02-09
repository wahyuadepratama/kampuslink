@include('partial/_header')
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('client/vendors/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('client/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('client/vendors/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('client/vendors/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('client/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('client/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('client/css/main.css')}}">
<!--===============================================================================================-->
<section class="transaksi_box_area p_120">
	<div class="container">
		<div class="table100 ver1 m-b-110">
			<div class="table100-head">
				<table>
					<thead>
						<tr class="row100 head">
							<th class="cell100 column1">Event</th>
							<th class="cell100 column2">Jenis</th>
							<th class="cell100 column3">Status</th>
							<th class="cell100 column4">Jadwal</th>
							<th class="cell100 column5">Lihat</th>
						</tr>
					</thead>
				</table>
			</div>

			<div class="table100-body js-pscroll">
				<table>
					<tbody>
						<!-- kalau inyo masan tiket tapi nio bayia -->
						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">-</td>
							<td class="cell100 column5"><a href="/konfirmasi/1/1"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>
						<!-- kalau alah melewati batas waktu dan inyo alun bayia -->
						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Pembayaran Dibatalkan</td>
							<td class="cell100 column4">-</td>
							<td class="cell100 column5"><a href="/konfirmasi/1/2"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>
						<!-- inyo alah bayia, tunggu proses dek admin -->
						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Diproses</td>
							<td class="cell100 column4">-</td>
							<td class="cell100 column5"><a href="/konfirmasi/1/3"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>
						<!-- setelah inyo bayia, lalu alah diproses dek admin TOLAK -->
						<!-- class = active untuk warna pesan yg belum di baca -->
						<tr class="row100 body active">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Ditolak</td>
							<td class="cell100 column4">-</td>
							<td class="cell100 column5"><a href="/konfirmasi/1/4"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>
						<!-- setelah inyo bayia, lalu alah diproses dek admin SETUJU -->
						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Pembayaran Berhasil</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="/konfirmasi/1/5"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

						<tr class="row100 body">
							<td class="cell100 column1">Hackathon</td>
							<td class="cell100 column2">Reguler</td>
							<td class="cell100 column3">Menunggu Pembayaran</td>
							<td class="cell100 column4">Senin, 22 April 2019 18:00</td>
							<td class="cell100 column5"><a href="tiket.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

@include('partial/_footer')

<!--===============================================================================================-->	
	<script src="{{asset('client/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('client/vendors/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('client/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('client/vendors/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('client/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="{{asset('client/js/main.js')}}"></script>
	<!-- {{asset('client/')}} -->