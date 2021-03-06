@if($pengumumans != null)
  <div class="card">
    <!-- Card content -->
    <div class="card-body text-center">

      <!-- Title -->
      <div class="row">
        <div class="col-md-8">
          <h6 class="card-title"><a href="{{ route('g_info_show', ['id' => $pengumumans->id ]) }}">{{ $pengumumans->name }}</a></h6>
          <!-- Text -->
          <p class="card-text">{{ $pengumumans->content }}</p>
        </div>
        <div class="col-md-4">
           <a href="{{ route('g_info_index') }}" class="btn btn-outline-info btn-sm">Lihat Pengumuman Lainnya</a>
        </div>
      </div>
    </div>

  </div>
  <!-- Card -->

@endif