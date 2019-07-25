<!-- START - Mobile Menu -------------------->
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
  <div class="mm-logo-buttons-w">
    <a class="mm-logo" href="/"><img src="{{ asset('_admin/img/logo.png')}}"><span>{{ $organization->name }}</span></a>
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
        <img alt="" src="{{ asset('storage/avatar/'. Auth::user()->photo_profile)}} ">
      </div>
      <div class="logged-user-info-w">
        <div class="logged-user-name">
          {{ Auth::user()->fullname }}
        </div>
        <div class="logged-user-role">
          {{ Auth::user()->checkRoleUserOrganization($organization->id) }}
        </div>
      </div>
    </div>
    <!-- START - Mobile Menu List -------------------->
    <ul class="main-menu">
      <li>
        <a href="{{ url('organization/'. $organization->instagram) }}">
          <div class="icon-w">
            <div class="os-icon os-icon-layout"></div>
          </div>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ url('organization/'. $organization->instagram . '/profile') }}">
          <div class="icon-w">
            <div class="os-icon os-icon-ui-49"></div>
          </div>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a href="{{ url('organization/'. $organization->instagram). '/members' }}">
          <div class="icon-w">
            <div class="os-icon os-icon-users"></div>
          </div>
          <span>Members</span>
        </a>
      </li>
      <li>
        <a href="{{ url('organization/'. $organization->instagram .'/event') }}">
          <div class="icon-w">
            <div class="os-icon os-icon-file-text"></div>
          </div>
          <span>Event</span>
        </a>
      </li>
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="icon-w">
            <div class="os-icon os-icon-signs-11"></div>
          </div>
          <span>Logout</span>
        </a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
    </ul>
    <!-- END - Mobile Menu List -------------------->
  </div>
</div>
<!-- END - Mobile Menu -------------------->
