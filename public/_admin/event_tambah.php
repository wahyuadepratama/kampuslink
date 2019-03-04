<?php include "header.php"; ?>
          <!--------------------
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="event.php">Event</a>
            </li>
            <li class="breadcrumb-item">
              <span>Buat Event</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Buat Event
                    </h6>
                    <div class="element-content">
                      <div class="element-box">
                        <form id="formValidate">
                          <div class="form-desc">
                            Semua form yang bertanda  <code class="highlighter-rouge">*</code> wajib di isi, setelah mengisi form ini event kamu akan kami proses secepatnya. <a href="#" target="_blank">Baca ketentuan pembuatan event</a>
                          </div>
                          <fieldset class="form-group">
                            <div class="form-group">
                              <label for=""> Judul <code class="highlighter-rouge">*</code> </label><input class="form-control" data-error="Judul harus diisi" placeholder="Judul" required="required" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> Kategori <code class="highlighter-rouge">*</code></label>
                              <select class="form-control select2" data-error="Kategori harus diisi" required="required" multiple="true">
                                <option>
                                  E-Sport
                                </option>
                                <option>
                                  PUBG
                                </option>
                                <option>
                                  Mobile Legend
                                </option>
                                <option>
                                  Seminar
                                </option>
                                <option>
                                  Teknologi
                                </option>
                              </select>
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> Jadwal <code class="highlighter-rouge">*</code> </label><input class="single-daterange form-control" placeholder="Date of birth" data-error="Jadwal mulai harus diisi" required="required" type="text" value="">
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for=""> Jam Mulai <code class="highlighter-rouge">*</code></label><input class="form-control" data-error="Jam mulai harus diisi" placeholder="First Name" required="required" type="time">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="">Jam Berakhir <code class="highlighter-rouge">*</code></label><input class="form-control" data-error="Jam berakhir harus diisi" placeholder="Last Name" required="required" type="time">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label> Lokasi <code class="highlighter-rouge">*</code></label><textarea class="form-control" data-error="Lokasi harus diisi" required="required" rows="3" placeholder="Jl. Sudirman No.11, Koto Baru, Payakumbuh Utara, Kota Payakumbuh"></textarea>
                            </div>
                            <div class="form-group">
                              <label for=""> Jumlah Tiket </label><input class="form-control" placeholder="100" type="number" id="tiket">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> Harga per Tiket </label><input class="form-control" placeholder="5000" type="number" id="tiket_harga">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> Nomor WhatsApp </label><input class="form-control" placeholder="08*********" type="number">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> ID Line </label><input class="form-control"  placeholder="id line" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> Situs Web </label><input class="form-control" placeholder="www.situs.com" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Gambar (LebarxPanjang = 3x4) <code class="highlighter-rouge">*</code></label>
                              <input type="file" class="form-control-file" data-error="Gambar harus diisi" id="exampleFormControlFile1" required="required">
                            </div>
                            <div class="form-group">
                              <label> Deskripsi <code class="highlighter-rouge">*</code></label><textarea cols="80" id="ckeditor1" data-error="Deskripsi harus diisi" required="required" name="ckeditor1" rows="10"></textarea>
                            </div>
                          </fieldset>
                          <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox" required="required">Saya setuju dengan semua syarat & ketentuan kampuslink</label>
                          </div>
                          <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--------------------
            START - Sidebar
            -------------------->
            <div class="content-panel">
              <div class="content-panel-close">
                <i class="os-icon os-icon-close"></i>
              </div>
              <div class="element-wrapper">
                <h6 class="element-header">
                  Pintasan
                </h6>
                <div class="element-box-tp">
                  <div class="el-buttons-list full-width">
                    <a class="btn btn-white btn-sm" href="event_tambah.php"><i class="os-icon os-icon-delivery-box-2"></i><span>Buat Event Baru</span></a>
                  </div>
                </div>
              </div>
              <!--------------------
              START - Team Members
              -------------------->
              <div class="element-wrapper">
                <h6 class="element-header">
                  Pengurus
                </h6>
                <div class="element-box-tp">
                  <div class="input-search-w">
                    <input class="form-control rounded bright" placeholder="Cari Pengurus..." type="search">
                  </div>
                  <div class="users-list-w">
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar1.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          Nama Lengkap
                        </h6>
                        <div class="user-role">
                          Sistem Informasi
                        </div>
                      </div>
                      <a class="user-action" href="#" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon">
                        <div class="os-icon os-icon-email-forward"></div>
                      </a>
                    </div>
                    <div class="user-w with-status status-red">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar3.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          Nama Lengkap
                        </h6>
                        <div class="user-role">
                          Sistem Komputer
                        </div>
                      </div>
                      <a class="user-action" href="#" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon">
                        <div class="os-icon os-icon-email-forward"></div>
                      </a>
                    </div>
                    <div class="user-w with-status">
                      Belum Ada Pengurus
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Team Members
              -------------------->
            </div>
            <!--------------------
            END - Sidebar
            -------------------->
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bower_components/moment/moment.js"></script>
    <script src="bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="bower_components/dropzone/dist/dropzone.js"></script>
    <script src="bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.min.js"></script>
    <script src="bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="bower_components/bootstrap/js/dist/util.js"></script>
    <script src="bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="bower_components/bootstrap/js/dist/button.js"></script>
    <script src="bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="js/demo_customizer.js?version=4.4.0"></script>
    <script src="js/main.js?version=4.4.0"></script>
    <script>
      // $(document).ready(function(){
      //   $('#tiket').keyup(function(){
      //     if($(this).val()==""){
      //       $('#tiket_harga').attr("data-error","harga harus diisi")
      //     }else{
      //       $('#tiket_harga').removeProp("data-error","harga harus diisi");
      //       $('#tiket_harga').removeProp("required","required");
      //     }
      //   });
      // });
    </script>
  </body>
</html>