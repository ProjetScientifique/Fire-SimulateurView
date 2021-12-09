/*A METTRE DANs UN FICHIER*/
//45.754154744767455, 4.864503340336376
const mapbox_token = "pk.eyJ1IjoidGVsbGVibWEiLCJhIjoiY2tuaXdleTY3MHM2dzJucGdpbGxsOXA3aCJ9.Lv06-rCdI3y9m0nC_0bWsg";
var map = L.map('mapbox').setView([45.75415, 4.8645033], 12.5);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: '',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: mapbox_token
}).addTo(map);

//Si possible voir pour mettre en gris les villes non prise en charge
//https://github.com/mmaciejkowalski/L.Highlight

/*DEFINE IMAGES*/
function iconNiveau(niveau) {
    return iconNiveau = L.icon({
        iconUrl: `img/feu-Niv-${niveau}.png`,
        iconSize:     [35,60],//[35, 60], // size of the icon
        iconAnchor:   [22, 59], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
}

var iconCamionPompier = L.icon({
    iconUrl: 'img/camion.png',
    iconSize:     [50,50],//[35, 60], // size of the icon
    iconAnchor:   [22, 49], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

var iconPointEau = L.icon({
    iconUrl: 'img/eau.png',
    iconSize:     [30,30],//[35, 60], // size of the icon
    iconAnchor:   [22, 29], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


/*GET MARKER AUTOMATICLY IN JS BY API AT WEB SERVICE.  */

/*ADD A MARKER*/
var latitude =  45.7596
var longitude = 4.8523
var adresse = "Lyon Part Dieu"
var zoom = 15
var niveau = 4
var marker = L.marker([latitude, longitude],{icon:iconNiveau(niveau)}).addTo(map);
marker.bindPopup(`Incendie de Niveau ${niveau} </br><a href="https://www.google.fr/maps/@${latitude},${longitude},${zoom}z">Coordonnées : ${latitude}, ${longitude}</a></br>${adresse}`)


var latitude =  45.77792
var longitude = 4.88204646
var adresse = "Villeurbanne"
var zoom = 15
var nombre_de_pompier = 25
var marker = L.marker([latitude, longitude],{icon:iconCamionPompier}).addTo(map);
marker.bindPopup(`Camion de pompier ${nombre_de_pompier} </br>Se dirige sur le lieu de l'incendie.`)

var latitude =  45.74792
var longitude = 4.83204646
var adresse = "Lyon "
var zoom = 15
var niveau = 2
var marker = L.marker([latitude, longitude],{icon:iconPointEau}).addTo(map);
marker.bindPopup(`Point d'eau </br><a href="https://www.google.fr/maps/@${latitude},${longitude},${zoom}z">Coordonnées : ${latitude}, ${longitude}</a></br>${adresse}`)


