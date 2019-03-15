@include('partial/_header_organization')

        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('organization/'. $organization->instagram) }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <span>Member</span>
          </li>
        </ul>

        <div class="row">
          <div class="col-md-8">
            <div class="content-panel">
              <div class="content-panel-close">
                <i class="os-icon os-icon-close"></i>
              </div>

              <div class="element-wrapper">
                @if (\Session::has('message'))
                    <div class="alert alert-success">
                        {!! \Session::get('message') !!}
                    </div>
                @endif
                <h6 class="element-header">
                  Anggota
                </h6>
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
                          @if($key->user->isOnline($key->user->id))
                          <div class="user-w with-status status-green">
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
                            @if(Auth::user()->checkRoleUserOrganization($organization->id) == "Admin")
                            <a class="user-action" href="#" data-placement="right" data-toggle="modal" data-target=".bd-example-modal-sm{{ $key->user_id }}{{ $key->organization_id }}">
                              <div class="os-icon os-icon-ui-49"></div>
                            </a>
                            <div aria-labelledby="mySmallModalLabel" class="modal fade bd-example-modal-sm{{ $key->user_id }}{{ $key->organization_id }}" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                              <div class="modal-dialog modal-sm">
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
                                      <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button><button class="btn btn-primary" type="submit"> Simpan</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            @endif
                            <a class="user-action" href="#" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon">
                              <div class="os-icon os-icon-email-forward"></div>
                            </a>
                          </div>
                          @else
                          <div class="user-w with-status status-red">
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
                            @if(Auth::user()->checkRoleUserOrganization($organization->id) == "Admin")
                            <a class="user-action" href="#" data-placement="right" data-toggle="modal" data-target=".bd-example-modal-sm{{ $key->user_id }}{{ $key->organization_id }}">
                              <div class="os-icon os-icon-ui-49"></div>
                            </a>
                            <div aria-labelledby="mySmallModalLabel" class="modal fade bd-example-modal-sm{{ $key->user_id }}{{ $key->organization_id }}" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                              <div class="modal-dialog modal-sm">
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
                                      <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button><button class="btn btn-primary" type="submit"> Simpan</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            @endif
                            <a class="user-action" href="#" data-placement="right" data-toggle="tooltip" title=""  data-original-title="Coming Soon">
                              <div class="os-icon os-icon-email-forward"></div>
                            </a>
                          </div>
                          @endif
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
    </script>

    @include('partial/_script_footer_admin')

  </body>
</html>
