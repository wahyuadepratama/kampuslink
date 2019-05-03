@include('partial/_header_organization')

          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <span>Dashboard</span>
            </li>
          </ul>

          <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>

          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Utama
                    </h6>
                    <div class="element-content">
                      <div class="row">

                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Big Events
                            </div>
                            <div class="value">
                              {{ $countEvent }}
                            </div>
                            <div class="trending trending-up-basic">
                              <span>Lihat</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Ongoing Events
                            </div>
                            <div class="value">
                              {{ $countSubEventOngoing }}
                            </div>
                            <div class="trending trending-up-basic">
                              <span>Lihat</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Past Events
                            </div>
                            <div class="value">
                              {{ $countSubEventPast }}
                            </div>
                            <div class="trending trending-down-basic">
                              <span>Lihat</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Anggota
                            </div>
                            <div class="value">
                              @php echo count($admin); @endphp
                            </div>
                          </a>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="padded-lg">
                    <!--START - Projects list-->
                    <div class="projects-list">

                      @foreach($subEvent as $key)
                      <div class="project-box">
                        <div class="project-head">
                          <div class="project-title">
                            <h5>
                              {{ $key['name'] }}
                            </h5>
                          </div>
                          <div class="project-users">
                            @php $eventViewer = \App\Models\EventViewer::where('sub_event_id', $key['id'])->get(); @endphp
                            <div class="avatar">
                              <img alt="" src="{{ asset('client/img/icon/user.png')}}">
                            </div>
                            <div class="avatar">
                              <img alt="" src="{{ asset('client/img/icon/user.png')}}">
                            </div>
                            <div class="avatar">
                              <img alt="" src="{{ asset('client/img/icon/user.png')}}">
                            </div>
                            <div class="avatar">
                              <img alt="" src="{{ asset('client/img/icon/user.png')}}">
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="more">
                               @php echo count($eventViewer); @endphp View
                            </div>
                          </div>
                        </div>

                        @php
                          $transaction = \App\Models\Transaction::where('sub_event_id', $key['id'])->with('ticket')->where('status', 'Pembayaran Berhasil')->get();
                          $countTicket = 0;
                          $totalPrice = 0;
                          foreach($transaction as $data){
                            $countTicket = $countTicket + count($data->ticket);
                            foreach($data->ticket as $price){
                              $totalPrice = $totalPrice + $price->price;
                            }
                          }
                          $stocks = \App\Models\SubEventTicket::where('sub_event_id', $key['id'])->get();
                          $stock = 0;
                          foreach($stocks as $x){
                            $stock = $stock + $x->stock;
                          }
                          $percent = $countTicket/$stock * 100;
                        @endphp

                        <div class="project-info">
                          <div class="row align-items-center">
                            <div class="col-sm-5">
                              <div class="row">
                                <div class="col-12">
                                  <div class="el-tablo highlight">
                                    <div class="label">
                                      Dana Terkumpul
                                    </div>
                                    <div class="value" style="font-size: 250%">
                                      Rp {{number_format(($totalPrice),0,',','.')}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5 offset-sm-2">
                              <div class="os-progress-bar primary">
                                <div class="bar-labels">
                                  <div class="bar-label-left">
                                    <span>Tiket terjual</span><span class="positive"> {{ $countTicket }} </span>
                                  </div>
                                  <div class="bar-label-right">
                                    <span class="info"> {{ $countTicket }} / {{ $stock }}</span>
                                  </div>
                                </div>
                                <div class="bar-level-1" style="width: 100%">
                                  <div class="bar-level-2" style="width: {{ $percent }}%">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="os-progress-bar primary">
                                <div class="bar-labels">
                                  <div class="bar-label-left">
                                    <span class="positive">{{ \Carbon\Carbon::parse($key['date'])->format('d F Y') }}</span>
                                  </div>
                                  <div class="bar-label-right">
                                    <span class="info">{{ \Carbon\Carbon::parse($key['start_time'])->format('H:m') }} - {{ \Carbon\Carbon::parse($key['end_time'])->format('H:m') }}</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5 offset-sm-2">
                              <button class="mr-2 mb-2 btn btn-outline-success btn-block" type="button" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon"> Promosikan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach

                      @if(empty($subEvent))
                      <div class="project-box">
                        <div class="project-info">
                          <div class="row align-items-center">
                            <div class="col-sm-12" style="text-align: center;">
                              Belum Ada Event
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif

                    </div>
                    <!--END - Projects list-->
                  </div>
                </div>
              </div>
            </div>
            <!--
            START - Sidebar
            -------------------->
            <div class="content-panel">
              <div class="content-panel-close">
                <i class="os-icon os-icon-close"></i>
              </div>
              @if(Auth::user()->checkRoleUserOrganization($organization->id) == "Admin")
              <div class="element-wrapper">
                <h6 class="element-header">
                  Pintasan
                </h6>
                <div class="element-box-tp">
                  <div class="el-buttons-list full-width">
                    <a class="btn btn-white btn-sm" href="{{ url('organization/' . $organization->instagram . '/event/add-big-event/show') }}"><i class="os-icon os-icon-delivery-box-2"></i><span>+ Big Event Baru</span></a>
                  </div>
                  <div class="el-buttons-list full-width">
                    <a class="btn btn-white btn-sm" href="{{ url('organization/' . $organization->instagram . '/event/add/show') }}"><i class="os-icon os-icon-delivery-box-2"></i><span>+ Event Baru</span></a>
                  </div>
                </div>
              </div>
              @endif
              <!--
              START - Team Members
              -------------------->
              <div class="element-wrapper">
                <h6 class="element-header">
                  Anggota
                </h6>
                <div class="element-box-tp">
                  <div class="input-search-w">
                    <input id="anggota" onkeyup="searchJs()" class="form-control rounded bright" placeholder="Cari Anggota..." type="search">
                    <div id="myUL">
                      <div class="users-list-w">
                      @foreach($admin as $key)
                      <span>
                        <b>
                          <div style="display:none">
                            {{ $key->user->fullname }}
                          </div>
                          @if($key->user->isOnline($key->user->id))
                          <div class="user-w with-status status-green">
                            <div class="user-avatar-w">
                              <div class="user-avatar">
                                <img alt="" src="{{ asset('storage/avatar/'. $key->user->photo_profile)}}">
                              </div>
                            </div>
                            <div class="user-name">
                              <h6 class="user-title">
                                {{ $key->user->fullname }}
                              </h6>
                              <div class="user-role">
                                {{ $key->user->programStudy->name }}
                              </div>
                            </div>
                            <a class="user-action" href="#" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon">
                              <div class="os-icon os-icon-email-forward"></div>
                            </a>
                          </div>
                          @else
                          <div class="user-w with-status status-red">
                            <div class="user-avatar-w">
                              <div class="user-avatar">
                                <img alt="" src="{{ asset('storage/avatar/'. $key->user->photo_profile)}}">
                              </div>
                            </div>
                            <div class="user-name">
                              <h6 class="user-title">
                                {{ $key->user->fullname }}
                              </h6>
                              <div class="user-role">
                                {{ $key->user->programStudy->name }}
                              </div>
                            </div>
                            <a class="user-action" href="#" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon">
                              <div class="os-icon os-icon-email-forward"></div>
                            </a>
                          </div>
                          @endif
                        </b>
                      </span>
                      @endforeach
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!--
              END - Team Members
              -------------------->
            </div>
            <!--
            END - Sidebar
            -------------------->
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>

    <script>
      function searchJs() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('anggota');
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
