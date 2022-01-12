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
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
        </div>
        <script>
            getIncident()
        </script>
    </body>
    <footer>

    </footer>
</html>