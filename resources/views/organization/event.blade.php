@include('partial/_header_organization')

  <ul class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <span>Event</span>
    </li>
  </ul>

  <div class="container">

    <div class="row" style="margin: 2%">
      <div class="col-sm-12">
        <div class="element-wrapper">

          <div class="element-box">
            <div class="element-info">
              <div class="element-info-with-icon">
                <div class="element-info-icon">
                  <div class="os-icon os-icon-file-text"></div>
                </div>
                <div class="element-info-text">
                  <h5 class="element-inner-header">
                    Daftar Event
                  </h5>
                  <div class="element-inner-desc">
                    Terdapat dua jenis acara yang bisa kamu publikasikan melalui KampusLink, yaitu Big Event dan Event. Lihat disini apa perbedaannya!
                    <br><br>
                    <button class="mr-2 mb-2 btn btn-outline-primary" data-target="#onboardingWideFeaturesModal1" data-toggle="modal" type="button">Apa itu Big Event ?</button>
                    <div class="onboarding-modal modal fade animated" id="onboardingWideFeaturesModal1" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-centered" role="document">
                        <div class="modal-content text-center">
                          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                          <div class="onboarding-side-by-side">
                            <div class="onboarding-media">
                              <img alt="" src="{{ asset('_admin/img/bigicon6.png')}}" width="200px">
                            </div>
                            <div class="onboarding-content with-gradient">
                              <h4 class="onboarding-title">
                                Apa itu Big Event
                              </h4>
                              <div class="onboarding-text">
                                Big Event merupakan <b>sebuah acara besar</b> yang diangkat suatu organisasi dimana didalam acara tersebut terdapat <b>rangkaian event lain</b>.
                                Misalnya <b>Festival IT Firetech</b> (terdiri dari berbagai macam event seperti <b>Lomba TIK tingkat SMA, Kompetisi PUBG, Kompetisi Dota 2, dsb</b>)
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <ul class="features-list">
                                    <li>
                                      Satu Big Event terdiri dari satu atau kumpulan beberapa event
                                    </li>
                                    <li>
                                      Big Event hanya menampilkan informasi kumpulan event dan tidak ada sistem pembelian tiket untuk Big Event
                                    </li>
                                    <li>
                                      Biasanya setiap organisasi mengangkat sebuah Big Event secara tahunan seperti (Firetech, Accounting Week, Industri Festival, dll)
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button class="mr-2 mb-2 btn btn-outline-primary" data-target="#onboardingWideFeaturesModal2" data-toggle="modal" type="button">Apa itu Event ?</button>
                    <div class="onboarding-modal modal fade animated" id="onboardingWideFeaturesModal2" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-centered" role="document">
                        <div class="modal-content text-center">
                          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                          <div class="onboarding-side-by-side">
                            <div class="onboarding-media">
                              <img alt="" src="{{ asset('_admin/img/bigicon7.png')}}" width="200px">
                            </div>
                            <div class="onboarding-content with-gradient">
                              <h4 class="onboarding-title">
                                Apa itu event
                              </h4>
                              <div class="onboarding-text">
                                Event adalah sebuah acara yang diangkat oleh suatu organisasi pada suatu waktu tertentu. Setiap event yang dipublikasikan kampus link memiliki <b>sistem e-ticket.</b>
                                Misalnya <b>Workshop, Lomba Animasi, Lomba Poster, Hackathon, Lomba Accoustic, dsb</b>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <ul class="features-list">
                                    <li>
                                      Setiap event memiliki kuota tiket
                                    </li>
                                    <li>
                                      Setiap pengguna KampusLink hanya dapat berpartisipasi pada Event dan tidak bisa berpartisaipasi pada Big Event
                                    </li>
                                    <li>
                                      Tidak semua Event harus tergabung didalam rangkaian acara Big Event, bisa saja event diselenggarakan tanpa Big Event (misalnya workshop, seminar, dsb)
                                    </li>
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
              </div>
            </div>
          </div>

          <div class="element-box">
            <div class="row">
              <div class="col-md-2">
                @if(Auth::user()->checkRoleUserOrganization($organization->id) == "Admin")
                <a class="btn btn-outline-danger form-control" href="{{ url('organization/'. $organization->instagram .'/event/add-big-event/show') }}"> <strong>+ Big Event</strong> </a>
                @endif
              </div>
              <div class="col-md-2">
                @if(Auth::user()->checkRoleUserOrganization($organization->id) == "Admin")
                <a class="btn btn-outline-danger form-control" href="{{ url('organization/'. $organization->instagram .'/event/add/show') }}"><strong>+ Event</strong> </a>
                @endif
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-4" style="margin-bottom:2%">
                <select class="form-control" onchange="search(this.value)">
                  @if(isset($oldSearch))
                    <option value="{{ $oldSearch['value'] }}">
                      {{ $oldSearch['name'] }}
                    </option>
                  @endif
                  <option value="all-big-event">
                    Semua Big Event
                  </option>
                  <option value="all-event">
                    Semua Event
                  </option>
                  <option value="event-approved">
                    Event yang Sudah Disetujui
                  </option>
                  <option value="event-pending">
                    Event yang Pending
                  </option>
                  <option value="event-past">
                    Event yang Sudah Berlalu
                  </option>
                  <option value="event-reject">
                    Event yang Ditolak
                  </option>
                </select>
                <script type="text/javascript">
                  function search(id){
                    var filter = window.location.href.split('/')[4];
                    window.location.replace("/organization/"+ "@php echo $organization->instagram@endphp" +"/event?search="+id);
                  }
                </script>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table table-lightborder">
                <thead>
                  <tr>
                    <th>
                      Nama Acara
                    </th>
                    <th class="text-center">
                      Waktu Event
                    </th>
                    <th class="text-center">
                      Status
                    </th>
                    <th class="text-center">
                      Detail
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($subEvent))
                    @foreach($subEvent as $key)
                    <tr>
                      <td class="nowrap">
                        {{ $key->name }}
                      </td>
                      <td class="text-center">
                        @if($key->status == "past")
                        <a class="btn btn-danger form-control btn-sm" href="#">Sudah Berlalu</a>
                        @elseif($key->status == "ongoing")
                        <a class="btn btn-success form-control btn-sm" href="#">Akan Datang</a>
                        @endif
                      </td>
                      <td class="text-center">
                        @if($key->approved == 0)
                        <a class="btn btn-warning form-control btn-sm" href="#">Pending</a>
                        @elseif($key->approved == 1)
                        <a class="btn btn-success form-control btn-sm" href="#">Approved</a>
                        @elseif($key->approved == 2)
                        <a class="btn btn-danger form-control btn-sm" href="#">Denied</a>
                        @endif
                      </td>
                      <td class="text-right">
                        <a class="btn btn-primary form-control btn-sm" href="{{ url('organization/'. $organization->instagram .'/event/'. $key['slug']) }}">Detail Event</a>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                  @if(isset($event))
                    @foreach($event as $key)
                    <tr>
                      <td class="nowrap">
                        {{ $key->name }}
                      </td>
                      <td class="text-center">
                        {{ \Carbon\Carbon::parse($key->start_date)->format('d F Y') }} - {{ \Carbon\Carbon::parse($key->end_date)->format('d F Y') }}
                      </td>
                      <td class="text-center">
                        @if($key->approved == 0)
                        <a class="btn btn-warning form-control btn-sm" href="#">Pending</a>
                        @elseif($key->approved == 1)
                        <a class="btn btn-success form-control btn-sm" href="#">Approved</a>
                        @elseif($key->approved == 2)
                        <a class="btn btn-danger form-control btn-sm" href="#">Denied</a>
                        @endif
                      </td>
                      <td class="text-right">
                        <a class="btn btn-primary form-control btn-sm" href="{{ url('organization/'. $organization->instagram .'/big-event/'. $key['slug']) }}">Detail Event</a>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>              
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
