@include('partial/_header_organization')

        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <span>Dana Terkumpul</span>
          </li>
        </ul>

        <div class="content-i">
          <div class="content-box">
            <div class="row" style="margin-bottom: 5%">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cari Event" id="transaction" onkeyup="searchJs()">
              </div>
            </div>
            <div id="myUL">
            @foreach($subEvent as $key)
            <span>
              <b>
                <div style="display:none">
                  {{ $key->name }}
                </div>
                <div class="element-wrapper">
                    <h6 class="element-header">
                        {{ $key->name }}
                    </h6>
                    <div class="invoice-body">
                      <div class="invoice-desc">
                        <div class="desc-label">
                          #{{$key->id}}
                        </div>
                        <div class="desc-value">
                          <small>{{ $key->updated_at }}</small>
                        </div>
                      </div>
                      <div class="invoice-table">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>
                                Transaksi
                              </th>
                              <th>
                                Tiket
                              </th>
                              <th class="text-right">
                                Total
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @php $transaction = \App\Models\Transaction::where('sub_event_id', $key->id)->where('status', 'Pembayaran Berhasil')->get(); @endphp
                            @php $bigTotal = 0; @endphp
                            @foreach($transaction as $data)
                            <tr>
                              <td>
                                #{{ $data->unique_code }}
                              </td>
                              <td>
                                @php
                                  $ticket = \App\Models\Ticket::where('transaction_id', $data->id)->get();
                                  $total = 0;
                                  foreach($ticket as $price){
                                    $total = $total + $price->price;
                                  }
                                @endphp
                                {{ count($ticket) }}
                              </td>
                              <td class="text-right">
                                Rp {{number_format(($total),0,',','.')}}
                                @php $bigTotal = $bigTotal + $total; @endphp
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <td>
                                Total
                              </td>
                              <td class="text-right" colspan="2">
                                Rp {{number_format(($bigTotal),0,',','.')}}
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="terms">
                          <div class="terms-content">
                            Note: <i>Penarikan dana hanya dapat dilakukan oleh admin {{ $organization->name }}. Info lebih lanjut hubungi: <a href="http://wa.me/6281371321971">Admin KampusLink</a>.</i>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </b>
            </span>
            @endforeach
            </div>
          </div>
        </div>

      <div class="display-type"></div>
    </div>

    <script>
      function searchJs() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('transaction');
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName('span');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByTagName("b")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
          } else {
            li[i].style.display = "none";
          }
        }
      }
    </script>

    @include('partial/_script_footer_admin')

  </body>
</html>
