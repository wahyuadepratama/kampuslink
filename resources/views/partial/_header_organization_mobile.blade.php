<!-- START - Mobile Menu -------------------->
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
  <div class="mm-logo-buttons-w">
    <a class="mm-logo" href="/"><img src="{{ asset('_admin/img/logo.png')}}"><span>{{ $name }}</span></a>
    <div class="mm-buttons">
      <div class="content-panel-open">
        <div class="os-icon os-icon-grid-circles"></div>
      </div>
      <div class="mobile-menu-trigger">
        <div class="os-icon os-icon-hamburger-menu-1"></div>
      </div>
    </div>
  </div>
  <div class="menu-and-user">
    <div class="logged-user-w">
      <div class="avatar-w">
        <img alt="" src="{{ asset('_admin/img/avatar1.jpg')}} ">
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
    <!-- START - Mobile Menu List -------------------->
    <ul class="main-menu">
      <li>
        <a href="{{ url('organization') }}">
          <div class="icon-w">
            <div class="os-icon os-icon-layout"></div>
          </div>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="event.php">
          <div class="icon-w">
            <div class="os-icon os-icon-file-text"></div>
          </div>
          <span>Event</span>
        </a>
      </li>
    </ul>
    <!-- END - Mobile Menu List -------------------->
  </div>
</div>
<!-- END - Mobile Menu -------------------->
