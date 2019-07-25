@include('partial/_admin_header')

        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <span>Member</span>
          </li>
        </ul>

        <div class="content-i">
          <div class="content-box">

            @if (\Session::has('message'))
                <div class="alert alert-success">
                    {!! \Session::get('message') !!}
                </div>
            @endif

            <div class="row">
              <div class="col-sm-12">
                <div class="element-wrapper">
                  <h6 class="element-header">
                    Anggota
                  </h6>
                  <div class="element-content">
                    <div class="row">
                      <div class="element-box-tp">
                        <div class="input-search-w">
                          <input id="anggota" onkeyup="searchJs()" class="form-control rounded bright" placeholder="Cari Anggota..." type="search">
                          <div id="myUL">
                            <div class="users-list-w">
                            @foreach($member as $key)
                            <span>
                              <b>
                                <div style="display:none">
                                  {{ $key->user->fullname }}
                                </div>
                                <div class="user-w with-status <?php if ($key->user->isOnline($key->user->id)) { echo 'status-green'; } else { echo 'status-red'; } ?>">
                                  <div class="user-avatar-w">
                                    <div class="user-avatar">
                                      <img alt="" src="{{ asset('storage/avatar/'. $key->user->photo_profile)}}">
                                    </div>
                                  </div>
                                  <div class="user-name">
                                    <h6 class="user-title">
                                      {{ $key->user->fullname }} | {{ $key->role }}
                                    </h6>
                                    <div class="user-role">
                                      {{ $key->user->programStudy->name }}
                                    </div>
                                  </div>
                                  <a class="user-action" href="#" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon">

                                  </a>
                                  @if(Auth::user()->checkRoleUserOrganization($organization->id) == "Admin")
                                  <a class="user-action" href="#" data-placement="right" data-toggle="modal" data-target=".bd-example-modal-sm{{ $key->user_id }}{{ $key->organization_id }}">
                                    <div class="os-icon os-icon-ui-49"></div>
                                  </a>
                                  <div aria-labelledby="mySmallModalLabel" class="modal fade bd-example-modal-sm{{ $key->user_id }}{{ $key->organization_id }}" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Ubah Role
                                          </h5>
                                          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                                        </div>
                                        <form method="post" action="{{ url('organization/'.$organization->instagram.'/members/update-role') }}">
                                          {{ csrf_field() }}
                                          <div class="modal-body">
                                            <div class="form-group">
                                              <label for=""> Role</label>
                                              <select class="form-control" name="role">
                                                <option value="anggota">Anggota</option>
                                                <option value="admin">Admin</option>
                                              </select>
                                              <input type="hidden" name="user_id" value="{{ $key->user_id }}">
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                                            <button class="btn btn-primary" type="submit"> Simpan</button><br>
                                            <a href="{{url('organization/'.$organization->instagram.'/members/new/destroy/'. $key->user->username)}}" class="btn btn-danger">Hapus Keanggotaan</a>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  @endif
                                </div>
                              </b>
                            </span>
                            @endforeach
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @if(Auth::user()->checkRoleUserOrganization($organization->id) == "Admin")
          <div class="content-panel">
            <div class="content-panel-close">
              <i class="os-icon os-icon-close"></i>
            </div>
            <div class="element-wrapper">
              <h6 class="element-header">
                Tambah Anggota
              </h6>
              <div class="element-box-tp">
                <div class="form-group">
                  <input id="addMember" class="form-control rounded bright" placeholder="Cari username atau email" type="search">
                  <div id='newMember'>

                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          
        </div>

      <div class="display-type"></div>
    </div>

    <script>
      function searchJs() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('anggota');
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName('span');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByTagName("b")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
          } else {
            li[i].style.display = "none";
          }
        }
      }

      var input = document.getElementById("addMember");
      input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
          $.ajax({
            url: '/organization/user/'+ input.value,
            data: "",
            dataType: 'json',
            success: function(rows)
            {
              var username = [];
              var fullname = [];
              var profile = [];
              for(var i in rows){
                var row = rows[i];
                username.push(row.username);
                fullname.push(row.fullname);
                profile.push(row.photo_profile);
              }

              var $div = $('#newMember');
              $div.contents().remove();

              if(username.length === 0) {
                console.log('tes');
                var z = document.createElement('div'); // is a node
                z.innerHTML = '<br><center>Pengguna tidak ditemukan</center>';
                document.getElementById('newMember').appendChild(z);
              }

              for (i = 0; i < username.length; i++) {
                console.log(username[i]);
                var z = document.createElement('div'); // is a node
                z.innerHTML = '<div class="users-list-w"><div class="user-w"><div class="user-avatar-w"><div class="user-avatar"><img alt="" src="http://localhost:8000/storage/avatar/'+ profile[i] +'"></div></div><div class="user-name"><h6 class="user-title">'+ username[i] +'</h6><div class="user-role">'+ fullname[i] +'</div></div><a class="user-action" href="/organization/'+ '{{ $organization->instagram }}' + '/members/new/store/'+ username[i] +'" data-placement="right"><div class="os-icon os-icon-users"></div></a></div></div>';
                document.getElementById('newMember').appendChild(z);
              }
            }
          });
        }
      });
    </script>

    @include('partial/_admin_script_footer')

  </body>
</html>
