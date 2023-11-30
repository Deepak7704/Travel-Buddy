mapboxgl.accessToken = 'pk.eyJ1IjoiZGVlcGFrNzcwNCIsImEiOiJjbG5uYTBtb3kwNDlzMnFwMDN2dWMwMXN0In0.o9JKdqLx8_IIhZMb9syirQ';
navigator.geolocation.getCurrentPosition(sucessLocation,errorLocation,{
    enableHighAccuracy:true
});
function sucessLocation(position){
    setupMap([position.coords.longitude,position.coords.latitude]);
}
function errorLocation(){
    setupMap([20.5937, 78.9629])
}
function setupMap(center){
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center:center,
        zoom:15
    });
    const nav=new mapboxgl.NavigationControl();
    map.addControl(nav);
    var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken,
      });
      
      map.addControl(directions, 'top-left');
    
}