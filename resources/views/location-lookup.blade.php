@extends('main')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>IP LOOK UP</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>IP LOOK UP</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= What Is My IP? Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-md-12">
                    <div class="portfolio-info">
                        <h3>Reveal the location of any IP address.</h3>
                        <form>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" id="IPLOOKUPADDRESS" class="form-control"
                                        placeholder="Enter IP Address..." name="ipadd">
                                </div>
                                <div class="col-md-4">
                                    <input type="button" id="submitBtn" class="btn btn-danger" value="Get IP Details">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="lookupRes"></div>
            </div>
        </div>
    </section><!-- End What Is My IP? Section -->
@endsection

@section('script-section')
    <script>
        $(document).ready(function() {
            $("#submitBtn").click(function() {
                var IP_ADDRESS = $("#IPLOOKUPADDRESS").val();
                $('#lookupRes').html('');
                $.ajax({
                    url: "{{ route('iplookup') }}",
                    data: {
                        ip_addr: IP_ADDRESS
                    },
                    success: function(data) {                     
                        $('#lookupRes').html(data);
                    },
                    error: function(e) {
                        alert(e.responseJSON.message);
                    }

                });
            });
        });
    </script>
@endsection
