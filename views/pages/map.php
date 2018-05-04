

<div id="map" style="height:550px;width:100%;"></div>

<div class="legend" style="margin-bottom:10%">
  <img style="float:left" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png"  width="25" alt="">
  <p style="font-size:1.5em;" >Lieux</p >
  <img style="float:left" src="https://maps.google.com/mapfiles/kml/shapes/earthquake.png" width="35"  alt="">
  <p style="font-size:1.5em;" >Travaux</p >
</div>
<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
<script type="text/javascript">
  function initMap() {
    var center = {lat: 50.8455124, lng: 4.3552839};
     window.map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: center
    });
    var marker = new google.maps.Marker({
      position: center,
      map: map
    });

    $.ajax({
      url:'https://api.irisnetlab.be:443/api/happyears/0.1.0/places',
      headers:{
        Authorization:'Bearer 1e3ae766-abfc-361a-8f29-032e4d6cf8c5',
        Accept:"application/json"
      }
    }).done(function (data) {
      console.log(data);
      for (coord of data.features) {
        console.log(coord.geometry.coordinates);
        console.log({lat: coord.geometry.coordinates[1], lng: coord.geometry.coordinates[0]});
        var marker = new google.maps.Marker({
          position: {lat: parseFloat(coord.geometry.coordinates[1]), lng: parseFloat(coord.geometry.coordinates[0])},
          map: window.map
        });
        marker.addListener('click', function(truc) {
          console.log("click",this);
          var lat =truc.latLng.lat();
          var lng=truc.latLng.lng()
          window.location.href="/?page=lieux&lat="+lat+"&lng="+lng;
        });

      }
    });
    //traveaux
    $.ajax({
      url:'data-mobility.brussels.json',
    }).done(function (data) {
      console.log(data);
      for (coord of data.features) {
        console.log(coord.geometry.coordinates);
        console.log({lat: coord.geometry.coordinates[1], lng: coord.geometry.coordinates[0]});
        var marker = new google.maps.Marker({
          position: {lat: parseFloat(coord.geometry.coordinates[1]), lng: parseFloat(coord.geometry.coordinates[0])},
          map: window.map,
          icon:'https://maps.google.com/mapfiles/kml/shapes/'+'earthquake.png'
        });
      }
    });
  }



</script>

 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH957nUQiCtu1McwPxpBbx9ABbBu4aXdg&callback=initMap">
</script>


