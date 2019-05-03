@include('partial/_header_admin')

<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <span>Dashboard</span>
  </li>
  <li class="breadcrumb-item">
    <span>Faculty</span>
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

    <a href="#" data-target="#add" data-toggle="modal" class="btn btn-primary">+ Add New Faculty</a><br>
    <div aria-labelledby="add" class="modal fade" id="add" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add">
              Add New Faculty
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
          <form action="{{ url('admin/faculty/store') }}" method="post">
            {{csrf_field()}}
          <div class="modal-body">
              <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name">
              </div>
              <div class="form-group">
                <label for="">University</label>
                @php $campus = App\Models\Campus::all(); @endphp
                <select class="form-control" name="campus_id">
                  @foreach($campus as $c)
                  <option value="{{ $c->id }}"> {{ $c->name }} </option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit"> Add</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-lightfont">
        <thead>
          <tr>
            <th>
              Name
            </th>
            <th>
              University
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $value)
          <tr>
            <td>
              {{ $value->name }}
            </td>
            <td>
              @if(isset($value->campus->name))
                {{ $value->campus->name }}
              @else
                <div style="color:red">Kampus di Blokir</div>
              @endif
            </td>
            <td>
              <a href="{{ url('admin/faculty/destroy/'. $value->id) }}" onclick="return confirm('Semua data jurusan dan user yang ada di kampus ini akan ikut terhapus!! Apakah kamu yakin?')" class="btn btn-sm btn-danger">Destroy</a>
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

  @include('partial/_script_footer_superadmin')

</body>
</html>
