@include('partial/_header_organization')

    <ul class="breadcrumb">
      <li class="breadcrumb-item">
        <span>Event</span>
      </li>
    </ul>

    <div class="rentals-list-w">
      <div class="rentals-list">
        <div class="list-controls">
          <div class="list-info">
            <div class="content-box">
              <div class="element-wrapper" style="margin-bottom: -5%">
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
                          <button class="mr-2 mb-2 btn btn-primary" data-target="#onboardingWideFeaturesModal1" data-toggle="modal" type="button">Apa itu Big Event ?</button>
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

                          <button class="mr-2 mb-2 btn btn-primary" data-target="#onboardingWideFeaturesModal2" data-toggle="modal" type="button">Apa itu Event ?</button>
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
              </div>

              <div class="list-order">
                <label for="">Filter:</label>
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
                    window.location.replace("/organization/event?search="+id);
                  }
                </script>
              </div>

            </div>
          </div>

        </div>

        @if(isset($subEvent))
        <div class="property-items as-grid">

            <div class="property-item">
              <div class="event-tambah">
                <div class="profile-tile profile-tile-inlined">
                  <a class="profile-tile-box faded" href="{{ url('organization/event/add') }}">
                    <div class="pt-new-icon">
                      <i class="os-icon os-icon-plus"></i>
                    </div>
                    <div class="pt-user-name">
                      Tambah Event
                    </div>
                  </a>
                </div>
              </div>
            </div>

            @foreach($subEvent as $key)
              <div class="property-item event-produk">
              <a class="item-media-w" href="#">
                <div class="item-media" style="background-image: url({{ asset('storage/poster/_medium/'.$key['photo'].')')}}"></div>
              </a>
              <div class="item-info">
                <div class="item-features">
                  <div class="feature">
                    @if($key['approved'] == 1)
                    <button class="btn btn-outline-success btn-sm" type="button"> Approved</button>
                    @elseif($key['approved'] == 2)
                    <button class="btn btn-outline-danger btn-sm" type="button"> Denied</button>
                    @else
                    <button class="btn btn-warning btn-sm" type="button"> Pending</button>
                    @endif
                  </div>
                </div>
                <h3 class="item-title">
                  <a style="font-size:70%" href="#">{{ $key['name'] }}</a>
                </h3>
                  <div class="row">
                  <div class="item-price-buttons col-12">
                    @if($key['approved'] == 2)
                      <a class="btn btn-outline-primary btn-block" href="{{ url('organization/event/add') }}"><span>Ajukan Kembali</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                    @else
                      <a class="btn btn-outline-primary btn-block" href="{{ url('organization/event/'. $key['slug']) }}"><span>Detail</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                    @endif
                  </div>
                  </div>
              </div>
            </div>
            @endforeach
        </div>
        @endif

        @if(isset($event))
        <div class="property-items as-grid">

            <div class="property-item">
              <div class="event-tambah">
                <div class="profile-tile profile-tile-inlined">
                  <a class="profile-tile-box faded" href="{{ url('organization/event/add-big-event') }}">
                    <div class="pt-new-icon">
                      <i class="os-icon os-icon-plus"></i>
                    </div>
                    <div class="pt-user-name">
                      Tambah Big Event
                    </div>
                  </a>
                </div>
              </div>
            </div>

            @foreach($event as $key)
              <div class="property-item event-produk">
              <a class="item-media-w" href="#">
                <div class="item-media" style="background-image: url({{ asset('storage/poster/_medium/'.$key['photo'].')')}}"></div>
              </a>
              <div class="item-info">
                <div class="item-features">
                  <div class="feature">
                    <button class="btn btn-outline-success btn-sm" type="button"> Approved</button>
                  </div>
                </div>
                <h3 class="item-title">
                  <a style="font-size:70%" href="#">{{ $key['name'] }}</a>
                </h3>
                  <div class="row">
                  <div class="item-price-buttons col-12">
                      <a class="btn btn-outline-primary btn-block" href="{{ url('organization/even') }}"><span>Detail</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                  </div>
                  </div>
              </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="pagination-w">
          <div class="pagination-info">
            Urutan
          </div>
          <div class="pagination-links">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link" href="#"> Previous</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#"> 1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#"> 2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#"> 3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#"> Next</a>
              </li>
            </ul>
          </div>
      <!--
    END - Rentals Content
    -------------------->
        </div>
      </div>
    </div>
    <div class="display-type"></div>
  </div>

  @include('partial/_script_footer_admin')

</body>
</html>
