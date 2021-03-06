<!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade z-depth-2 rounded" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      @foreach( $headlines as $headline )
        <li data-target="#carousel-example-1z" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
      @endforeach
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox" style="width:100%;">
      <!--First slide-->
      @foreach( $headlines as $headline )
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <a href="{{ route('g_headline_show' , ['id' => $headline->id]) }}">
              <img class="d-block w-100 rounded" src="{{ asset('/banner/headline/'. $headline->banner ) }}" alt="{{ $headline->title }}">
              <div class="carousel-caption d-none d-md-block">
                  <h3><p class="text-white h2 hline rgba-stylish-strong">{{ $headline->title }}</p></h3>
              </div>
            </a>
        </div>
      @endforeach
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
<!--/.Carousel Wrapper-->