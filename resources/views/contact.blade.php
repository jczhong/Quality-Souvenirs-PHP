@extends('layouts.root')

@section('title', 'Contact')

@section('content')
    <div class="row mt-4">
        <div class="col-8">
            <div class="w-100" style="height:400px;" id="map"></div>
        </div>

        <script>
            var map;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: { lat: -36.87967209686738, lng: 174.7068214416504 },
                    zoom: 15
                });

                var marker = new google.maps.Marker({
                    position: { lat: -36.87967209686738, lng: 174.7068214416504 },
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFyDYFSffqTsmYyt1Gor99wcjdSCHMQgI&callback=initMap">
        </script>
        <div class="col-4">
            <address>
                <strong>Address:</strong>
                139 Carrington Rd<br />
                Mount Albert, Auckland 1025<br />
            </address>

            <address>
                <strong>Phone:</strong>
                09-815 4321
            </address>

            <address>
                <strong>Email:</strong> <a href="mailto:Support@example.com">support@qulitisouvenirs.com</a><br />
            </address>
        </div>
    </div>
@endsection