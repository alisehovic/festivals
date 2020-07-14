@extends('layouts.app')
@section('content')

    

          <h2>Festivals</h2>
          <div class="festivalsTableContainer col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <table style="width: 100%">
              <tr>
                <th class="text-center">Logo</th>
                <th class="text-center">Name of the festival</th>
                <th class="text-center">Organizer</th>
                <th class="text-center">Date</th>
                <th></th>
              </tr>
              @foreach($festivals as $festival)
                    <tr style="height: 50px">
                          <td style="padding-top:20px">
                              <img src="{{ $festival->logo}}"  width="80" height="80">
                           
                         </td>
                        <td style="padding-top:20px">
                            
                                {{$festival->name }}

                           
                         </td>
                          <td style="padding-top:20px">
                              {{ $festival->organisator }}
                           
                         </td>
                        <td style="padding-top:20px">
                            {{ $festival->date}}                  
                        </td>
                        <td style="padding-top:20px">
                            <a href="{{$festival->url}}" ><button class="tipka btn btn-success"><span class="fa fa-eye"></span> About</button></a>
                            <br>
                          <button class="showMap tipka btn btn-primary" longitude="{{ $festival->longitude }}  " latitude="{{ $festival->latitude }}" address ="{{ $festival->address }}  " > <span class="fa fa-location-arrow "></span> Location </button>
                          <br>
                          <a href="/buy-tickets/{{$festival->id}}" ><button class="tipka btn btn-success"><span class="fa fa-shopping-cart"></span> Buy</button></a>
                          <br>
                           @if ($user->role==2)
                          <a href="/admin/edit_festival/{{$festival->id}}" ><button class="tipka btn btn-success"><span class="fa fa-edit "></span> Edit</button></a>
                          <br>
                          <a href="/home/{{$festival->id}}" ><button class="tipka btn btn-danger"><span class="fa fa-times"></span> Delete</button></a>
                        @endif                 
                        </td>                          
                    </tr>
                @endforeach
            </table>
                  <div class="pagination">
                {{ $festivals->appends($filters)->links() }}
                  </div>

            <form method="get" action="/home">

                    <label for="search"><b>Search</b></label>
                    <input class="login" type="search" placeholder="Search..." name="search" > <br />
                    <button class="myButton" type="submit">Submit</button> 
                    <a href="/home"><button class="myButton">Reset search</button></a><br/>

            </form>
          </div>
          <div class="festivalsMapContainer col-lg-6 col-md-12 col-sm-12 col-xs-12" >
            <div id="festivalsMap"></div>
            <span class="address"></span>
          </div>
         
<script>

    $(function(){
      initializeMap();
    });

    function initializeMap() 
    {
      var fromProjection = new OpenLayers.Projection("EPSG:4326"); // transform from WGS 1984
      var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
      var extent = new OpenLayers.Bounds(18.38,43.82,18.44,43.88).transform(fromProjection,toProjection);

        var options = {
          restrictedExtent : extent,
          controls: [
            new OpenLayers.Control.Navigation(),
            new OpenLayers.Control.PanZoomBar(),
            new OpenLayers.Control.Attribution()
          ]
        };

      map = new OpenLayers.Map("festivalsMap", options);
      map.addLayer(new OpenLayers.Layer.OSM());
      map.zoomToMaxExtent();
    }

    function showMarker(longitude, latitude, address)
    {

      $("#festivalsMap").empty();

      var fromProjection = new OpenLayers.Projection("EPSG:4326"); // transform from WGS 1984
      var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
      var extent = new OpenLayers.Bounds(18.38,43.82,18.44,43.88).transform(fromProjection,toProjection);

        var options = {
          restrictedExtent : extent,
          controls: [
            new OpenLayers.Control.Navigation(),
            new OpenLayers.Control.PanZoomBar(),
            new OpenLayers.Control.Attribution()
          ]
        };

      map = new OpenLayers.Map("festivalsMap", options);
      map.addLayer(new OpenLayers.Layer.OSM());
      map.zoomToMaxExtent();

      var lonLat = new OpenLayers.LonLat(longitude, latitude)
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject()// to Spherical Mercator Projection
            
          );

          var markers = new OpenLayers.Layer.Markers( "Markers" );
          map.addLayer(markers);
          markers.addMarker(new OpenLayers.Marker(lonLat));

          $(".address").text(address);

    }


    $(".showMap").on("click", function(){
      var longitude = $(this).attr("longitude");
      var latitude = $(this).attr("latitude");
      var address = $(this).attr("address");
      
      showMarker(longitude, latitude, address);

    });
    

    </script>


   




@endsection

 