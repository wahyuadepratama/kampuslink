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
        @include('partial/_admin_header_mobile')
        <!--
        START - Main Menu
        -------------------->
        <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
          <div class="logo-w">
            <a class="logo" href="/">
              <div class="logo-element"></div>
              <div class="logo-label">
                {{ $organization->name }}
              </div>
            </a>
          </div>
          <div class="logged-user-w avatar-inline">
            <div class="logged-user-i">
              <div class="avatar-w" style="background-color: white">
                <img alt="" src="{{ asset('storage/avatar/'. Auth::user()->photo_profile)}}">
              </div>
              <div class="logged-user-info-w">
                <div class="logged-user-name">
                  {{ Auth::user()->fullname }}
                </div>
                <div class="logged-user-role">
                  {{ Auth::user()->checkRoleUserOrganization($organization->id) }}
                </div>
              </div>
              <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
              </div>
              <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                  <div class="avatar-w">
                    <img alt="" src="{{ asset('storage/avatar/'. Auth::user()->photo_profile)}}">
                  </div>
                  <div class="logged-user-info-w">
                    <div class="logged-user-name">
                      {{ Auth::user()->fullname }}
                    </div>
                    <div class="logged-user-role">
                      Anggota
                    </div>
                  </div>
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
          <!-- <div class="menu-actions"> -->
            <!--
            END - Messages Link in secondary top menu
            --------------------><!--
            START - Settings Link in secondary top menu
            -------------------->
            <!-- <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
              <i class="os-icon os-icon-hierarchy-structure-2" data-toggle="tooltip" data-placement="right" data-original-title="Coming Soon"></i>
            </div> -->

            <!-- <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
              <i class="os-icon os-icon-wallet-loaded"></i>
              <div class="os-dropdown">
                <div class="icon-w">
                  <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                  <li>
                    <a href="{{ url('organization/'. $organization->instagram .'/fund-collected') }}"><i class="os-icon os-icon-delivery-box-2"></i><span>Dana Terkumpul</span></a>
                  </li>
                </ul>
              </div>
            </div> -->
            <!--
            END - Settings Link in secondary top menu
            --------------------><!--
            START - Messages Link in secondary top menu
            -------------------->
            <!-- <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
              <i class="os-icon os-icon-email-forward"></i>
              <div class="new-messages-count">
                4
              </div>
              <div class="os-dropdown light message-list">
                <div class="icon-w">
                  <i class="os-icon os-icon-zap"></i>
                </div>
                <ul>
                  <li>
                    <a href="#">
                      <div class="user-avatar-w">
                        <img alt="" src="{{ asset('_admin/img/avatar1.jpg')}}">
                      </div>
                      <div class="message-content">
                        <h6 class="message-from">
                          Admin
                        </h6>
                        <h6 class="message-title">
                          Event Approved
                        </h6>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user-avatar-w">
                        <img alt="" src="{{ asset('_admin/img/avatar1.jpg')}}">
                      </div>
                      <div class="message-content">
                        <h6 class="message-from">
                          Admin
                        </h6>
                        <h6 class="message-title">
                          Event Denied
                        </h6>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div> -->
            <!---  END - Messages Link in secondary top menu -------------------->
          <!-- </div> -->
          <h1 class="menu-page-header">
            Page Header
          </h1>
          <ul class="main-menu">
            <li class="sub-header">
              <span>Menu</span>
            </li>
            <li class="selected has-sub-menu" style="margin: 2%">
              <a href="{{ url('organization/'. $organization->instagram) }}">
                <div class="icon-w">
                  <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Dashboard</span></a>
            </li>
            <li class="selected has-sub-menu" style="margin: 2%">
              <a href="{{ url('organization/'. $organization->instagram .'/profile') }}">
                <div class="icon-w">
                  <div class="os-icon os-icon-ui-49"></div>
                </div>
                <span>Profile</span></a>
            </li>
            <li class="selected has-sub-menu" style="margin: 2%">
              <a href="{{ url('organization/'. $organization->instagram .'/members') }}">
                <div class="icon-w">
                  <div class="os-icon os-icon-users"></div>
                </div>
                <span>Members</span></a>
            </li>
            <li class="selected has-sub-menu" style="margin: 2%">
              <a href="{{ url('organization/'. $organization->instagram .'/event') }}">
                <div class="icon-w">
                  <div class="os-icon os-icon-file-text"></div>
                </div>
                <span>Event</span></a>
            </li>
            <li class="selected has-sub-menu" style="margin: 2%">
              <a href="{{ url('organization/'. $organization->instagram .'/fund-collected') }}">
                <div class="icon-w">
                  <div class="os-icon os-icon-wallet-loaded"></div>
                </div>
                <span>Dana Terkumpul</span></a>
            </li>
          </ul>
        </div>
        <!--
        END - Main Menu
        -------------------->
        <div class="content-w">
