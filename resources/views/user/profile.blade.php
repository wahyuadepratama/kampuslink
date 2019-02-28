@include('partial/_header')
<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content text-center">
        <h2>Profil</h2>
        <div class="page_link">
          <a href="index.html">Home</a>
          <a href="login.html">Profil</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Profil Box Area =================-->
<section class="profil_box_area p_120">
  <div class="container">

    @if($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
    @endif

    @if($message = Session::get('error'))
      <div class="alert alert-danger">
        {{$message}}
      </div>
    @endif

    @if ( count( $errors ) > 0 )
      @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
      @endforeach
    @endif

    <div class="row" style="position: relative;overflow: hidden;padding-bottom: 0.4em;">
      <div class="col-lg-6 profil-form">
        <div class="pilihan">
          <!-- <h4>Atur</h4> -->
          <button class="btn-profil" id="edit">Profil</button>
          <button class="btn-kampus" id="edit">Kampus</button>
          <button class="btn-login" id="edit">Login</button>
        </div>
        <!-- =======FORM PROFIL======= -->
        <div class="login_form_inner reg_form" id="form-profil">
          <h3>Edit Profil</h3>
          <form class="row login_form" action="{{ url('update-profile-user') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-12 form-group">
              <input name="name" type="text" class="form-control" placeholder="Nama" value="{{ Auth::user()->fullname }}" required>
            </div>
            <div class="col-md-12 form-group">
              <input name="phone" type="text" class="form-control" placeholder="Nomor HP" value="{{ Auth::user()->phone }}" required>
            </div>
            <div class="col-md-12 form-group">
              <input name="date_birth" type="date" class="form-control" placeholder="TTL" value="{{ Auth::user()->date_birth }}">
            </div>
            <div class="col-md-12 i-radio">
              <div class="form-check">
                <input name="gender" class="form-check-input" type="radio" value="man" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input name="gender" class="form-check-input" type="radio" value="woman">
                <label class="form-check-label" for="exampleRadios2">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="btn submit_btn">Simpan</button>
            </div>
          </form>
        </div>
        <!-- =======FORM KAMPUS======= -->
        <div class="login_form_inner reg_form" id="form-kampus">
          <h3>Edit Kampus</h3>
          <form class="row login_form" action="{{ url('update-kampus-user') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" value="{{ Auth::user()->nim }}" disabled>
            </div>
            <div class="col-md-12 form-group">
              <input id="myCampus" name="campus" type="text" class="form-control" placeholder="Kampus" value="{{ Auth::user()->programStudy->faculty->campus->name }}">
            </div>
            <div class="col-md-12 form-group">
              <input id="myFaculty" name="faculty" type="text" class="form-control" placeholder="Fakultas" value="{{ Auth::user()->programStudy->faculty->name }}">
            </div>
            <div class="col-md-12 form-group">
              <input id="myProgramStudy" name="program_study" type="text" class="form-control" placeholder="Jurusan" value="{{ Auth::user()->programStudy->name }}">
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="btn submit_btn">Simpan</button>
            </div>
          </form>
        </div>
        <!-- =======FORM LOGIN======= -->
        <div class="login_form_inner reg_form" id="form-login">
          <h3>Edit Akun Login</h3>
          <form class="row login_form" action="{{ url('update-login-user') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-12 form-group">
              <input type="email" class="form-control" id="email" placeholder="email@domain.com" value="{{ Auth::user()->email }}" disabled>
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" required>
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" id="pass" name="password_confirmation" placeholder="Konfirmasi password" required>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="btn submit_btn">Update</button>
            </div>
          </form>
        </div>
      </div>
      <style type="text/css">
        .card-profil{
          padding: 1.875rem;
          position: relative;
          font-size: .9375rem;
        }
        .card-profil h6{
          font-size: 1rem;
          margin: 0 0 .5rem;
          color: #354052;
          font-weight: 600;
          text-align: left;
          letter-spacing: 1px;
        }
        .card-flex{
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          border-bottom: 1px solid #e6eaee;
          padding-top: .9375rem;
          padding-bottom: .9375rem;
          margin: 0;
        }
        .card-flex dt{
          width: 25%;
          color: #354052;
          text-align: left;
          font-weight: 300;
          margin: 0;
        }
        .card-flex dd{
          margin: 0;
        }
        .card-flex dd img{
          width: 50px;
          border-radius: 50%;
        }
      </style>
      <div class="col-lg-6 profil-view">
        <div class="login_form_inner profil">
          <div class="pilihan">
            <!-- <h4>Atur</h4> -->
            <button class="btn-profil" id="detail">Profil</button>
            <button class="btn-kampus" id="detail">Kampus</button>
            <button class="btn-login" id="detail">Login</button>
          </div>
          <div class="card-profil" id="detail-profil">
            <h6 class="card-text-bold">Profil</h6>
            <dl class="card-flex">
              <dt>Nama </dt>
              <dd>{{ Auth::user()->fullname }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Hp</dt>
              <dd>{{ Auth::user()->phone }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Tanggal Lahir</dt>
              <dd>{{ \Carbon\Carbon::parse(Auth::user()->date_birth)->format('d F Y') }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Jenis Kelamin</dt>
              @if(Auth::user()->gender == "man")
              <dd>Laki-laki</dd>
              @else
              <dd>Perempuan</dd>
              @endif
            </dl>
            <dl class="card-flex">
              <dt>Avatar</dt>
              <dd><img src="{{ asset('client/img/team/alfikri.jpg') }}"></dd>
            </dl>
            <dl class="card-flex">
              <dt>Kota Asal</dt>
              <dd>Koto Baru Balai Janggo, Payakumbuh Utara, Payakumbuh</dd>
            </dl>
          </div>

          <div class="card-profil" id="detail-kampus">
            <h6 class="card-text-bold">Akun Kampus</h6>
            <dl class="card-flex">
              <dt>Nomor BP/NIM</dt>
              <dd>{{ Auth::user()->nim }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Kampus</dt>
              <dd>{{ Auth::user()->programStudy->faculty->campus->name }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Fakultas</dt>
              <dd>{{ Auth::user()->programStudy->faculty->name }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Jurusan</dt>
              @if(Auth::user()->status == 0)
              <dd><button type="button" class="btn btn-sm btn-danger">Belum Diverifikasi</button></dd>
              @else
              <dd><button type="button" class="btn btn-sm btn-success">Sudah Diverifikasi</button></dd>
              @endif
            </dl>
            <dl class="card-flex">
              <dt>Status</dt>
              <dd>{{ Auth::user()->programStudy->faculty->name }}</dd>
            </dl>
          </div>

          <div class="card-profil" id="detail-login">
            <h6 class="card-text-bold">Akun Login</h6>
            <dl class="card-flex">
              <dt>Email</dt>
              <dd>email@email.com</dd>
            </dl>
            <dl class="card-flex">
              <dt>Password</dt>
              <dd>********</dd>
            </dl>
          </div>

        </div>
      </div>

      <div class="col-lg-6 profil-atur">
        <div class="img-edit">
          <img class="img-fluid" src="{{ asset('client/img/login.jpg') }}" alt="">
          <div class="edit">
            <button class="editx">Kembali</button>
            <button class="btn-edit">Edit Akun</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!--================End Profil Box Area =================-->

<!--================CSS Cuztome Area =================-->
<style>*{box-sizing:border-box}.autocomplete{position:relative;display:inline-block}input{border:1px solid transparent;background-color:#f1f1f1;padding:10px}.autocomplete-items{position:absolute;border:1px solid #d4d4d4;border-bottom:none;border-top:none;z-index:99;top:100%;left:4%;right:4%;text-align:left}.autocomplete-items div{padding:10px;cursor:pointer;background-color:#fff;border-bottom:1px solid #d4d4d4}.autocomplete-items div:hover{background-color:#019fe8}.autocomplete-active{background-color:#1e90ff!important;color:#fff}
</style>
<!--================End of CSS Cuztome Area =================-->


<!--================ start footer Area  =================-->
@include('partial/_footer')
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
@include('partial/_script_footer_user')
@include('partial/_js_edit_profile')
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>
