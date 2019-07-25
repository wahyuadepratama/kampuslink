<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta content="ie=edge" http-equiv="x-ua-compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
  <link href="{{URL::asset('_admin/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('_admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
  <link href="{{URL::asset('_admin/bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
  <link href="{{URL::asset('_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('_admin/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('_admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('_admin/bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{URL::asset('_admin/css/main.css?version=4.4.0')}}" rel="stylesheet">
  <style type="text/css">
    body{
      padding: 0;
      margin: 0;
      background: #f2f2f2;
    }
    .tengah{
      padding-top: 5%;
      display: flex;
      justify-content: center;
    }
  </style>
</head>
<body>

      <div aria-hidden="true" class="onboarding-modal modal fade animated show-on-load" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered" role="document">
          <div class="modal-content text-center">
            {{-- <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Lanjutkan</span><span class="os-icon os-icon-close"></span></button> --}}
              <div class="onboarding-slide">
                <div class="onboarding-media">
                  <img alt="" src="{!!asset('bigicon1.png')!!}" width="200px">
                </div>
                <div class="onboarding-content with-gradient">
                  <h4 class="onboarding-title">
                    Tentang Kuesioner Ini!
                  </h4>
                  <div class="onboarding-text">
                    Kuesioner ini berisi beberapa pertanyaan mengenai keinginan kamu sebagai mahasiswa dikampus. Dalam  kuesioner ini, kamu akan menemukan tiga kelompok pertanyaan; kelompok pertanyaan pertama meminta kamu untuk pengenalan diri, pertanyaan kedua meminta kamu untuk menyampaikan keinginan setelah berada dikampus ini,  dan pertanyaan ketiga meminta kamu untuk menyampaikan rencana kamu di kemudian hari. Kami sedang mengumpulkan data mengenai keinginan kamu untuk menggapai rencana sebagai mahasiswa kedepannya.
                  </div>
                  <button class="btn btn-primary btn-block" aria-label="Close" data-dismiss="modal" type="button">Lanjutkan</button>
                </div>
              </div>
          </div>
        </div>
      </div>

<section class="tengah">
<div class="element-wrapper">
  <div class="element-box">
    <form action="{{ url('kuisioner_submit') }}" method="POST">
      {{ csrf_field() }}
      <div class="steps-w">
        <div class="step-triggers">
          <a class="step-trigger active" href="#stepContent1">Pengenalan Diri</a>
          <a class="step-trigger" href="#stepContent2">Keinginan</a>
          <a class="step-trigger" href="#stepContent3">Rencana</a>
        </div>
        <div class="step-contents">
          <div class="step-content active" id="stepContent1">
            <div class="form-group">
              <label for=""> Nama Lengkap</label><input class="form-control" placeholder="Nama Lengkap" type="text" name="nama">
            </div>
            <div class="form-group">
              <label for=""> Jenis Kelamin</label>
              <select class="form-control" name="jk">
                <option value="">
                  == Pilih ==
                </option>
                <option>
                  Laki-laki
                </option>
                <option>
                  Perempuan
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for=""> Asal Kampus</label><input class="form-control" placeholder="Asal Kampus" type="text" name="kampus">
            </div>
            <div class="form-group">
              <label for="">No BP/NIM</label><input class="form-control" placeholder="No BP/NIM" type="text" name="nim">
            </div>
            <div class="form-group">
              <label for=""> Email</label><input class="form-control" placeholder="Email" type="email" name="email">
            </div>
            <div class="form-group">
              <label for=""> No What's App</label><input class="form-control" placeholder="08xxxxxx" type="number" name="wa">
            </div>
            <div class="form-group">
              <label for=""> Hobi</label><input class="form-control" placeholder="Hobi" type="text" name="hobi">
            </div>
            <div class="form-buttons-w text-right">
              <a class="btn btn-primary step-trigger-btn" href="#stepContent2"> Continue</a>
            </div>
          </div>

          <div class="step-content" id="stepContent2">
            <div class="form-group">
              <label for=""> 1.	Apakah acara yang kamu ingin ikuti di kampus?(urutan pertama adalah paling disukai)</label><br>
              <select class="form-control select2" multiple="true" style="min-width: 300px !important;" name="acara[]">
                <option value="game">
                  Game
                </option>
                <option value="seminar">
                  Seminar
                </option>
                <option value="seni">
                  Seni
                </option>
                <option value="menulis">
                  Menulis
                </option>
                <option value="olah raga">
                  Olah Raga
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for=""> 2.	Informasi seperti apakah yang ingin kamu dapatkan?(urutan pertama adalah paling disukai)</label><br>
              <select class="form-control select2" multiple="true" style="min-width: 300px !important;" name="info[]">
                <option value="berita kampus">
                  Berita kampus
                </option>
                <option value="beasiswa">
                  Beasiswa
                </option>
                <option value="info organisasi">
                  Info organisasi
                </option>
                <option value="info jurusan fakultas">
                  Info jurusan fakultas
                </option>
                <option value="info kelas">
                  Info kelas
                </option>
              </select>
            </div>
            <div class="form-group">
              <label> 3. Jika tidak ada keinginan diantara 2 point diatas, kenapa kamu tidak ingin mengikutinya?</label><textarea class="form-control" rows="3" name="bukan_ai"></textarea>
            </div>
            <div class="form-group">
              <label> 4. Hal apakah yang membuatmu tertarik dikampus saat ini? berikan pandapatmu!</label><textarea class="form-control" rows="3" name="tertarik"></textarea>
            </div>
            <div class="form-group">
              <label> 5. Apa yang kamu harapkan dari teman2 mu kedepan?</label><textarea class="form-control" rows="3" name="harap"></textarea>
            </div>
            <div class="form-buttons-w text-right">
              <a class="btn btn-primary step-trigger-btn" href="#stepContent3"> Continue</a>
            </div>
          </div>

          <div class="step-content" id="stepContent3">
            <div class="form-group">
              <label for=""> 1. Apakah kamu pilih kerja sampingan atau fokus saja kuliah? </label>
              <select class="form-control" id="kerjafokus" name="kf">
                <option value="">
                  == Pilih ==
                </option>
                <option value="kerja">
                  Kerja sampingan
                </option>
                <option value="fokus kuliah">
                  Fokus kuliah
                </option>
              </select>
            </div>
            <div class="form-group" style="display: none;" id="kerja">
              <label> Berikan contoh kerja sampingan yg diingin kan kalau bisa</label><textarea class="form-control" rows="3" name="kf2"></textarea>
            </div>
            <div class="form-group">
              <label for=""> 2.Apakah kamu berencana mendalami ilmu kuliah dan mencari pasion? </label>
              <select class="form-control" id="ilmu" name="passion">
                <option value="">
                  == Pilih ==
                </option>
                <option value="ya">
                  Ya
                </option>
                <option value="tidak">
                  Tidak
                </option>
              </select>
            </div>
            <div class="form-group" style="display: none;" id="ilmu2">
              <label> jika iya, jelaskan ilmu atau mencari passion sperti apa</label><textarea class="form-control" rows="3" name="passion2"></textarea>
            </div>
            <div class="form-buttons-w text-right">
              <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</section>
<script src="{{URL::asset('_admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/moment/moment.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/select2/dist/js/select2.full.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/dropzone/dist/dropzone.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/editable-table/mindmup-editabletable.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/tether/dist/js/tether.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/util.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/alert.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/button.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/carousel.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/collapse.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/dropdown.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/modal.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/tab.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/tooltip.js')}}"></script>
<script src="{{URL::asset('_admin/bower_components/bootstrap/js/dist/popover.js')}}"></script>
<script src="{{URL::asset('_admin/js/demo_customizer.js?version=4.4.0')}}"></script>
<script src="{{URL::asset('_admin/js/main.js?version=4.4.0')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#kerjafokus").change(function() {
		if($(this).val()=="kerja"){
			$("#kerja").css('display','block');
		}else{
			$("#kerja").css('display','none');
		}
	});
	$("#ilmu").change(function() {
		if($(this).val()=="ya"){
			$("#ilmu2").css('display','block');
		}else{
			$("#ilmu2").css('display','none');
		}
	});
});
</script>
</body>
</html>