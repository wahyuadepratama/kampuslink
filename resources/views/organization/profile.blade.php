@include('partial/_header_organization')

          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('organization') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <span>Profil</span>
            </li>
          </ul>

          <div class="content-box">
            <div class="element-wrapper">
              <div class="user-profile">
                <div class="up-head-w" style="background-image:url({{ asset('_admin/img/profile_bg1.jpg')}})">
                  <div class="up-main-info">
                    <div class="user-avatar-w">
                      <div class="user-avatar">
                        <img alt="" src="{{ asset('client/img/icon/user.png')}}">
                      </div>
                    </div>
                    <h1 class="up-header">
                      @php $organization = \App\Models\UserOrganization::where('user_id', Auth::user()->id)->first(); echo $organization->organization->name; @endphp
                    </h1>
                    <h5 class="up-sub-header">
                      @php $organization = \App\Models\UserOrganization::where('user_id', Auth::user()->id)->first(); echo $organization->organization->campus->name; @endphp
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
                          Bergabung sejak tahun:
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
                          <a class="nav-link" data-toggle="tab" href="#tab_sales">Edit Profil dan Password</a>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_overview">
                        <div class="timed-activities padded">
                          <p>
                            {{ $organization->organization->description }}
                          </p>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_sales">
                        <div class="row justify-content-sm-center">
                          <div class="col-sm-7">
                            <div class="element-wrapper">
                              <div class="element-box">
                                <form action="{{ url('organization/profile') }}" method="post" id="formValidate">
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
                                    <input name="name" value="{{ $organization->organization->name }}" class="form-control" data-error="Nama wajib diisi" placeholder="nama" required="required" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Nomor Telp/HP <code class="highlighter-rouge">*</code></label>
                                    <input name="phone" value="{{ $organization->organization->phone }}" required="required" class="form-control" placeholder="08xxxxx" type="number">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">URL Instagram</label>
                                    <input name="instagram" value="{{ $organization->organization->instagram }}" class="form-control" placeholder="URL Instagram" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input name="facebook" value="{{ $organization->organization->facebook }}" class="form-control" placeholder="URL Facebook" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">ID Line</label>
                                    <input name="line" value="{{ $organization->organization->line }}" class="form-control" placeholder="ID Line" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Nomor WA</label>
                                    <input name="whatsapp" value="{{ $organization->organization->whatsapp }}" class="form-control" placeholder="08xxxxx" type="number">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                  </div>
                                  <div class="form-group">
                                    <label> Deskripsi <code class="highlighter-rouge">*</code></label>
                                    <textarea name="description" required="required" class="form-control" rows="6">{{ $organization->organization->description }}</textarea>
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
