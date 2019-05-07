@include('partial/_guest_header')
<!--================Home Banner Area =================-->
<section class="new_banner_area">
  <div class="banner-img bg-overlay-39">
    <div class="container">
      <h1 style="margin-top:3%">Profil</h1>
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Profil</li>
      </ul>
    </div>
    <div class="box-position" style="background-image: url(client/img/banner/banner-bg.jpg);"></div>
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
          <button class="btn-login" id="edit">Email&Password</button>
        </div>
        <!-- =======FORM PROFIL======= -->
        <div class="login_form_inner reg_form" id="form-profil">
          <h3>Edit Profil</h3>
          <form class="row login_form" action="{{ url('update-profile-user') }}" method="post" enctype="multipart/form-data">
            <div class="col-md-5"></div>
            <div class="col-md-2">
              <div class="card-flex">
                <dd> <a href="#edit"><img class="hoverColor" id="openAvatarUpload" src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}"></a> </dd>
                <input name="avatar" type="file" id="avatarUpload" style="display:none"/>
                <script type="text/javascript"> $('#openAvatarUpload').click(function(){ $('#avatarUpload').trigger('click'); }); </script>
              </div>
            </div>
            <div class="col-md-5"></div>
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
              <select class="form-control" name="campus" id="campus">

                <option value="{{ Auth::user()->programStudy->faculty->campus->id }}">{{ Auth::user()->programStudy->faculty->campus->name }}</option>

                @php $campus = \App\Models\Campus::all(); @endphp
                @foreach($campus as $keyCampus)
                <option value="{{ $keyCampus->id }}">{{ $keyCampus->name }}</option>
                @endforeach

              </select>
              @if($message = Session::get('campus'))
                <span class="help-block">
                    <small><strong style="color: red">{{ $message }}</strong></small>
                </span>
              @endif
            </div>
            <div class="col-md-12 form-group">
              <select class="form-control" name="faculty" id="faculty">

                <option value="{{ Auth::user()->programStudy->faculty->id }}">{{ Auth::user()->programStudy->faculty->name }}</option>

              </select>
              @if($message = Session::get('faculty'))
                <span class="help-block">
                    <small><strong style="color: red">{{ $message }}</strong></small>
                </span>
              @endif
            </div>
            <div class="col-md-12 form-group">
              <select class="form-control" name="program_study" id="program_study">

                <option value="{{ Auth::user()->programStudy->id }}">{{ Auth::user()->programStudy->name }}</option>

              </select>
              @if ($errors->has('program_study'))
                  <span class="help-block">
                      <small><strong style="color: red">{{ $errors->first('program_study') }}</strong></small>
                  </span>
              @endif
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
            <button class="btn-login" id="detail">Email&Password</button>
          </div>
          <div class="card-profil" id="detail-profil">
            <h6 class="card-text-bold">Profil</h6>
            <dl class="card-flex">
              <dt>Nama </dt>
              <dd>{{ Auth::user()->fullname }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Hp</dt>
              @if(!isset(Auth::user()->phone))
                <dd>-</dd>
              @else
                <dd>{{ Auth::user()->phone }}</dd>
              @endif
            </dl>
            <dl class="card-flex">
              <dt>Tanggal Lahir</dt>
              @if(!isset(Auth::user()->date_birth))
                <dd>-</dd>
              @else
                <dd>{{ \Carbon\Carbon::parse(Auth::user()->date_birth)->format('d F Y') }}</dd>
              @endif
            </dl>
            <dl class="card-flex">
              <dt>Jenis Kelamin</dt>
              @if(Auth::user()->gender == "man")
              <dd>Laki-laki</dd>
              @elseif(Auth::user()->gender == "woman")
              <dd>Perempuan</dd>
              @else
              <dd>-</dd>
              @endif
            </dl>
            <dl class="card-flex">
              <dt>Avatar</dt>
              <dd><img src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}"></dd>
            </dl>
            <dl class="card-flex">
              <dt>Status</dt>
              @if(Auth::user()->status == 0)
              <dd><button type="button" class="btn btn-sm btn-danger">Belum Diverifikasi</button></dd>
              @else
              <dd><button type="button" class="btn btn-sm btn-success">Sudah Diverifikasi</button></dd>
              @endif
            </dl>
            <dl class="card-flex">
              <dt> </dt>
              <dd> <small> <strong>*Lengkapi data profil agar akun kamu dapat kami verifikasi!</strong> </small> </dd>
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
              <dt>Program Studi</dt>
              <dd>{{ Auth::user()->programStudy->name }}</dd>
            </dl>
          </div>

          <div class="card-profil" id="detail-login">
            <h6 class="card-text-bold">Akun Login</h6>
            <dl class="card-flex">
              <dt>Email</dt>
              <dd>{{ Auth::user()->email }}</dd>
            </dl>
            <dl class="card-flex">
              <dt>Password</dt>
              <dd>****************</dd>
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
@include('partial/_guest_footer')
<script type="text/javascript">

  $('#campus').on('change', function(){
    $.ajax({
      url: '/get-faculty/' + $('#campus').val(),
      data: "",
      dataType: 'json',
      success: function(rows)
      {
        var campus = [];
        var campusVal = [];
        for(var i in rows){
          var row = rows[i];
          var name = row.name;
          var value = row.id;

          campus.push(name);
          campusVal.push(value);
        }
        // console.log(campus);
        $('#faculty').html('');
        $('#program_study').html('');
        if(campus.length == 0){
          $('#faculty').append('<option value="0">Choose Another Campus</option>');
          $('#program_study').append('<option value="0">Choose Another Faculty</option>');
        }else{
          $('#faculty').append('<option value="0">Select Faculty</option>');
          $('#program_study').append('<option value="0">Select Program Study</option>');
          for (i = 0; i < campus.length; i++) {
            $('#faculty').append('<option value="'+ campusVal[i] +'">' + campus[i] + '</option>');
          }
        }
      }
    });

  });

  $('#faculty').on('change', function(){
    $.ajax({
      url: '/get-program-study/' + $('#faculty').val(),
      data: "",
      dataType: 'json',
      success: function(rows)
      {
        var faculty = [];
        var facultyVal = [];
        for(var i in rows){
          var row = rows[i];
          var name = row.name;
          var value = row.id;

          faculty.push(name);
          facultyVal.push(value);
        }
        // console.log(campus);
        $('#program_study').html('');
        if(faculty.length == 0){
          $('#program_study').append('<option value="0">Choose Another Faculty</option>');
        }else{
          $('#program_study').append('<option value="0">Select Program Study</option>');
          for (i = 0; i < faculty.length; i++) {
            $('#program_study').append('<option value="'+ facultyVal[i] +'">' + faculty[i] + '</option>');
          }
        }
      }
    });

  });

</script>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
@include('partial/_user_script_footer')
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>
