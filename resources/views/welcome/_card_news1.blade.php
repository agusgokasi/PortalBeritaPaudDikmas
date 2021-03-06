<h4 class="h4"><i class="fas fa-newspaper"></i> &nbsp; Berita</h4>
<hr class="orange" style="height: 2px">

<div class="d-flex row">
  @foreach($contents as $content)
  <div class="col-md-4 my-2">

    <div class="card">

      <!-- Card image -->
      <div class="view overlay">
        <img class="card-img-top" src="{{asset('/banner/thumbnews/' . $content->banner)}}" alt="Card image cap">
        <a href="{{route('g_news_show', ['id' => $content->id])}}">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!-- Card content -->
      <div class="card-body" style="height: 350px">
        <!-- Title -->
        <h6 class="card-title">{{ $content->title }}</h6>
        <!-- Text -->
        <small>
          <span class="badge badge-secondary z-depth-0">
            {{($content->updated_at)->format('d-m-Y') }}
          </span>
        </small>
        <small>
          &nbsp;{{ $content->description }}</p></div>
        </small>
        <div class="card-body">
          <a href="{{route('g_news_show', ['id' => $content->id])}}" class="btn btn-outline-primary btn-sm btn-block">Selengkapnya</a>
        </div>
      </div>
  </div>
  @endforeach

</div>
  
<br>
<div class="d-flex justify-content-center my-2">
  <a class="btn btn-primary rounded" href="{{ route('g_news_index') }}">Lihat Berita Lainnya</a>
</div>


