@include('partial/_header_organization')
          <!--
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
          <!--
          END - Breadcrumbs
          -------------------->
          <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-10">
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Buat Event
                    </h6>
                    <div class="element-content">
                      @if (\Session::has('message'))
                          <div class="alert alert-success">
                              {!! \Session::get('message') !!}
                          </div>
                      @endif
                      <div class="element-box">
                        <form method="post" action="{{url('organization/event/add')}}" enctype="multipart/form-data" id="formValidate">
                          {{ csrf_field() }}
                          <div class="form-desc">
                            Semua form yang bertanda  <code class="highlighter-rouge">*</code> wajib di isi, setelah mengisi form ini event kamu akan kami proses secepatnya.
                            <br><a href="#" target="_blank">Baca ketentuan pembuatan event</a>
                          </div>
                          <fieldset class="form-group">
                            <div class="form-group">
                              <label for=""> Big Event </label>
                              <select class="form-control" name="event_id">
                                <option value="0">
                                  Tidak tergabung ke dalam Big Event apapun
                                </option>
                                @php $organization = \App\Models\UserOrganization::where('user_id', Auth::user()->id)->first(); @endphp
                                @php
                                  $bigEvent = \App\Models\Event::where('organization_id', $organization->organization->id )->get();
                                  foreach($bigEvent as $key){
                                    echo "
                                    <option value='". $key->id ."'>
                                      Sub Event dari ". $key->name ."
                                    </option>";
                                  }
                                @endphp
                              </select>
                            </div>
                            <div class="form-group">
                              <label for=""> Judul <code class="highlighter-rouge">*</code> </label><input value="{{  old('name') }}" name="name" class="form-control" data-error="Judul harus diisi" placeholder="Judul" required="required" type="text">
                              <div class="help-block form-text with-errors form-control-feedback">
                                @if (\Session::has('judul'))
                                  {!! \Session::get('judul') !!}
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label for=""> Kategori <code class="highlighter-rouge">*</code></label>
                              <select class="form-control select2" data-error="Kategori harus diisi" required="required" multiple="true" name="category[]">
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
                              <label for=""> Jadwal <code class="highlighter-rouge">*</code> </label><input value="{{  old('date') }}" name="date" class="single-daterange form-control" placeholder="Date of birth" data-error="Jadwal mulai harus diisi" required="required" type="text" value="">
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for=""> Jam Mulai <code class="highlighter-rouge">*</code></label><input value="{{  old('start_time') }}" name="start_time" class="form-control" data-error="Jam mulai harus diisi" placeholder="First Name" required="required" type="time">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="">Jam Berakhir <code class="highlighter-rouge">*</code></label><input value="{{  old('end_time') }}" name="end_time" class="form-control" data-error="Jam berakhir harus diisi" placeholder="Last Name" required="required" type="time">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label> Lokasi <code class="highlighter-rouge">*</code></label><textarea name="location" class="form-control" data-error="Lokasi harus diisi" required="required" rows="3" placeholder="Jl. Sudirman No.11, Koto Baru, Payakumbuh Utara, Kota Payakumbuh">{{  old('location') }}</textarea>
                            </div>
                            <div class="row" style="margin-top: 5%;margin-bottom: 5%">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <h6>Tiket Reguler</h6>
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                                <div class="form-group">
                                  <label for=""> Jumlah Tiket </label><input value="{{  old('reguler_total') }}" name="reguler_total" class="form-control" placeholder="100" type="number" id="tiket">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                                <div class="form-group">
                                  <label for=""> Harga per Tiket </label><input value="{{  old('reguler_price') }}" name="reguler_price" class="form-control" placeholder="5000" type="number" id="tiket_harga">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <h6>Tiket VIP</h6>
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                                <div class="form-group">
                                  <label for=""> Jumlah Tiket </label><input value="{{  old('vip_total') }}" name="vip_total" class="form-control" placeholder="100" type="number" id="tiket">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                                <div class="form-group">
                                  <label for=""> Harga per Tiket </label><input value="{{  old('vip_price') }}" name="vip_price" class="form-control" placeholder="5000" type="number" id="tiket_harga">
                                  <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                              </div>
                              <small style="margin: 2%"> <strong> Note: Jika event kamu hanya memiliki satu jenis tiket, cukup isi bagian reguler saja (kosongkan bagian VIP) </strong> </small>
                            </div>
                            <div class="form-group">
                              <label for=""> Nomor WhatsApp </label><input value="{{  old('whatsapp') }}" name="whatsapp" class="form-control" placeholder="08*********" type="number">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> ID Line </label><input value="{{  old('line') }}" value="{{  old('line') }}" name="line" class="form-control"  placeholder="id line" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> Situs Web </label><input value="{{  old('web_link') }}" name="web_link" class="form-control" placeholder="www.situs.com" type="text">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Gambar (Ukuran A4) <code class="highlighter-rouge">*</code></label>
                              <input value="{{  old('photo') }}" name="photo" type="file" class="form-control-file" data-error="Gambar harus diisi" id="exampleFormControlFile1" required="required">
                            </div>
                            <div class="form-group">
                              <label> Deskripsi <code class="highlighter-rouge">*</code></label><textarea name="description" cols="80" id="ckeditor1" data-error="Deskripsi harus diisi" required="required" name="ckeditor1" rows="10">{{  old('description') }} </textarea>
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
            <!--
            END - Sidebar
            -------------------->
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>

    @include('partial/_script_footer_admin')

  </body>
</html>
