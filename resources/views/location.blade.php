@extends('main')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>What Is My IP?</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>What Is My IP?</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= What Is My IP? Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            @if ($location_data)
                <div class="row gy-4">

                    <div class="col-lg-6">
                        <div class="portfolio-info">
                            <h3>My IP address location:</h3>
                            <ul class="list-group">
                                @php unset($location_data->driver); @endphp
                                @foreach ($location_data as $lkey => $item)
                                    @if (!empty($item))
                                        <li class="list-group-item">
                                            <strong>{{ isset($array_name[$lkey]) ? $array_name[$lkey] : $lkey }}</strong>
                                                :
                                                {{ $item }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <iframe style="border:0; width: 100%; height: 384px;" allowfullscreen frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?q={{ $location_data->latitude }},{{ $location_data->longitude }}&amp;output=embed">
                        </iframe>
                    </div>

                </div>
            @endif

        </div>
    </section><!-- End What Is My IP? Section -->
@endsection
