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
          <button class="btn-profil">Profil</button>
          <button class="btn-kampus">Kampus</button>
          <button class="btn-login">Login</button>
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
      <div class="col-lg-6 profil-view">
        <div class="login_form_inner profil">
          <table width="100%">
            <tr>
              <td align="left"> <h5><strong>Akun Profil</strong></h5> </td>
              <td></td>
            </tr>
            <tr>
              <td align="left">Nama</td>
              <td align="left">{{ Auth::user()->name }}</td>
            </tr>
            <tr>
              <td align="left">Hp</td>
              <td align="left">{{ Auth::user()->phone }}</td>
            </tr>
            <tr>
              <td align="left">Tanggal Lahir</td>
              <td align="left">{{ \Carbon\Carbon::parse(Auth::user()->date_birth)->format('d F Y') }}</td>
            </tr>
            <tr>
              <td align="left">Jenis Kelamin</td>
              @if(Auth::user()->gender == "man")
              <td align="left">Laki-laki</td>
              @else
              <td align="left">Perempuan</td>
              @endif
            </tr>
            <tr>
              <td align="left"></td>
              <td align="left"></td>
            </tr>
            <tr>
              <td align="left"></td>
              <td align="left"></td>
            </tr>
            <tr>
              <td align="left"> <h5><strong>Akun Kampus</strong></h5> </td>
              <td></td>
            </tr>
            <tr>
              <td align="left">Nomor BP/NIM</td>
              <td align="left">{{ Auth::user()->nim }}</td>
            </tr>
            <tr>
              <td align="left">Kampus</td>
              <td align="left">{{ Auth::user()->programStudy->faculty->campus->name }}</td>
            </tr>
            <tr>
              <td align="left">Fakultas</td>
              <td align="left">{{ Auth::user()->programStudy->faculty->name }}</td>
            </tr>
            <tr>
              <td align="left">Jurusan</td>
              <td align="left">{{ Auth::user()->programStudy->name }}</td>
            </tr>
            <tr>
              <td align="left">Status</td>
              @if(Auth::user()->status == 0)
              <td align="left"> <button type="button" class="btn btn-sm btn-danger">Belum Diverifikasi</button> </td>
              @else
              <td align="left"> <button type="button" class="btn btn-sm btn-success">Sudah Diverifikasi</button></td>
              @endif
            </tr>
            <tr>
              <td align="left"></td>
              <td align="left"></td>
            </tr>
            <tr>
              <td align="left"></td>
              <td align="left"></td>
            </tr>
            <tr>
              <td align="left"> <h5><strong>Akun Login</strong></h5> </td>
              <td></td>
            </tr>
            <tr>
              <td align="left">Email</td>
              <td align="left">email@email.com</td>
            </tr>
            <tr>
              <td align="left">Password</td>
              <td align="left">********</td>
            </tr>
          </table>
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
<style>*{box-sizing:border-box}.autocomplete{position:relative;display:inline-block}input{border:1px solid transparent;background-color:#f1f1f1;padding:10px}.autocomplete-items{position:absolute;border:1px solid #d4d4d4;border-bottom:none;border-top:none;z-index:99;top:100%;left:4%;right:4%;text-align:left}.autocomplete-items div{padding:10px;cursor:pointer;background-color:#fff;border-bottom:1px solid #d4d4d4}.autocomplete-items div:hover{background-color:#e9e9e9}.autocomplete-active{background-color:#1e90ff!important;color:#fff}
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
