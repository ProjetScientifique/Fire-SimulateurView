


function updateall(map){
    console.log("carte update")
    /**Appel API */
    incidents = getIncidents()

    /**Parse tableau */
    tbody = document.getElementsByTagName("tbody")[0]
    tbody.innerHTML = ""
    incidents.forEach(incident => {
        intensite = incident['intensite_incident']
        if (intensite != 0){
            //class Name = partie emergency.
            /*className = incident['type_status_incident']['nom_type_status_incident']*//*.replace(" ";"_")*/
            nomRue = incident['type_incident']['nom_type_incident']
            latitude = incident['latitude_incident']
            longitude = incident['longitude_incident']
            /**class='${className} */
            ligne = `
            <tr>
                <td>${nomRue}</td>
                <td>${latitude}, ${longitude}</td>
                <td class='intensite'>${intensite}</td>
            </tr>
            `
            tbody.innerHTML = tbody.innerHTML + ligne
        }
    });
    /*GET MARKER AUTOMATICLY IN JS BY API AT WEB SERVICE.  */

    /**apres avoir recu les resultat des api ... in efface les markeurs  */
     map.eachLayer(function (layer) { 
        if (layer.options.name === 'incident') {
            map.removeLayer(layer) 
        }
    });
    

    incidents.forEach(incident => { 
        if (intensite != 0){
            var latitude =  incident['latitude_incident'] //coord lat
            var longitude = incident['longitude_incident'] //coord long
            var date_incident = Date(incident['date_incident']) //date apparition
            var intensite = incident['intensite_incident'] //1 à 100
            var type_incident  = incident['type_incident']['nom_type_incident'] // prit en charge (incendie) 
            var intensite_1_a_3 = Math.round(parseInt(intensite)/10*2)+1
        
            //Ajout du marker: avec une image (type_incident, et une intensité de 1 à 3.
            var marker = L.marker([latitude, longitude],{icon:iconNiveau(type_incident,intensite_1_a_3)}).addTo(map);
            marker.bindPopup(`
                <h1 class="title">${type_incident} de Niveau ${intensite}</h1>
                <h2 class="date_incident">${date_incident.toLocaleString('fr-FR', { timeZone: 'UTC' })}</h2>
                <a href="https://www.google.fr/maps/@${latitude},${longitude},15z">
                <b>Coordonnées</b> : lat:${latitude}, long:${longitude}</br></br>
                </a></br>
            `)
            
            marker.options.name = "incident"
        }
        

    });
}