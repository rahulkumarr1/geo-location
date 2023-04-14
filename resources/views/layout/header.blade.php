 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="{{ route('home') }}">IpTool</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="{{ route('home') }}">My IP</a></li>
                <li><a class="nav-link scrollto" href="{{ route('iplookup') }}">IP Address Lookup</a></li>
                <li><a class="nav-link scrollto" href="#services">Tool</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
