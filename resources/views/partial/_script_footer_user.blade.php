<script src="{{ asset('client/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('client/js/popper.js') }}"></script>
<script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/stellar.js') }}"></script>
<script src="{{ asset('client/vendors/lightbox/simpleLightbox.min.js') }}"></script>
<script src="{{ asset('client/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('client/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('client/vendors/isotope/isotope-min.js') }}"></script>
<script src="{{ asset('client/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('client/js/mail-script.js') }}"></script>
<script src="{{ asset('client/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('client/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('client/vendors/counter-up/jquery.counterup.js') }}"></script>
<script src="{{ asset('client/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('client/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="{{ asset('client/js/theme.js') }}"></script>
<script>
$(document).ready(function(){
$('button.btn-edit').click(function(){
  $('.profil-atur').addClass('profil-atur2');
  $(this).css('display','none');
  $('button.editx').css('display','block');
});
$('button.editx').click(function(){
  $('.profil-atur').removeClass('profil-atur2');
  $(this).css('display','none');
  $('button.btn-edit').css('display','block');
});
// v-tampil
// v-tutup
$('button.btn-profil').click(function(){
  $('#form-kampus').addClass('v-tutup');
  $('#form-login').addClass('v-tutup');
  $('#form-profil').addClass('v-tampil');

  $('#form-kampus').removeClass('v-tampil');
  $('#form-login').removeClass('v-tampil');
  $('#form-profil').removeClass('v-tutup');
});
$('button.btn-kampus').click(function(){
  $('#form-kampus').addClass('v-tampil');
  $('#form-login').addClass('v-tutup');
  $('#form-profil').addClass('v-tutup');

  $('#form-kampus').removeClass('v-tutup');
  $('#form-login').removeClass('v-tampil');
  $('#form-profil').removeClass('v-tampil');
});
$('button.btn-login').click(function(){
  $('#form-kampus').addClass('v-tutup');
  $('#form-login').addClass('v-tampil');
  $('#form-profil').addClass('v-tutup');

  $('#form-kampus').removeClass('v-tampil');
  $('#form-login').removeClass('v-tutup');
  $('#form-profil').removeClass('v-tampil');
});
});
</script>
