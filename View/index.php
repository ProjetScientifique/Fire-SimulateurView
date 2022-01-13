<!DOCTYPE html>
<html>
    <head>
        <title>Service d'Urgence 🚒</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css"/>

        <script src="js/script.js"></script>
        <script src="js/updater.js"></script>

    </head>
    <body>
        
        <div id="main">
            <div id="tableau-arrive">
                <div class="titre"><h1>Liste des Evenements</h1></div>
                <div id ="tableau" >
                    <table>
                        <thead>
                            <tr>
                                <th>Rue</th>
                                <th>Intensité</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div id="map">
                <div class="titre"><h1>Carte des incidents</h1></div>
                <div id="mapbox"></div>
            </div>
            <script type="text/javascript">
            
            /* –––––––––––– Génére la map –––––––––––– */
            const mapbox_token = "pk.eyJ1IjoidGVsbGVibWEiLCJhIjoiY2tuaXdleTY3MHM2dzJucGdpbGxsOXA3aCJ9.Lv06-rCdI3y9m0nC_0bWsg";
            var map = L.map('mapbox').setView([45.75415, 4.8645033], 12.5);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: '',
                maxZoom: 18,
                id: 'mapbox/streets-v11', //fuck it. 
                tileSize: 512,
                zoomOffset: -1,
                accessToken: mapbox_token
            }).addTo(map);

            //Si possible voir pour mettre en gris les villes non prise en charge
            //https://github.com/mmaciejkowalski/L.Highlight

            //Containeurs avec tous les markeurs:

            
            /* ––––––––––––DEFINE IMAGES––––––––––––*/
            function iconNiveau(type,niveau) {
                return L.icon({
                    iconUrl: `img/${type}-${niveau}.png`,   
                    iconSize:     [35,60],//[35, 60], // size of the icon
                    iconAnchor:   [22, 59], // point of the icon which will correspond to marker's location
                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                });
            }

            //todo mettre sous forme de fonction comme iconNiveau??
            //camion de pompier, sera utilisé dans la partie réel. 
            var iconCamionPompier = L.icon({
                iconUrl: 'img/camion.png',
                iconSize:     [35,35],//[35, 60], // size of the icon
                iconAnchor:   [22, 49], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            //Caserne
            var iconCaserne = L.icon({
                iconUrl: 'img/caserne.png',
                iconSize:     [50,50],//[35, 60], // size of the icon
                iconAnchor:   [22, 29], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            //Detecteur
            var iconDetecteur = L.icon({
                iconUrl: 'img/detecteur.png',
                iconSize:     [25,25],//[35, 60], // size of the icon
                iconAnchor:   [22, 29], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            
            updateall(map)
            setTimeout(function(){
            updateall(map)

            }, 5000);
        </script>
        </div>
        
    </body>
    <footer>

    </footer>
</html>