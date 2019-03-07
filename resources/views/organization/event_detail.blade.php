@include('partial/_header_organization')

          <!---
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="event.php">Event</a>
            </li>
            <li class="breadcrumb-item">
              <span>Detail Event</span>
            </li>
          </ul>
          <!--
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="support-index">
                <div class="support-ticket-content-w">
                  <div class="col-md-7">
                    <div class="support-ticket-content">
                      <div class="support-ticket-content-header">
                        <h3 class="ticket-header">
                          {{ $sub_event->name }}
                        </h3>
                        <a class="back-to-index" href="#"><i class="os-icon os-icon-arrow-left5"></i><span>Back</span></a><a class="show-ticket-info" href="#"><span>Show Details</span><i class="os-icon os-icon-documents-03"></i></a>
                      </div>
                      <div class="ticket-thread">
                        <div class="ticket-reply">
                          <div class="ticket-reply-content">
                            {{ $sub_event->description }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="support-ticket-info">
                      <a class="close-ticket-info" href="#"><i class="os-icon os-icon-ui-23"></i></a>
                      <div class="customer">
                        <div class="avatar poster">
                          <img alt="" src="{{ asset('storage/poster/_medium/'. $sub_event->photo) }}" class="hoverZoomLink">
                        </div>
                      </div>
                      <div class="customer">
                        <div class="avatar poster">
                          <img alt="" src="{{ asset('storage/qr/'. $sub_event->qr_code) }}" class="hoverZoomLink">
                        </div>
                        <div class="customer-tickets">
                          QR Kode Event
                        </div>
                      </div>
                      <h5 class="info-header text-left">
                        Event Details
                      </h5>
                      <div class="info-section text-left">
                        <div class="label">
                          Kategori: @php $sub_event_category = \App\Models\EventCategory::where('sub_event_id', $sub_event->id)->get(); @endphp
                          @foreach($sub_event_category as $key)
                            {{ $key->category->name }}
                          @endforeach
                        </div>
                        <div class="value">
                          Tanggal: {{ \Carbon\Carbon::parse($sub_event->date)->format('d F Y') }}
                        </div>
                        <div class="label">
                          Jam: {{ \Carbon\Carbon::parse($sub_event->start_time)->format('H:m') }} - {{ \Carbon\Carbon::parse($sub_event->end_time)->format('H:m') }}
                        </div>
                        <div class="label">
                          WA: {{ $sub_event->whatsapp }}
                        </div>
                        <div class="label">
                          ID Line: {{ $sub_event->line }}
                        </div>
                        <div class="label">
                          Web: {{ $sub_event->web_link }}
                        </div>
                        <div class="label">
                          Lokasi: {{ $sub_event->location }}
                        </div>
                        <div class="value">
                          Status:
                          @if($sub_event->status == 'past')
                          <div class="badge badge-danger">
                            Sudah Berlalu
                          </div>
                          @elseif($sub_event->approved == 1)
                          <div class="badge badge-success">
                            Approved
                          </div>
                          @else
                          <div class="badge badge-warning">
                            Pending
                          </div>
                          @endif
                        </div>
                      </div>
                      <h5 class="info-header text-left">
                        Peserta
                      </h5>
                      <div class="info-section">
                        <ul class="users-list as-tiles">
                          @php $transaction = \App\Models\Transaction::where('sub_event_id', $sub_event->id)->get(); @endphp
                          @foreach($transaction as $list)
                          <li>
                            <a class="author with-avatar" href="#">
                              <div class="avatar" style="background-image: url({{ asset('storage/avatar/'. $list->user->photo_profile) }})"></div>
                              <span>{{ $list->user->fullname }}</span></a>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>

    @include('partial/_script_footer_admin')

  </body>
</html>
