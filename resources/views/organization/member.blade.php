@include('partial/_header_organization')

        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <span>Member</span>
          </li>
        </ul>

          <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>


        </div>
      </div>
      <div class="display-type"></div>
    </div>

    @include('partial/_script_footer_admin')

  </body>
</html>
