/**
 * Created by JetBrains PhpStorm.
 * User: Gaetano Esposito
 * Date: 27/04/11
 * Time: 15.33
 * To change this template use File | Settings | File Templates.
 */
var geocoder;
var toLatValue;
var toLngValue;
var div_percorso;
var zoom;
var marker_showed;
var markerLat;
var markerLng;
var markerInfo;

function initialize(div_id_map, div_id_percorso, latitudine, longitudine, info) {

    if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("mappa"));
        div_percorso = document.getElementById(div_id_percorso);
        markerLat = latitudine;
        markerLng = longitudine;
        markerInfo = info;
        zoom = 16;
        var latlng = new GLatLng(markerLat, markerLng);
        marker_showed = false;
        gdir = new GDirections(map, div_percorso);
        geocoder = new GClientGeocoder();
        map.setCenter(latlng, zoom);
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        GEvent.addListener(gdir, "error", handleErrors);
        mostraMarker();
        geocoder = new GClientGeocoder();
    }
}

function mostraMarker(){
    var latlng = new GLatLng(markerLat, markerLng);

    if(!marker_showed){

        var latlngatt = new GLatLng(markerLat, markerLng);
        var mar = createMarker(latlngatt, 0, markerInfo)
        map.addOverlay(mar);
        mar.openInfoWindowHtml(markerInfo);
        marker_showed = true;
    }

    map.setCenter(latlng, zoom);
}

function showDirection(){

    var fromStato = document.getElementById("fd_stato");
    var fromProvincia = document.getElementById("fd_provincia");
    var fromComune = document.getElementById("fd_comune");
    var fromVia = document.getElementById("fd_via");
    toLatValue = markerLat;
    toLngValue = markerLng;

    var address = fromVia.value + ", " + fromComune.value + ", " + fromProvincia.value +", " + fromStato.value;
    geocoder.getLocations(address, showDirection2);

}
function showDirection2(response){
    map.clearOverlays();
    if (!response || response.Status.code != 200) {
        alert("Impossibile trovare l\'indirizzo specificato.");
        marker_showed = false;
        mostraMarker();
    }else{

        place = response.Placemark[0];
        fromPoint = new GLatLng(place.Point.coordinates[1], place.Point.coordinates[0]);
        toPoint = new GLatLng(toLatValue, toLngValue);
        setDirections2(fromPoint, toPoint);

    }
}

function setDirections2(fromAddress, toAddress) {
    var arr = new Array();
    arr[0] = fromAddress;
    arr[1] = toAddress;
    gdir.loadFromWaypoints(arr, {"locale" : "it"});
    marker_showed = false;
}

function createMarker(point,number, string) {
    var marker = new GMarker(point);
    GEvent.addListener(marker, "click", function() {
        marker.openInfoWindowHtml(string);
    });
    return marker;
}
function showAddress(address) {
    if (geocoder) {
        geocoder.getLatLng(
                address,
                function(point) {
                    if (!point) {
                        alert(address + " not found");
                    } else {
                        map.setCenter(point, 15);
                        var marker = new GMarker(point);
                        map.addOverlay(marker);
                        marker.openInfoWindowHtml(address);
                    }
                }
                );
    }
}

function cancella_percorso(){
    gdir.clear();
    mostraMarker();
}

function handleErrors(){
    if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS){
        alert("No corresponding geographic location could be found for one of the specified addresses. This may be due to the fact that the address is relatively new, or it may be incorrect.\nError code: " + gdir.getStatus().code);

    }else if (gdir.getStatus().code == G_GEO_SERVER_ERROR){
        alert("A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.\n Error code: " + gdir.getStatus().code);

    }else if (gdir.getStatus().code == G_GEO_MISSING_QUERY){
        alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.\n Error code: " + gdir.getStatus().code);

    }else if (gdir.getStatus().code == G_GEO_BAD_KEY){
        alert("The given key is either invalid or does not match the domain for which it was given. \n Error code: " + gdir.getStatus().code);

    }else if (gdir.getStatus().code == G_GEO_BAD_REQUEST){
        alert("A directions request could not be successfully parsed.\n Error code: " + gdir.getStatus().code);

    }else {
        alert("An unknown error occurred.");

    }
    mostraMarker();
}