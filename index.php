<?php 
    require_once('API.php');
    
    $TOKEN = '449928d774153132c2c3509647e3d23f8e168fb50660fa27dd33c8342735b166';
    $skip = 0;
    $limit = 100;
    /**
     * RECUPERATION DES EVENEMENTS
     * API-doc :
     *      html://127.0.0.1/docs 
     */
    $incidents = (new API())->getIncident($TOKEN,$skip,$limit);
    $json_incidents=json_decode($incidents,TRUE);
?>
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
        <link rel="stylesheet" href="css/style.css"/>
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
                            
                            <?php 

                                foreach ($json_incidents as $incident) {
                                    echo("<tr><td>".$incident['latitude_incident']." - ".$incident['longitude_incident']."</td><td class='intensite'>".$incident['intensite_incident']."</td></tr>\n");
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div id="map">
                <div class="titre"><h1>Carte</h1></div>
                <div id="mapbox"></div>
            </div>
            
        </div>
        <script type="text/javascript">
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
            function iconNiveau(type,niveau) {
                return L.icon({
                    iconUrl: `img/${type}-${niveau}.png`,   
                    iconSize:     [35,60],//[35, 60], // size of the icon
                    iconAnchor:   [22, 59], // point of the icon which will correspond to marker's location
                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                });
            }

            //camion de pompier, sera utilisé dans la partie réel. 
            var iconCamionPompier = L.icon({
                iconUrl: 'img/camion.png',
                iconSize:     [50,50],//[35, 60], // size of the icon
                iconAnchor:   [22, 49], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            //point d'eau (peu être utile plus tard.)
            var iconPointEau = L.icon({
                iconUrl: 'img/eau.png',
                iconSize:     [30,30],//[35, 60], // size of the icon
                iconAnchor:   [22, 29], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });


            /*GET MARKER AUTOMATICLY IN JS BY API AT WEB SERVICE.  */

            /*ADD A MARKER*/
            /*
            var latitude =  45.7596
            var longitude = 4.8523
            var adresse = "Lyon"
            var zoom = 15
            var niveau = 4
            var marker = L.marker([latitude, longitude],{icon:iconNiveau(niveau)}).addTo(map);
            marker.bindPopup(`Incendie de Niveau ${niveau} </br><a href="https://www.google.fr/maps/@${latitude},${longitude},${zoom}z">Coordonnées : ${latitude}, ${longitude}</a></br>${adresse}`)
            */
            /*
            var latitude =  45.77792
            var longitude = 4.88204646
            var adresse = "Villeurbanne"
            var zoom = 15
            var nombre_de_pompier = 25
            var marker = L.marker([latitude, longitude],{icon:iconCamionPompier}).addTo(map);
            marker.bindPopup(`Camion de pompier ${nombre_de_pompier} </br>Se dirige sur le lieu de l'incendie.`)
            */

            /*
            var latitude =  45.74792
            var longitude = 4.83204646
            var adresse = "Lyon"
            var zoom = 15
            var niveau = 2
            var marker = L.marker([latitude, longitude],{icon:iconPointEau}).addTo(map);
            marker.bindPopup(`Point d'eau </br><a href="https://www.google.fr/maps/@${latitude},${longitude},${zoom}z">Coordonnées : ${latitude}, ${longitude}</a></br>${adresse}`)
            */


        

            
            //PHP ADD INCIDENTS MARKERS.
            var latitude_incident_array = []
            var longitude_incident_array = []
            //var adresse_array = []
            //var zoom_array = []
            var intensite_incident_array = []
            var date_incident_incident_array = []
            
            //Seulement ID ... Voir ajouter nom. (incendie etc...)
            var type_incident_incident_array = []

            //AUTOMATICLY GENERATED BY PHP
            <?php 
                foreach ($json_incidents as $incident) {
                    echo("latitude_incident_array.push('".$incident['latitude_incident']."');\n");
                    echo("longitude_incident_array.push('".$incident['longitude_incident']."');\n");
                    echo("intensite_incident_array.push('".$incident['intensite_incident']."');\n");
                    echo("date_incident_incident_array.push('".$incident['date_incident']."');\n");
                    echo("type_incident_incident_array.push('".$incident['type_incident']['nom_type_incident']."');\n");
                }
            ?>
            for (let index = 0; index < latitude_incident_array.length; index++) {
                var latitude =  latitude_incident_array[index]
                var longitude = longitude_incident_array[index]
                var adresse = "A TROUVER AVEC UNE API."
                var date_incident = date_incident_incident_array[index]
                var zoom = 15
                var intensite = intensite_incident_array[index]
                var type_incident = type_incident_incident_array[index]
                var intensite_1_a_3 = Math.round(parseInt(intensite)/100*2)+1
                var marker = L.marker([latitude, longitude],{icon:iconNiveau(type_incident,intensite_1_a_3)}).addTo(map);
                marker.bindPopup(`${type_incident} de Niveau ${intensite} </br><a href="https://www.google.fr/maps/@${latitude},${longitude},${zoom}z">Coordonnées : ${latitude}, ${longitude}</a></br>${adresse}</br>${date_incident}`)
            }


            //PHP ADD CASERNES MARKERS.
            var latitude_caserne_array = []
            var longitude_caserne_array = []
            //var adresse_array = []
            //var zoom_array = []
            var nom_caserne_array = []

            //AUTOMATICLY GENERATED BY PHP
            <?php 
                foreach ($json_casernes as $caserne) {
                    echo("latitude_caserne_array.push('".$caserne['latitude_caserne']."');\n");
                    echo("longitude_caserne_array.push('".$caserne['longitude_casernes']."');\n");
                    echo("nom_caserne_array.push('".$caserne['nom_caserne']."');\n");
                }
            ?>
            for (let index = 0; index < latitude_caserne_array.length; index++) {
                var latitude =  latitude_caserne_array[index]
                var longitude = longitude_caserne_array[index]
                var nom = nom_caserne_array[index]
                var adresse = "A TROUVER AVEC UNE API."
                var zoom = 15
                //modifier ca ...........;
                var marker = L.marker([latitude, longitude],{icon:iconNiveau(type_incident,intensite_1_a_3)}).addTo(map);
                marker.bindPopup(`${type_incident} de Niveau ${intensite} </br><a href="https://www.google.fr/maps/@${latitude},${longitude},${zoom}z">Coordonnées : ${latitude}, ${longitude}</a></br>${adresse}</br>${date_incident}`)
            }
            


        </script>
        
   
    </body>
    <footer>

    </footer>
</html>