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
              Logo
            </th>
            <th style="text-align:center">
              Name
            </th>
            <th style="text-align:center">
              Status
            </th>
            <th style="text-align:center">
              Member
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
              <img src="{{ asset('storage/organization/' . $value->photo_profile) }}" width="50px" style="border-radius:50%">
            </td>
            <td style="text-align:center">
              {{ $value->name }}
            </td>
            <td style="text-align:center">
              @if($value->approved == 1)
                <div style="color:green;font-weight:bold">Approved</div>
              @elseif($value->approved == 2)
                <div style="color:red;font-weight:bold">Blocked</div>
              @else
                <div style="color:#d1d12e;font-weight:bold">Waiting</div>
              @endif
            </td>
            <td style="text-align:center">

              <a href="#" data-target="#member{{ $value->id }}" data-toggle="modal" class="btn btn-sm btn-primary">Member</a><br>
              <div aria-labelledby="detail" class="modal fade" id="member{{ $value->id }}" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="member{{ $value->id }}">
                        Detail
                      </h5>
                      <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="row" style="margin:1%">
                        @php $o = \App\Models\UserOrganization::where('organization_id', $value->id)->get(); @endphp
                        @foreach($o as $v)
                        <div class="col-md-4" style="text-align:left">
                          {{ $v->user->username }} ({{ $v->role }})
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          University
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->campus->name }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Description
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->description }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Creator
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->creator }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Instagram
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->instagram }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Line
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->line }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Facebook
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->facebook }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Whatsapp
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->whatsapp }}
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
                          Registered since
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          @php echo \Carbon\Carbon::parse($value->created_at)->diffForHumans(); @endphp
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>

            <td style="text-align:center">
              @if($value->approved == 1)
              <a href="{{ url('admin/organization/reject/'. $value->id) }}" onclick="return confirm('Apakah kamu yakin?')" class="btn btn-sm btn-warning">Reject</a>
              @else
              <a href="{{ url('admin/organization/approve/'. $value->id) }}" onclick="return confirm('Apakah kamu yakin?')" class="btn btn-sm btn-success">Approve</a>
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
