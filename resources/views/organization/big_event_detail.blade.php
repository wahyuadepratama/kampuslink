@include('partial/_header_organization')

          <!---
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <span>Big Event</span>
            </li>
            <li class="breadcrumb-item">
              <span>Big Event Detail ({{ $big_event->name }})</span>
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
                              {{ $big_event->name }}
                            </h3>
                          </div>
                          <div class="customer">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="avatar poster">
                                  <img alt="" src="{{ asset('storage/poster/_large/'. $big_event->photo) }}" class="hoverZoomLink">
                                </div>
                              </div>
                              <div class="col-md-4"></div>
                              <div class="col-md-4">
                                <div class="avatar poster">
                                  <img alt="" src="{{ asset('storage/qr/'. $big_event->qr_code) }}" class="hoverZoomLink">
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
                                    <td><?php echo $big_event->description; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Pelaksanaan</td>
                                    <td>{{ \Carbon\Carbon::parse($big_event->start_date)->format('d F Y') }} - {{ \Carbon\Carbon::parse($big_event->end_date)->format('d F Y') }}</td>
                                  </tr>
                                  <tr>
                                    <td>Rangkaian Acara</td>
                                    <td>
                                      @php $subEvent = \App\Models\SubEvent::where('event_id', $big_event->id)->get(); @endphp
                                      @foreach($subEvent as $key)
                                      <a href="{{ url('organization/'. $organization->instagram .'/event/'. $key->slug) }}" class="btn btn-sm btn-outline-primary">{{ $key->name }}</a>
                                      @endforeach
                                    </td>
                                  </tr>
                                    <td>Web</td>
                                    <td>{{ $big_event->web_link }}</td>
                                  </tr>
                                  <tr>
                                    <td>Status</td>
                                    <td>
                                      @if($big_event->approved == 0)
                                      <div class="badge badge-warning">
                                        Pending
                                      </div>
                                      @elseif($big_event->approved == 1)
                                      <div class="badge badge-success">
                                        Approved
                                      </div>
                                      @elseif($big_event->approved == 2)
                                      <div class="badge badge-danger">
                                        Denied
                                      </div>
                                      @endif
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><br>

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
