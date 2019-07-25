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
    .logo_k{
      margin:10px auto;
      width: 300px;
      height: 111px;
    }
  </style>
</head>
<body>

<section class="tengah">
<div class="element-wrapper">
  <div class="element-box">
    <div style="display: flex;justify-content: center;">
      <img src="{{asset('client/img/logo/logo.png')}}" class="logo_k" height="111" width="300">
    </div>
    <br>
    Terima Kasih {{ $nama }} telah mengisi kuesioner, semoga sukses kuliahnya dan lancar, amiiin :)
    <br>
    Jangan lupa follow instagram kami yaa untuk update dan launching aplikasi khusus kampus ini. <a href='https://www.instagram.com/kampuslink/'>Pergi ke Instagram Kampus Link</a>
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
</body>
</html>