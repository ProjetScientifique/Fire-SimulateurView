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

        <script src="js/script.js"></script>
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
            <script>
            /**Appel API */
            incidents = getIncidents()
            detecteurs = getDetecteurs()
            console.log(incidents)
            /**Parse tableau */
            tbody = document.getElementsByTagName("tbody")[0]

            incidents.forEach(incident => {
                className = incident['type_status_incident']['nom_type_status_incident'].replace(" ";"_")
                nomRue = incident['type_incident']['nom_type_incident']
                latitude = incident['latitude_incident']
                longitude = incident['longitude_incident']
                intensite = incident['intensite_incident']
                ligne = `
                <tr class='${className}'>
                    <td>${nomRue}</td>
                    <td>${latitude}, ${longitude}</td>
                    <td class='intensite'>${intensite}</td>
                </tr>
                `
                tbody.innerHTML = tbody.innerHTML + ligne
            });
            </script>
        </div>
        
    </body>
    <footer>

    </footer>
</html>