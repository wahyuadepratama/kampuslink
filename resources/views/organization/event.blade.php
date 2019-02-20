@include('partial/_header_organization')

    <ul class="breadcrumb">
      <li class="breadcrumb-item">
        <span>Event</span>
      </li>
    </ul>

    <div class="rentals-list-w">
      <div class="rentals-list">
        <div class="list-controls">
          <div class="list-info">
            30 Event
          </div>
          <div class="list-order">
            <label for="">Filter:</label>
            <select class="form-control">
              <option>
                Berjalan
              </option>
              <option>
                Berlalu
              </option>
            </select>
          </div>
        </div>
        <div class="property-items as-grid">
          <!--
          START - Property Item
          -------------------->
          <div class="property-item" style="margin: 2%">
                <div class="event-tambah">
                <div class="profile-tile profile-tile-inlined">
                  <a class="profile-tile-box faded" href="{{ url('organization/event/add') }}">
                    <div class="pt-new-icon">
                      <i class="os-icon os-icon-plus"></i>
                    </div>
                    <div class="pt-user-name">
                      Tambah Event
                    </div>
                  </a>
                </div>
              </div>
            </div>
        <!--
          START - Property Item
          -------------------->
          @foreach($subEvent as $key)

          <div class="property-item" style="margin: 2%">
            <a class="item-media-w" href="#">
              <div class="item-media" style="background-image: url({{ asset('storage/medium/)')}}"></div>
            </a>
            <div class="item-info">
              <div class="item-features">
                <div class="feature">
                  @if($key['approved'] == 1)
                  <button class="btn btn-outline-success btn-sm" type="button"> Approved</button>
                  @elseif($key['approved'] == 2)
                  <button class="btn btn-outline-danger btn-sm" type="button"> Denied</button>
                  @else
                  <button class="btn btn-warning btn-sm" type="button"> Pending</button>
                  @endif
                </div>
              </div>
              <h3 class="item-title">
                <a href="#">{{ $key['name'] }}</a>
              </h3>
              <div class="item-reviews">
                <div class="reviews-stars">
                    Tiket
                </div>
                <div class="reviews-count">
                  0/50
                </div>
              </div>
                <div class="row">
                <div class="item-price-buttons col-12">
                  @if($key['approved'] == 2)
                    <a class="btn btn-outline-primary btn-block" href="{{ url('organization/event/add') }}"><span>Ajukan Kembali</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                  @else
                    <a class="btn btn-outline-primary btn-block" href="{{ url('organization/event/'. $key['slug']) }}"><span>Detail</span><i class="os-icon os-icon-arrow-2-right"></i></a>
                  @endif
                </div>
                </div>
            </div>
          </div>

          @endforeach
          <!--
          END - Property Item
          -------------------->

        </div>
        <div class="pagination-w">
          <div class="pagination-info">
            Urutan
          </div>
          <div class="pagination-links">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link" href="#"> Previous</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#"> 1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#"> 2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#"> 3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#"> Next</a>
              </li>
            </ul>
          </div>
      <!--
    END - Rentals Content
    -------------------->
        </div>
      </div>
    </div>
    <div class="display-type"></div>
  </div>

  @include('partial/_script_footer_admin')

</body>
</html>
