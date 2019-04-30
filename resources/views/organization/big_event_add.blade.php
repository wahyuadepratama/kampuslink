@include('partial/_header_organization')
          <!--
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ url('organization/'. $organization->instagram .'/event') }}">Event</a>
            </li>
            <li class="breadcrumb-item">
              <span>Buat Big Event</span>
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
                      Buat Big Event
                    </h6>
                    <div class="element-content">
                      @if ( count( $errors ) > 0 )
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                          {{ $error }}
                        </div>
                        @endforeach
                      @endif
                      @if (\Session::has('message'))
                          <div class="alert alert-success">
                              {!! \Session::get('message') !!}
                          </div>
                      @endif
                      <div class="element-box">
                        <form id="formValidate" method="post" action="{{ url('organization/'. $organization->instagram .'/event/add-big-event/store') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="form-desc">
                            Semua form yang bertanda  <code class="highlighter-rouge">*</code> wajib di isi, setelah mengisi form ini event kamu akan kami proses secepatnya.
                            <br><a href="#" target="_blank">Baca ketentuan pembuatan event</a>
                          </div>
                          <fieldset class="form-group">
                            <div class="form-group">
                              <label for=""> Nama <code class="highlighter-rouge">*</code> </label><input class="form-control" data-error="Judul harus diisi" placeholder="Nama Big Event" required="required" type="text" name="name" value="{{ old('name') }}">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for=""> Jadwal Mulai <code class="highlighter-rouge">*</code> </label><input class="single-daterange form-control" placeholder="Date of birth" data-error="Jadwal mulai harus diisi" required="required" type="text" value="{{ old('start_date') }}" name="start_date">
                            </div>
                            <div class="form-group">
                              <label for=""> Jadwal Berakhir <code class="highlighter-rouge">*</code> </label><input class="single-daterange form-control" placeholder="Date of birth" data-error="Jadwal berakhir harus diisi" required="required" type="text" value="{{ old('end_date') }}" name="end_date">
                            </div>
                            <div class="form-group">
                              <label for=""> Situs Web </label><input class="form-control" placeholder="www.situs.com" type="text" name="web_link" value="{{ old('web_link') }}">
                              <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Gambar Ukuran A4 <code class="highlighter-rouge">*</code></label>
                              <input name="photo" type="file" class="form-control-file" data-error="Gambar harus diisi" id="exampleFormControlFile1" required="required">
                            </div>
                            <div class="form-group">
                              <label> Deskripsi <code class="highlighter-rouge">*</code></label><textarea cols="80" id="ckeditor1" data-error="Deskripsi harus diisi" required="required" name="description" rows="10">{{ old('description') }}</textarea>
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
