<!DOCTYPE html>
<html>
  <head>
    <title>Kampus Link</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('client/img/logo/icon.png') }}" rel="shortcut icon">
    <link href="{{ asset('client/img/logo/icon/.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('_admin/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/icon_fonts_assets/foundation-icon-font/foundation-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('_admin/css/main.css')}}" rel="stylesheet">
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
      <div class="layout-w">
        <!-- tampilan mobile -->
        @include('partial/_header_admin_mobile')
        <!--
        START - Main Menu
        -------------------->
        <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
          <div class="logo-w">
            <a class="logo" href="#">
              <div class="logo-element"></div>
              <div class="logo-label">
                  KampusLink
              </div>
            </a>
          </div>
          <div class="logged-user-w avatar-inline">
            <div class="logged-user-i">
              <div class="avatar-w">
                <img alt="" src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}">
              </div>
              <div class="logged-user-info-w">
                <div class="logged-user-name">
                  {{ Auth::user()->username }}
                </div>
                <div class="logged-user-role">
                  Super Admin
                </div>
              </div>
              <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
              </div>
              <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                  <div class="avatar-w">
                    <img alt="" src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}">
                  </div>
                  <div class="logged-user-info-w">
                    <div class="logged-user-name">
                      Super Admin
                    </div>
                    <div class="logged-user-role">
                      Pengurus
                    </div>
                  </div>
                </div>
                <div class="bg-icon">
                  <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <h1 class="menu-page-header">
            Page Header
          </h1>
          <ul class="main-menu">
            <li class="sub-header">
              <span>Menu</span>
            </li>
            <li class="selected has-sub-menu">
              <a href="{{ url('admin') }}">
                <div class="icon-w">
                  <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Dashboard</span></a>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-file-text"></div>
                </div>
                <span>Event</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Event
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-file-text"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="{{ url('admin/event') }}">Event Berjalan</a>
                    </li>
                    <li>
                      <a href="{{ url('admin/ticket') }}">Tiket Peserta</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="{{ url('message') }}">
                <div class="icon-w">
                  <div class="os-icon os-icon-mail"></div>
                </div>
                <span>Pesan</span></a>
            </li>
              <li class=" has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-file-text"></div>
                  </div>
                  <span>Campus</span></a>
                <div class="sub-menu-w">
                  <div class="sub-menu-header">
                    Campus
                  </div>
                  <div class="sub-menu-icon">
                    <i class="os-icon os-icon-file-text"></i>
                  </div>
                  <div class="sub-menu-i">
                    <ul class="sub-menu">
                      <li>
                        <a href="{{ url('admin/university') }}">University</a>
                      </li>
                      <li>
                        <a href="{{ url('admin/faculty') }}">Faculty</a>
                      </li>
                      <li>
                        <a href="{{ url('admin/faculty') }}">Program Study</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
          </ul>
        </div>
        <!--
        END - Main Menu
        -------------------->
        <div class="content-w">
