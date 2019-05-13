function initMap() {
  
  var harthouse = {lat: 48.7859, lng: 7.734370000000013};
  
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: harthouse});
  
  var marker = new google.maps.Marker({position: harthouse, map: map});
}

