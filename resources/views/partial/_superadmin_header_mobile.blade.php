<div class="menu-mobile menu-activated-on-click color-scheme-dark">
  <div class="mm-logo-buttons-w">
    <a class="mm-logo" href="index.html"><img src="img/logo.png"><span>KampusLink</span></a>
    <div class="mm-buttons">
      <!-- <div class="content-panel-open">
        <div class="os-icon os-icon-grid-circles"></div>
      </div> -->
      <div class="mobile-menu-trigger">
        <div class="os-icon os-icon-hamburger-menu-1"></div>
      </div>
    </div>
  </div>
  <div class="menu-and-user">
    <div class="logged-user-w">
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
    </div>
    <ul class="main-menu">
      <li>
        <a href="{{ url('admin') }}">
          <div class="icon-w">
            <div class="os-icon os-icon-layout"></div>
          </div>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/user') }}">
          <div class="icon-w">
            <div class="os-icon os-icon-layout"></div>
          </div>
          <span>User</span>
        </a>
      </li>
      <li class=" has-sub-menu">
        <a href="#">
          <div class="icon-w">
            <div class="os-icon os-icon-file-text"></div>
          </div>
          <span>Event</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{ url('admin/big-event') }}">Big Event</a>
              </li>
              <li>
                <a href="{{ url('admin/event') }}">Event</a>
              </li>
              <li>
                <a href="{{ url('admin/ticket') }}">Tiket Peserta</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li>
        <a href="{{ url('message') }}">
          <div class="icon-w">
            <div class="os-icon os-icon-mail"></div>
          </div>
          <span>Pesan</span>
        </a>
      </li>
      <li class=" has-sub-menu">
        <a href="#">
          <div class="icon-w">
            <div class="os-icon os-icon-file-text"></div>
          </div>
          <span>Campus</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{ url('admin/university') }}">University</a>
              </li>
              <li>
                <a href="{{ url('admin/faculty') }}">Faculty</a>
              </li>
              <li>
                <a href="{{ url('admin/program-study') }}">Program Study</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li>
        <a href="{{ url('admin/organization') }}">
          <div class="icon-w">
            <div class="os-icon os-icon-mail"></div>
          </div>
          <span>Organization</span>
        </a>
      </li>
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="icon-w">
            <div class="os-icon os-icon-signs-11"></div>
          </div>
          <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </div>
</div>
