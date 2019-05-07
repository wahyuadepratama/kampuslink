@include('partial/_superadmin_header')

<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <span>Dashboard</span>
  </li>
  <li class="breadcrumb-item">
    <span>University</span>
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

    <a href="#" data-target="#add" data-toggle="modal" class="btn btn-primary">+ Add New University</a><br>
    <div aria-labelledby="add" class="modal fade" id="add" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add">
              Add New University
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
          <form action="{{ url('admin/university/store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
          <div class="modal-body">
              <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name">
              </div>
              <div class="form-group">
                <label for="">Location</label>
                <input class="form-control" type="text" name="location">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="4" cols="40"></textarea>
              </div>
              <div class="form-group">
                <label for="">Background Color</label>
                <input class="form-control" type="text" name="background_color">
              </div>
              <div class="form-group">
                <label for="">Logo</label>
                <input type="file" name="logo" class="form-control">
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
          <table class="table table-lightborder">
            <thead>
              <tr>
                <th>
                  Logo
                </th>
                <th>
                  Name
                </th>
                <th>
                  Location
                </th>
                <th>
                  Description
                </th>
                <th>
                  Background Color
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
                  <img src="{{ asset('storage/university/' . $value->logo) }}" width="50px" style="border-radius:50%">
                </td>
                <td>
                  {{ $value->name }}
                </td>
                <td>
                  {{ $value->location }}
                </td>
                <td>
                  {{ $value->description }}
                </td>
                <td>
                  <div class="status-pill" style="background-color:@php echo $value->background_color; @endphp" data-toggle="tooltip" data-original-title="" title=""></div>
                </td>
                <td>
                  <a href="{{ url('admin/university/destroy/'. $value->id) }}" onclick="return confirm('Semua data fakultas, jurusan, event dan user yang ada di kampus ini akan ikut terhapus!! Apakah kamu yakin?')" class="btn btn-sm btn-danger">Destroy</a>
                  <a href="#" class="btn btn-sm btn-primary" data-target="#edit{{ $value->id }}" data-toggle="modal">Edit</a>
                  <div aria-labelledby="edit{{ $value->id }}" class="modal fade" id="edit{{ $value->id }}" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="edit{{ $value->id }}">
                            Edit {{ $value->name }}
                          </h5>
                          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form action="{{ url('admin/university/update/'. $value->id) }}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input class="form-control" type="text" value="{{ $value->name }}" name="name">
                            </div>
                            <div class="form-group">
                              <label for="">Location</label>
                              <input class="form-control" type="text" value="{{ $value->location }}" name="location">
                            </div>
                            <div class="form-group">
                              <label for="">Description</label>
                              <textarea class="form-control" name="description" rows="4" cols="40">{{ $value->description }}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="">Background Color</label>
                              <input class="form-control" type="text" value="{{ $value->background_color }}" name="background_color">
                            </div>
                            <div class="form-group">
                              <label for="">Logo</label>
                              <input type="file" name="logo" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" type="submit"> Save changes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
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
