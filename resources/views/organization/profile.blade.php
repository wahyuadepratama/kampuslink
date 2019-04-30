@include('partial/_header_organization')

          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <span>Profil</span>
            </li>
          </ul>

          <div class="content-box">
            <div class="element-wrapper">
              <div class="user-profile">
                <div class="up-head-w" style="background-image:url({{ asset('storage/cover/'. $organization->photo_cover)}})">
                  <div class="up-main-info">
                    <div class="user-avatar-w">
                      <div class="user-avatar">
                        <img alt="" src="{{ asset('client/img/icon/user.png')}}">
                      </div>
                    </div>
                    <h1 class="up-header">
                      {{ $organization->name }}
                    </h1>
                    <h5 class="up-sub-header">
                      {{ $organization->campus->name }}
                    </h5>
                  </div>
                  <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF"><path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path></g></svg>
                </div>
                <div class="up-controls">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="value-pair">
                        <div class="label">
                          Status:
                        </div>
                        @if(Auth::user()->isOnline(Auth::user()->id))
                        <div class="value badge badge-pill badge-success">
                          Online
                        </div>
                        @else
                        <div class="value badge badge-pill badge-danger">
                          Offline
                        </div>
                        @endif
                      </div>
                      <div class="value-pair">
                        <div class="label">
                          Bergabung sejak:
                        </div>
                        <div class="value">
                          {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('Y') }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="up-contents">
                  <div class="os-tabs-w">
                    <div class="os-tabs-controls">
                      <ul class="nav nav-tabs bigger">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#tab_overview">Profile</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#tab_sales">Edit Profil</a>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_overview">
                        <div class="timed-activities padded">
                          <p>
                            <?php echo $organization->description; ?>
                          </p>
                          <div class="row" style="margin-top: 2%">
                            <div class="col-md-3">
                              <button class="mr-2 mb-2 btn btn-success form-control" type="button" data-container="body" data-content="Line: {{ $organization->line }}" data-placement="top" data-toggle="popover">LINE</button>
                            </div>
                            <div class="col-md-3">
                              <button class="mr-2 mb-2 btn btn-info form-control" type="button" style="background-color: #3b5998;border-color:#3b5998;color:white" data-container="body" data-content="Facebook: {{ $organization->facebook }}" data-placement="top" data-toggle="popover">Facebook</button>
                            </div>
                            <div class="col-md-3">
                              <button class="mr-2 mb-2 btn btn-info form-control" type="button" style="background-image: linear-gradient(to right, rgb(76, 88, 206), #609, rgb(210, 81, 114), rgb(235, 120, 28), rgb(245, 211, 112));border-color:#fff;color:white" data-container="body" data-content="Instagram: {{ $organization->instagram }}" data-placement="bottom" data-toggle="popover">
                                Instagram</button>
                            </div>
                            <div class="col-md-3">
                              <button class="mr-2 mb-2 btn btn-info form-control" type="button" style="background-color: #5eca5e;border-color:#5eca5e;color:white" data-container="body" data-content="WhatsApp: {{ $organization->whatsapp }}" data-placement="bottom" data-toggle="popover">
                                WhatsApp</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_sales">
                        <div class="row">
                          <div class="col-sm-9">
                            <div class="element-wrapper">
                              <div class="element-box">
                                <form action="{{ url('organization/'. $organization->instagram .'/profile') }}" method="post" id="formValidate" enctype="multipart/form-data">
                                  @if ( count( $errors ) > 0 )
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                      {{ $error }}
                                    </div>
                                    @endforeach
                                  @endif
                                  @if($message = Session::get('success'))
                                    <div class="alert alert-success">
                                      {{$message}}
                                    </div>
                                  @endif
                                  <div class="element-info">
                                    <div class="element-info-with-icon">
                                      <div class="element-info-icon">
                                        <div class="os-icon os-icon-wallet-loaded"></div>
                                      </div>
                                      <div class="element-info-text">
                                        <div class="element-inner-desc">
                                          Lengkapi profilmu agar mereka semua tau info pribadi organisasi kamu. Semua form yang bertanda  <code class="highlighter-rouge">*</code> wajib di isi
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for=""> Nama <code class="highlighter-rouge">*</code></label>
                                    <input name="name" value="{{ $organization->name }}" class="form-control" data-error="Nama wajib diisi" placeholder="nama" required="required" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Nomor Telp/HP <code class="highlighter-rouge">*</code></label>
                                    <input name="phone" value="{{ $organization->phone }}" required="required" class="form-control" placeholder="08xxxxx" type="number">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input name="facebook" value="{{ $organization->facebook }}" class="form-control" placeholder="URL Facebook" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">ID Line</label>
                                    <input name="line" value="{{ $organization->line }}" class="form-control" placeholder="ID Line" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Nomor WA</label>
                                    <input name="whatsapp" value="{{ $organization->whatsapp }}" class="form-control" placeholder="08xxxxx" type="number">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label> Deskripsi <code class="highlighter-rouge">*</code></label>
                                    <textarea name="description" id="ckeditor1" required="required" class="form-control" rows="6">{{ $organization->description }}</textarea>
                                  </div>
                                  <div class="form-group">
                                    <label> Cover Foto</label>
                                    <input type="file" name="cover" class="form-control-file">
                                  </div>
                                  {{ csrf_field() }}
                                  <input class="btn btn-primary" type="submit"> </input>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_conversion"></div>
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
