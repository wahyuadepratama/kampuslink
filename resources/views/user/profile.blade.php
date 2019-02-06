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
          <form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" placeholder="Nama" value="{{ Auth::user()->fullname }}">
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" placeholder="Nomor HP" value="{{ Auth::user()->phone }}">
            </div>
            <div class="col-md-12 form-group">
              <input type="date" class="form-control" placeholder="TTL" value="{{ Auth::user()->date_birth }}">
            </div>
            <div class="col-md-12 i-radio">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
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
          <form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" placeholder="Nomor BP/NIM" value="{{ Auth::user()->nim }}">
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" placeholder="Kampus" value="{{ Auth::user()->programStudy->faculty->campus->name }}">
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" placeholder="Fakultas" value="{{ Auth::user()->programStudy->faculty->name }}">
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" placeholder="Jurusan" value="{{ Auth::user()->programStudy->name }}">
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="btn submit_btn">Simpan</button>
            </div>
          </form>
        </div>
        <!-- =======FORM LOGIN======= -->
        <div class="login_form_inner reg_form" id="form-login">
          <h3>Edit Akun Login</h3>
          <form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="col-md-12 form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="email@domain.com" value="{{ Auth::user()->email }}" disabled>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="password" name="password" placeholder="Password Baru">
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Konfirmasi password">
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
              <th align="left">Akun Profil</th>
              <th></th>
            </tr>
            <tr>
              <td align="left">Nama</td>
              <td align="left">Nama Lengkap</td>
            </tr>
            <tr>
              <td align="left">Hp</td>
              <td align="left">081263000000</td>
            </tr>
            <tr>
              <td align="left">TTL</td>
              <td align="left">1 Januari 2019</td>
            </tr>
            <tr>
              <td align="left">Jenis Kelamin</td>
              <td align="left">Laki-laki</td>
            </tr>
            <tr>
              <th align="left">Akun Kampus</th>
              <th></th>
            </tr>
            <tr>
              <td align="left">Nomor BP/NIM</td>
              <td align="left">19191919</td>
            </tr>
            <tr>
              <td align="left">Kampus</td>
              <td align="left">Universitas Andalas</td>
            </tr>
            <tr>
              <td align="left">Fakultas</td>
              <td align="left">Teknik</td>
            </tr>
            <tr>
              <td align="left">Jurusan</td>
              <td align="left">Teknik Mesin</td>
            </tr>
            <tr>
              <td align="left">Status</td>
              <td align="left">Belum Diverivikasi</td>
            </tr>
            <tr>
              <th align="left">Akun Login</th>
              <th></th>
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

<!--================ start footer Area  =================-->
@include('partial/_footer')
<!--================ End footer Area  =================-->




<!-- Optional JavaScript -->
@include('partial/_script_footer_user')
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>
