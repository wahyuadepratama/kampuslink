@include('partial/_superadmin_header')

<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <span>Dashboard</span>
  </li>
  <li class="breadcrumb-item">
    <span>Big Event</span>
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
              Poster
            </th>
            <th style="text-align:center">
              Judul
            </th>
            <th style="text-align:center">
              Organization
            </th>
            <th style="text-align:center">
              Pelaksanaan
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
              <a href="#" onclick="window.open('{{ url('storage/poster/_large/' . $value->photo) }}','popUpWindow','height=800,width=600,left=10,top=10,,scrollbars=yes,menubar=no'); return false;" class="btn btn-sm btn-primary">Show</a><br>
            </td>
            <td style="text-align:center">
              {{ $value->name }}
            </td>
            <td style="text-align:center">
              {{ $value->organization->name }}
            </td>
            <td style="text-align:center">
              {{ $value->start_date }} - {{ $value->end_date }}
            </td>
            <td style="text-align:center">
              @if($value->approved == 1)
                <div style="color:green;font-weight:bold">Approved</div>
              @elseif($value->approved == 2)
                <div style="color:red;font-weight:bold">Reject</div>
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
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Name
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->name }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Description
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          @php echo $value->description; @endphp
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Start Date
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->start_date }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          End Date
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->end_date }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Website
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->web_link }}
                        </div>
                      </div>
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Created at
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          {{ $value->created_at }}
                        </div>
                      </div>
                      @if(isset($value->reason))
                      <div class="row" style="margin:1%">
                        <div class="col-md-4" style="text-align:left">
                          Reason
                        </div>
                        <div class="col-md-8" style="text-align:left">
                          @php echo $value->reason; @endphp
                        </div>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </td>

            <td style="text-align:center">
              @if($value->role_id != 1)
                @if($value->approved == 1)
                <a href="#" data-target="#reject{{ $value->id }}" data-toggle="modal" class="btn btn-sm btn-warning">Reject</a><br>
                <div aria-labelledby="reject" class="modal fade" id="reject{{ $value->id }}" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="reject{{ $value->id }}">
                          Alasan Penolakan
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row" style="margin:1%">
                          <form action="{{ url('admin/big-event/reject/'. $value->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <textarea name="reason" rows="8" cols="80" id="ckeditor1"></textarea>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-warning">Kirim Penolakan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @else
                <a href="{{ url('admin/big-event/approve/'. $value->id) }}" onclick="return confirm('Apakah kamu yakin?')" class="btn btn-sm btn-success">Approve</a>
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
