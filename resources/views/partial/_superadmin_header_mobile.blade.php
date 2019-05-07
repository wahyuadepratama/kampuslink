<div class="menu-mobile menu-activated-on-click color-scheme-dark">
  <div class="mm-logo-buttons-w">
    <a class="mm-logo" href="index.html"><img src="img/logo.png"><span>KampusLink</span></a>
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
        <a href="index.php">
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
  </div>
</div>
