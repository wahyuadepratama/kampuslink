@include('partial/_superadmin_header')

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
            Dashboard
          </h6>
          <div class="element-content">
            <div class="row">

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    User sudah diverifikasi
                  </div>
                  <div class="value">
                    {{ count($userVerified) }}
                  </div>
                  <div class="trending trending-up-basic">
                    <span>Lihat</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    User belum diverifikasi
                  </div>
                  <div class="value">
                    {{ count($userNotVerified) }}
                  </div>
                  <div class="trending trending-down-basic">
                    <span>Cek Verifikasi</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Total Big Event
                  </div>
                  <div class="value">
                    {{ count($bigEvent) }}
                  </div>
                  <div class="trending trending-up-basic">
                    <span>Lihat</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Total Event
                  </div>
                  <div class="value">
                    {{ count($subEvent) }}
                  </div>
                  <div class="trending trending-up-basic">
                    <span>Lihat</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Event Akan Berlangsung
                  </div>
                  <div class="value">
                    {{ count($eventOngoing) }}
                  </div>
                  <div class="trending trending-up-basic">
                    <span>Lihat</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Event Sudah Berlalu
                  </div>
                  <div class="value">
                    {{ count($eventPast) }}
                  </div>
                  <div class="trending trending-up-basic">
                    <span>Lihat</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Permintaan Big Event
                  </div>
                  <div class="value">
                    {{ count($requestBigEvent) }}
                  </div>
                  <div class="trending trending-down-basic">
                    <span>Cek Big Event</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Permintaan Event
                  </div>
                  <div class="value">
                    {{ count($requestEvent) }}
                  </div>
                  <div class="trending trending-down-basic">
                    <span>Cek Event</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-4 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Transaksi (Menunggu Pembayaran)
                  </div>
                  <div class="value">
                    {{ count($transactionWaitingPayment) }}
                  </div>
                  <div class="trending trending-down-basic">
                    <span>Ingatkan</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-4 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Transaksi (Sudah Melakukan Pembayaran)
                  </div>
                  <div class="value">
                    {{ count($transactionProcess) }}
                  </div>
                  <div class="trending trending-down-basic">
                    <span>Proses Tiket</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-4 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Transaksi (Selesai)
                  </div>
                  <div class="value">
                    {{ count($transactionSuccess) }}
                  </div>
                  <div class="trending trending-up-basic">
                    <span>Lihat</span>
                  </div>
                </a>
              </div>

              <div class="col-sm-4 col-xxxl-3">
                <a class="element-box el-tablo" href="#">
                  <div class="label">
                    Transaksi (Dibatalkan)
                  </div>
                  <div class="value">
                    {{ count($transactionReject) }}
                  </div>
                  <div class="trending trending-up-basic">
                    <span>Lihat</span>
                  </div>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="element-wrapper">
          <div class="element-actions">
            <form class="form-inline justify-content-sm-end">
              <select class="form-control form-control-sm rounded" id="filter_even">
                <option value="all">
                  Semua
                </option>
                <option value="permintaan">
                  Permintaan
                </option>
                <option value="perbaikan">
                  Perbaikan
                </option>
                <option value="tiket">
                  Permintaan Tiket
                </option>
              </select>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12" id="permintaan">
        <div class="element-wrapper">
          <h6 class="element-header">
            Permintaan
          </h6>
          <div class="element-content">
            <div class="element-box-tp">
              <div class="post-box">
                <div class="post-media" style="background-image: url(img/portfolio1.jpg)"></div>
                <div class="post-content">
                  <h6 class="post-title">
                    Judul Even
                  </h6>
                  <div class="post-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue.
                  </div>
                  <div class="post-foot">
                    <div class="post-tags">
                      <div class="badge badge-primary">
                        Game
                      </div>
                      <div class="badge badge-primary">
                        Teknologi
                      </div>
                    </div>
                    <a class="post-link" href="#" data-target="#detail_x" data-toggle="modal"><span>Baca dan Aksi</span><i class="os-icon os-icon-arrow-right7"></i></a>
                  </div>
                </div>
              </div>
              <div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade" id="detail_x" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        Judul Even
                      </h5>
                      <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                    </div>
                    <div class="modal-body">
                      <img src="img/portfolio1.jpg" width="100%">
                      <div class="content">
                        <p style="margin-bottom: 0">Organisasi : Neotelemetri</p>
                        <p style="margin-bottom: 0">Kampus : Universitas Andalas</p>
                        <p style="margin-bottom: 0">Tingkat : Fakultas</p>
                        <p style="margin-bottom: 0">Jadwal Mulai : 6 Juni 2019</p>
                        <p style="margin-bottom: 0">Jadwal Berakhir : 7 Juni 2019</p>
                        <p>Situs Web : www.domain.com</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue.</p>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                      <button class="btn btn-success" type="button"> Aktifkan</button>
                      <button class="btn btn-danger" type="button" id="talak-x"> Tolak</button>
                    </div>
                    <div class="container">
                      <div class="row tutup" id="even-x" style="padding-bottom: 18px;">
                        <div class="col-12">
                          <form>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Alasan Penolakan</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">Kirim</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="post-box">
                <div class="post-media" style="background-image: url(img/portfolio2.jpg)"></div>
                <div class="post-content">
                  <h6 class="post-title">
                    Judul Even
                  </h6>
                  <div class="post-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue.
                  </div>
                  <div class="post-foot">
                    <div class="post-tags">
                      <div class="badge badge-primary">
                        Seminar
                      </div>
                      <div class="badge badge-primary">
                        Teknologi
                      </div>
                    </div>
                    <a class="post-link" href="#"><span>Baca dan Aksi</span><i class="os-icon os-icon-arrow-right7"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12" id="perbaikan">
        <div class="element-wrapper">
          <h6 class="element-header">
            Perbaikan
          </h6>
          <div class="element-content">
            <div class="element-box-tp">
              <div class="post-box">
                <div class="post-media" style="background-image: url(img/portfolio1.jpg)"></div>
                <div class="post-content">
                  <h6 class="post-title">
                    Judul Even
                  </h6>
                  <div class="post-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue.
                  </div>
                  <div class="post-foot">
                    <div class="post-tags">
                      <div class="badge badge-primary">
                        Game
                      </div>
                      <div class="badge badge-primary">
                        Teknologi
                      </div>
                    </div>
                    <a class="post-link" href="#" data-target="#detail_xx" data-toggle="modal"><span>Baca dan Aksi</span><i class="os-icon os-icon-arrow-right7"></i></a>
                  </div>
                </div>
              </div>
              <div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade" id="detail_xx" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        Judul Even
                      </h5>
                      <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                    </div>
                    <div class="modal-body">
                      <img src="img/portfolio1.jpg" width="100%">
                      <div class="content">
                        <p style="margin-bottom: 0">Organisasi : Neotelemetri</p>
                        <p style="margin-bottom: 0">Kampus : Universitas Andalas</p>
                        <p style="margin-bottom: 0">Tingkat : Fakultas</p>
                        <p style="margin-bottom: 0">Jadwal Mulai : 6 Juni 2019</p>
                        <p style="margin-bottom: 0">Jadwal Berakhir : 7 Juni 2019</p>
                        <p>Situs Web : www.domain.com</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue tessssssssssssss.</p>
                      </div>
                      <div class="alert alert-warning">
                        <h4 class="alert-heading">Alasan Penolakan Dahulu!</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                      <button class="btn btn-success" type="button"> Aktifkan</button>
                      <button class="btn btn-danger" type="button" id="talak-xx"> Tolak</button>
                    </div>
                    <div class="container">
                      <div class="row tutup" id="even-xx" style="padding-bottom: 18px;">
                        <div class="col-12">
                          <form>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Alasan Penolakan</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">Kirim</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="post-box">
                <div class="post-media" style="background-image: url(img/portfolio2.jpg)"></div>
                <div class="post-content">
                  <h6 class="post-title">
                    Judul Even
                  </h6>
                  <div class="post-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus interdum lectus vel gravida. Phasellus viverra interdum dui vitae consequat. Nullam justo lacus, pharetra vel tortor a, euismod facilisis nunc. Nullam sit amet sapien in libero lobortis pharetra bibendum eu quam. Curabitur mattis, nibh sed lobortis rhoncus, lorem ligula ultricies velit, a consectetur risus sapien ac libero. Sed interdum arcu euismod orci elementum tincidunt. Aenean accumsan ac sapien in congue.
                  </div>
                  <div class="post-foot">
                    <div class="post-tags">
                      <div class="badge badge-primary">
                        Seminar
                      </div>
                      <div class="badge badge-primary">
                        Teknologi
                      </div>
                    </div>
                    <a class="post-link" href="#"><span>Baca dan Aksi</span><i class="os-icon os-icon-arrow-right7"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Start Permintaan Tiket -->
      <div class="col-sm-12" id="tiket">
        <div class="element-wrapper">
          <h6 class="element-header">
            Permintaan Tiket
          </h6>
          <div class="element-content">
            <div class="element-box-tp">
              <div class="post-box">
                <div class="post-content">
                  <h6 class="post-title">
                    Judul Even 1
                    <button class="btn btn-default btn-sm" data-target="#detail_xxx" data-toggle="modal" style="margin-left: 1rem">Detail Peserta</button>
                  </h6>
                  <div class="post-text">
                    <p style="display: inline-block;">Organisasi : Neotelemetri</p>
                    <p style="display: inline-block;margin-left: 14px;">Jadwal Mulai : 6 Juni 2019</p>
                    <p style="display: inline-block;margin-left: 14px;">Jadwal Berakhir : 7 Juni 2019</p>
                    <p style="display: inline-block;margin-left: 14px;">Reguler : Rp 10.000</p>
                    <p style="display: inline-block;margin-left: 14px;">VIP : Rp 20.000</p>
                    <div class="row" style="width: 100%;">
                      <div class="col-sm-12">
                        <div class="os-progress-bar primary">
                          <div class="bar-labels">
                            <div class="bar-label-left">
                              <span>Progress</span><span class="positive">+12</span>
                            </div>
                            <div class="bar-label-right">
                              <span class="info">72/100</span>
                            </div>
                          </div>
                          <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 75%">
                              <div class="bar-level-3" style="width: 85%"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="post-foot">
                    <div class="element-box-tp">
                      <div class="row">
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                              <div class="pt-avatar-w">
                                <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                              </div>
                              <div class="pt-user-name">
                                Wahyu
                              </div>
                            </a>
                            <div class="profile-tile-meta">
                              <ul>
                                <li>
                                  Bank Penerima:<strong>Alfikri</strong>
                                </li>
                                <li>
                                  Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                </li>
                                <li>
                                  Total:<strong>Rp 40.123</strong>
                                </li>
                              </ul>
                              <div class="pt-btn">
                                <a class="btn btn-success btn-sm" href="">Terima</a>
                                <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade" id="detail_xxx" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        Detail Peserta
                      </h5>
                      <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="post-foot">
                        <div class="element-box-tp">
                          <div class="row">
                            <div class="col">
                              <div class="profile-tile">
                                <a class="profile-tile-box" href="users_profile_small.html">
                                  <div class="pt-avatar-w">
                                    <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                                  </div>
                                  <div class="pt-user-name">
                                    Wahyu
                                  </div>
                                </a>
                                <div class="profile-tile-meta">
                                  <ul>
                                    <li>
                                      Bank Penerima:<strong>Alfikri</strong>
                                    </li>
                                    <li>
                                      Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Total:<strong>Rp 40.123</strong>
                                    </li>
                                  </ul>
                                  <div class="pt-btn">
                                    <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Batalkan</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="profile-tile">
                                <a class="profile-tile-box" href="users_profile_small.html">
                                  <div class="pt-avatar-w">
                                    <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                                  </div>
                                  <div class="pt-user-name">
                                    Wahyu
                                  </div>
                                </a>
                                <div class="profile-tile-meta">
                                  <ul>
                                    <li>
                                      Bank Penerima:<strong>Alfikri</strong>
                                    </li>
                                    <li>
                                      Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Total:<strong>Rp 40.123</strong>
                                    </li>
                                  </ul>
                                  <div class="pt-btn">
                                    <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Batalkan</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="profile-tile">
                                <a class="profile-tile-box" href="users_profile_small.html">
                                  <div class="pt-avatar-w">
                                    <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                                  </div>
                                  <div class="pt-user-name">
                                    Wahyu
                                  </div>
                                </a>
                                <div class="profile-tile-meta">
                                  <ul>
                                    <li>
                                      Bank Penerima:<strong>Alfikri</strong>
                                    </li>
                                    <li>
                                      Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Total:<strong>Rp 40.123</strong>
                                    </li>
                                  </ul>
                                  <div class="pt-btn">
                                    <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Batalkan</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="profile-tile">
                                <a class="profile-tile-box" href="users_profile_small.html">
                                  <div class="pt-avatar-w">
                                    <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                                  </div>
                                  <div class="pt-user-name">
                                    Wahyu
                                  </div>
                                </a>
                                <div class="profile-tile-meta">
                                  <ul>
                                    <li>
                                      Bank Penerima:<strong>Alfikri</strong>
                                    </li>
                                    <li>
                                      Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                      Total:<strong>Rp 40.123</strong>
                                    </li>
                                  </ul>
                                  <div class="pt-btn">
                                    <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Batalkan</a>
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

              <div class="post-box">
                <div class="post-content">
                  <h6 class="post-title">
                    Judul Even 2
                    <button class="btn btn-default btn-sm" style="margin-left: 1rem">Detail Peserta</button>
                  </h6>
                  <div class="post-text">
                    <p style="display: inline-block;">Organisasi : Neotelemetri</p>
                    <p style="display: inline-block;margin-left: 14px;">Jadwal Mulai : 6 Juni 2019</p>
                    <p style="display: inline-block;margin-left: 14px;">Jadwal Berakhir : 7 Juni 2019</p>
                    <div class="row" style="width: 100%;">
                      <div class="col-sm-12">
                        <div class="os-progress-bar primary">
                          <div class="bar-labels">
                            <div class="bar-label-left">
                              <span>Progress</span><span class="positive">+12</span>
                            </div>
                            <div class="bar-label-right">
                              <span class="info">72/100</span>
                            </div>
                          </div>
                          <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 75%">
                              <div class="bar-level-3" style="width: 85%"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="post-foot">
                    <div class="element-box-tp" style="display: flex;justify-content: flex-start;">
                      <div class="profile-tile">
                        <a class="profile-tile-box" href="users_profile_small.html">
                          <div class="pt-avatar-w">
                            <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                          </div>
                          <div class="pt-user-name">
                            Wahyu
                          </div>
                        </a>
                        <div class="profile-tile-meta">
                          <ul>
                            <li>
                              Bank Penerima:<strong>Alfikri</strong>
                            </li>
                            <li>
                              Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                            </li>
                            <li>
                              Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                            </li>
                            <li>
                              Total:<strong>Rp 40.123</strong>
                            </li>
                          </ul>
                          <div class="pt-btn">
                            <a class="btn btn-success btn-sm" href="">Terima</a>
                            <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                          </div>
                        </div>
                      </div>
                      <div class="profile-tile">
                        <a class="profile-tile-box" href="users_profile_small.html">
                          <div class="pt-avatar-w">
                            <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                          </div>
                          <div class="pt-user-name">
                            Wahyu
                          </div>
                        </a>
                        <div class="profile-tile-meta">
                          <ul>
                            <li>
                              Bank Penerima:<strong>Alfikri</strong>
                            </li>
                            <li>
                              Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                            </li>
                            <li>
                              Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                            </li>
                            <li>
                              Total:<strong>Rp 40.123</strong>
                            </li>
                          </ul>
                          <div class="pt-btn">
                            <a class="btn btn-success btn-sm" href="">Terima</a>
                            <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
                          </div>
                        </div>
                      </div>
                      <div class="profile-tile">
                        <a class="profile-tile-box" href="users_profile_small.html">
                          <div class="pt-avatar-w">
                            <img alt="" src="img/avatar1.jpg" class="hoverZoomLink">
                          </div>
                          <div class="pt-user-name">
                            Wahyu
                          </div>
                        </a>
                        <div class="profile-tile-meta">
                          <ul>
                            <li>
                              Bank Penerima:<strong>Alfikri</strong>
                            </li>
                            <li>
                              Tiket Reguler:<strong><a href="apps_support_index.html">12</a></strong>
                            </li>
                            <li>
                              Tiket VIP:<strong><a href="apps_support_index.html">12</a></strong>
                            </li>
                            <li>
                              Total:<strong>Rp 40.123</strong>
                            </li>
                          </ul>
                          <div class="pt-btn">
                            <a class="btn btn-success btn-sm" href="">Terima</a>
                            <a class="btn btn-secondary btn-sm" href="" style="margin-left: 0;">Tolak</a>
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
      <!-- End Permintaan Tiket -->
    </div>
  </div>
</div>
</div>
</div>
<div class="display-type"></div>
</div>

  @include('partial/_superadmin_script_footer')

  <script type="text/javascript">
      $(document).ready(function(){
      $('#filter_even').change(function(){
      var filter = $(this).val();
      if (filter=="all") {
      $('#permintaan').addClass("buka");
      $('#permintaan').removeClass("tutup");
      $('#perbaikan').addClass("buka");
      $('#perbaikan').removeClass("tutup");
      $('#tiket').addClass("buka");
      $('#tiket').removeClass("tutup");
      }
      if (filter=="perbaikan") {
      $('#permintaan').addClass("tutup");
      $('#permintaan').removeClass("buka");
      $('#perbaikan').addClass("buka");
      $('#perbaikan').removeClass("tutup");
      $('#tiket').addClass("tutup");
      $('#tiket').removeClass("buka");
      }
      if (filter=="permintaan") {
      $('#permintaan').addClass("buka");
      $('#permintaan').removeClass("tutup");
      $('#perbaikan').addClass("tutup");
      $('#perbaikan').removeClass("buka");
      $('#tiket').addClass("tutup");
      $('#tiket').removeClass("buka");
      }
      if (filter=="tiket") {
      $('#permintaan').addClass("tutup");
      $('#permintaan').removeClass("buka");
      $('#perbaikan').addClass("tutup");
      $('#perbaikan').removeClass("buka");
      $('#tiket').addClass("buka");
      $('#tiket').removeClass("tutup");
      }
      });

      $('#talak-x').click(function(){
      $(this).attr('id','talak_tutup');
      $('#even-x').addClass('buka');
      $('#even-x').removeClass('tutup');
      });
      $('#talak-xx').click(function(){
      $(this).attr('id','talak_tutup');
      $('#even-xx').addClass('buka');
      $('#even-xx').removeClass('tutup');
      });
      });
    </script>
</body>
</html>
