@include('partial/_header_organization')

          <!---
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <span>Event</span>
            </li>
            <li class="breadcrumb-item">
              <span>Event Detail ({{ $sub_event->name }})</span>
            </li>
          </ul>
          <!--
          END - Breadcrumbs
          -------------------->

          <div class="container">
            <div class="row" style="margin: 2%">
              <div class="col-sm-12">
                <div class="element-wrapper">
                  <div class="element-box">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="support-ticket-info">
                          <!-- <a class="close-ticket-info" href="#"><i class="os-icon os-icon-ui-23"></i></a> -->
                          <div class="support-ticket-content-header">
                            <h3 class="ticket-header">
                              {{ $sub_event->name }}
                            </h3>
                          </div>
                          <div class="customer">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="avatar poster">
                                  <img alt="" src="{{ asset('storage/poster/_large/'. $sub_event->photo) }}" class="hoverZoomLink">
                                </div>
                              </div>
                              <div class="col-md-4"></div>
                              <div class="col-md-4">
                                <div class="avatar poster">
                                  <img alt="" src="{{ asset('storage/qr/event/'. $sub_event->qr_code) }}" class="hoverZoomLink">
                                </div>
                              </div>
                            </div>
                          </div><br>
                          <div class="info-section text-left">
                            <div class="table-responsive">
                              <table class="table table-lightborder">
                                <tbody>
                                  <tr>
                                    <td>Deskripsi</td>
                                    <td><?php echo $sub_event->description; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Kategori</td>
                                    <td>
                                      @php $sub_event_category = \App\Models\EventCategory::where('sub_event_id', $sub_event->id)->get(); @endphp
                                      @foreach($sub_event_category as $key)
                                        {{ $key->category->name }}
                                      @endforeach
                                    </td>
                                  <tr>
                                  <tr>
                                    <td>Tanggal</td>
                                    <td>{{ \Carbon\Carbon::parse($sub_event->date)->format('l, d F Y') }}</td>
                                  </tr>
                                  <tr>
                                    <td>Waktu</td>
                                    <td>{{ \Carbon\Carbon::parse($sub_event->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($sub_event->end_time)->format('H:i') }}</td>
                                  </tr>
                                  <tr>
                                    <td>WhatsApp</td>
                                    <td>{{ $sub_event->whatsapp }}</td>
                                  </tr>
                                  <tr>
                                    <td>Line</td>
                                    <td>{{ $sub_event->line }}</td>
                                  </tr>
                                  <tr>
                                    <td>Web</td>
                                    <td>{{ $sub_event->web_link }}</td>
                                  </tr>
                                  <tr>
                                    <td>Lokasi</td>
                                    <td>{{ $sub_event->location }}</td>
                                  </tr>
                                  <tr>
                                    <td>Status</td>
                                    <td>
                                      @if($sub_event->approved == '0')
                                      <div class="badge badge-warning">
                                        Pending
                                      </div>
                                      @elseif($sub_event->approved == 1)
                                      <div class="badge badge-success">
                                        Approved
                                      </div>
                                      @elseif($sub_event->approved == 2)
                                      <div class="badge badge-danger">
                                        Ditolak
                                      </div>
                                      @endif
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><br>

                            @if($sub_event->approved == 1)
                            <h5 class="info-header text-left">
                              Peserta Terdaftar
                            </h5><br>
                            <div class="info-section">
                              <ul class="users-list as-tiles">
                                @php $transaction = \App\Models\Transaction::where('sub_event_id', $sub_event->id)->where('status','Pembayaran Berhasil')->get(); @endphp
                                @foreach($transaction as $list)
                                  @php $ticketMember = \App\Models\Ticket::where('transaction_id', $list->id)->get(); @endphp
                                  <div class="row">
                                  @foreach($ticketMember as $ticket)
                                  <div class="col-md-4">
                                    <div class="users-list-w">
                                      <div class="user-w with-status status-green">
                                        <div class="user-avatar-w">
                                          <div class="user-avatar">
                                            <img alt="" src="{{ asset('storage/avatar/user.png')}}">
                                          </div>
                                        </div>
                                        <div class="user-name">
                                          <h6 class="user-title">
                                            {{ $ticket->owner }}
                                          </h6>
                                          <div class="user-role">
                                            Tiket {{ $ticket->type }}
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                                  </div>
                                @endforeach
                              </ul>
                            </div>
                            @endif

                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>

    </div>

    @include('partial/_script_footer_admin')

  </body>
</html>