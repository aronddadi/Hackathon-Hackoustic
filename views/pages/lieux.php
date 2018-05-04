<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
<input type="hidden" id="lat" name="" value="<?php  echo $_GET['lat'] ;?>">
<input type="hidden" id="lng" name="" value="<?php  echo $_GET['lng']; ?>">
<script type="text/javascript">
  console.log($("#lat").val())
  var lat=parseFloat($("#lat").val());
  var lng=parseFloat($("#lng").val());

//   var targetPoint = turf.point([lat, lng], {"marker-color": "#0F0"});
//   var points = turf.featureCollection([
//     turf.point([28.973865, 41.011122]),
//     turf.point([28.948459, 41.024204]),
//     turf.point([28.938674, 41.013324])
//   ]);
//
// var nearest = turf.nearestPoint(targetPoint, points);
  var targetPoint=turf.point([lat, lng], {"marker-color": "#0F0"});
  $.ajax({
    url:'data-mobility.brussels.json',
  }).done(function (data) {
    console.log(data);
    var points=[]
    for (coord of data.features) {
      points.push(turf.point([coord.geometry.coordinates[1],coord.geometry.coordinates[0] ]))
    }
    var pointss=turf.featureCollection(points);
    var nearest = turf.nearestPoint(targetPoint, pointss);
    console.log(nearest);
    var from = targetPoint
    var to = turf.point([-75.534, 39.123]);
    to=nearest.geometry.coordinates
    var options = {units: 'kilometers'};

    var distance = turf.distance(from, to, options);
    console.log(distance);
    $("#trav").innerHTML
    document.getElementById("trav").innerHTML="Travaux à "+Math.round(distance * 100) / 100+" km";
  });
</script>
<div class="theme">
<h4 class="text-center lieux"> Informations sonores </h4>
<img style="float:left" src="https://maps.google.com/mapfiles/kml/shapes/earthquake.png" width="35"  alt="">
<p  id="trav" style="font-size:1.5em;" >Travaux
</p >
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Début</th>
      <th scope="col">Fin</th>
      <th scope="col">Niveau Sonore</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">00:00</td>
      <td>01:00</td>
      <td class="calme">Calme</td>
    </tr>
    <tr>
      <td scope="row">01:00</td>
      <td>02:00</td>
      <td class="calme">Calme</td>
    </tr>
    <tr>
      <td scope="row">02:00</td>
      <td>03:00</td>
      <td class="calme">Calme</td>
    </tr>
    <tr>
      <td scope="row">03:00</td>
      <td>04:00</td>
      <td class="calme">Calme</td>
    </tr>
    <tr>
      <td scope="row">04:00</td>
      <td>05:00</td>
      <td class="calme">Calme</td>
    </tr>
    <tr>
      <td scope="row">05:00</td>
      <td>06:00</td>
      <td class="calme">Calme</td>
    </tr>
    <tr>
      <td scope="row">06:00</td>
      <td>07:00</td>
      <td class="calme">Calme</td>
    </tr>
    <tr>
      <td scope="row">07:00</td>
      <td>08:00</td>
      <td class="normal">Normal</td>
    </tr>
    <tr>
      <td scope="row">08:00</td>
      <td>09:00</td>
      <td class="normal">Normal</td>
    </tr>
    <tr>
      <td scope="row">09:00</td>
      <td>10:00</td>
      <td class="normal">Normal</td>
    </tr>
    <tr>
      <td scope="row">10:00</td>
      <td> 11:00 </td>
      <td class="calme"> Calme </td>
    </tr>
    <tr>
      <td scope="row">11:00</td>
      <td>12:00</td>
      <td class="calme"> Calme</td>
    </tr>
    <tr>
      <td scope="row">12:00</td>
      <td>13:00</td>
      <td class="nuisible"> Nuisible </td>
    </tr>
    <tr>
      <td scope="row">13:00</td>
      <td>14:00</td>
      <td class="normal"> Normal</td>
    </tr>
    <tr>
      <td scope="row">14:00</td>
      <td>15:00</td>
      <td class="normal">Normal</td>
    </tr>
    <tr>
      <td scope="row">15:00</td>
      <td>16:00</td>
      <td class="normal"> Normal </td>
    </tr>
    <tr>
      <td scope="row">16:00</td>
      <td>17:00</td>
      <td class="normal"> Normal </td>
    </tr>
    <tr>
      <td scope="row">17:00</td>
      <td>18:00</td>
      <td class="normal"> Normal </td>
    </tr>
    <tr>
      <td scope="row">17:00</td>
      <td>18:00</td>
      <td class="nuisible"> Nuisible </td>
    </tr>
    <tr>
      <td scope="row normal">19:00</td>
      <td>20:00</td>
      <td class="normal"> Normal</td>
    </tr>
    <tr>
      <td scope="row">20:00</td>
      <td>21:00</td>
      <td class="calme">Normal</td>
    </tr>
    <tr>
      <td scope="row">21:00</td>
      <td>22:00</td>
      <td class="calme"> Calme</td>
    </tr>
    <tr>
      <td scope="row calme">22:00</td>
      <td>23:00</td>
      <td class="calme"> Calme </td>
    </tr>
    <tr>
      <td scope="row">23:00</td>
      <td>23:59</td>
      <td class="calme"> Calme </td>
    </tr>

  </tbody>
</table>

  <p class="text-center infos"> <a href="#"> Plus d'informatins </a> <p>
</div>
