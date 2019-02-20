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
							<th class="cell100 column2">Total</th>
							<th class="cell100 column3">Status</th>
							<th class="cell100 column4">Dipesan</th>
							<th class="cell100 column5">Lihat</th>
						</tr>
					</thead>
				</table>
			</div>

			<div class="table100-body js-pscroll">
				<table>
					<tbody>

            @foreach($transactions as $transaction)

            <tr class="row100 body <?php if($transaction->seen == false){echo 'active';}  ?>">
							<td class="cell100 column1">{{ $transaction->subEvent->name }}</td>
							<td class="cell100 column2">
                @php
                  $data = \App\Models\Ticket::where('transaction_id', $transaction->id)->get();
                  $total = 0;
                  foreach($data as $key){
                    $total = $total + $key->price;
                  }
                  echo "Rp ". number_format(($total),0,',','.');
                @endphp
              </td>
							<td class="cell100 column3">{{ $transaction->status }}</td>
							<td class="cell100 column4">@php echo \Carbon\Carbon::parse($transaction->created_at)->format('l, d F Y'); @endphp</td>
							<td class="cell100 column5"><a href="{{ url('transaction/'. $transaction->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
						</tr>

            @endforeach

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
