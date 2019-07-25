@include('partial/_superadmin_header')

<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <span>Dashboard</span>
  </li>
  <li class="breadcrumb-item">
    <span>Organization</span>
  </li>
</ul>

<div class="content-panel-toggler">
  <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
</div>
<div class="content-i">
  <div class="content-box">

    @if($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
    @endif

    <div class="table-responsive">
      <table class="table table-striped table-lightfont">
        <thead>
          <tr>
            <th style="text-align:center">
              Avatar
            </th>
            <th style="text-align:center">
              Role
            </th>
            <th style="text-align:center">
              Username
            </th>
            <th style="text-align:center">
              Status
            </th>
            <th style="text-align:center">
              Detail
            </th>
            <th style="text-align:center">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $value)
          <tr>
            <td style="text-align:center">
              <img src="{{ asset('storage/avatar/' . $value->photo_profile) }}" width="50px" style="border-radius:50%">
            </td>
            <td style="text-align:center">
              {{ $value->role->role_name }}
            </td>
            <td style="text-align:center">
              {{ $value->username }}
            </td>
            <td style="text-align:center">
              @if($value->status == 1)
                <div style="color:green;font-weight:bold">Approved</div>
              @elseif($value->status == 2)
                <div style="color:red;font-weight:bold">Blocked</div>
              @else
                <div style="color:#d1d12e;font-weight:bold">Waiting</div>
              @endif
            </td>
            <td style="text-align:center">

              <a href="#" data-target="#detail{{ $value->id }}" data-toggle="modal" class="btn btn-sm btn-primary">Detail</a><br>
              <div aria-labelledby="detail" class="modal fade" id="detail{{ $value->id }}" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="detail{{ $value->id }}">
                        Detail
                      </h5>
                      <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                    </div>
                    <div class="modal-body">
                      @if($value->role_id != 1)
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          University
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->programStudy->faculty->campus->name }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Faculty
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->programStudy->faculty->name }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Program Study
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->programStudy->name }}
                        </div>
                      </div>
                      @endif
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Fullname
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->fullname }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          NIM
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->nim }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Email
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->email }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Phone
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->phone }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          KTM
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          <img src="{{ asset('storage/ktm/' . $value->photo_ktm) }}" width="50px" style="border-radius:50%">
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Tanggal Lahir
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->date_birth }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Gender
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->gender }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Phone Type
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->phone_type }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Android Type
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->android_type }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Apps Version
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->apps_version }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Member Since
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          @php echo \Carbon\Carbon::parse($value->created_at)->diffForHumans(); @endphp
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Last Login
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->last_login }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>

            <td style="text-align:center">
              @if($value->role_id != 1)
                @if($value->status == 1)
                <a href="{{ url('admin/user/reject/'. $value->id) }}" onclick="return confirm('Apakah kamu yakin?')" class="btn btn-sm btn-warning">Reject</a>
                @else
                <a href="{{ url('admin/user/approve/'. $value->id) }}" onclick="return confirm('Apakah kamu yakin?')" class="btn btn-sm btn-success">Approve</a>
                @endif
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
</div>
</div>
<div class="display-type"></div>
</div>

  @include('partial/_superadmin_script_footer')

</body>
</html>
