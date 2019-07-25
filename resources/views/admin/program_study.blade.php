@include('partial/_superadmin_header')

<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <span>Dashboard</span>
  </li>
  <li class="breadcrumb-item">
    <span>Program Study</span>
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

    <a href="#" data-target="#add" data-toggle="modal" class="btn btn-primary">+ Add New Program Study</a><br>
    <div aria-labelledby="add" class="modal fade" id="add" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add">
              Add New Faculty
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
          <form action="{{ url('admin/program-study/store') }}" method="post">
            {{csrf_field()}}
          <div class="modal-body">
              <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name">
              </div>
              <div class="form-group">
                @php $campus = App\Models\Campus::all(); @endphp
                <select class="form-control" name="campus_id" id="campus">
                  <option value="0"> Campus </option>
                  @foreach($campus as $c)
                  <option value="{{ $c->id }}"> {{$c->name}} </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="">Faculty</label>
                <select class="form-control" name="faculty_id" id="faculty">
                  <option value="0"> Faculty </option>
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
              Faculty
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
              @if(isset($value->faculty->name))
                {{ $value->faculty->name }}
              @endif
            </td>
            <td>
              @if(isset($value->faculty->campus->name))
                {{ $value->faculty->campus->name }}
              @endif
            </td>
            <td>
              <a href="{{ url('admin/program-study/destroy/'. $value->id) }}" onclick="return confirm('Semua data user yang ada di jurusan ini akan ikut terhapus!! Apakah kamu yakin?')" class="btn btn-sm btn-danger">Destroy</a>
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

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript">
$('#campus').on('change', function(){
  $.ajax({
    url: '/get-faculty/' + $('#campus').val(),
    data: "",
    dataType: 'json',
    success: function(rows)
    {
      var campus = [];
      var campusVal = [];
      for(var i in rows){
        var row = rows[i];
        var name = row.name;
        var value = row.id;

        campus.push(name);
        campusVal.push(value);
      }
      // console.log(campus);
      $('#faculty').html('');
      if(campus.length == 0){
        $('#faculty').append('<option value="0">Choose Another Campus</option>');
      }else{
        $('#faculty').append('<option value="0">Select Faculty</option>');
        for (i = 0; i < campus.length; i++) {
          $('#faculty').append('<option value="'+ campusVal[i] +'">' + campus[i] + '</option>');
        }
      }
    }
  });

});
</script>

  @include('partial/_superadmin_script_footer')

</body>
</html>
