function afficherOuCacherLesMarker(map,arrayMarkerAModifier){
    console.log("ckzancipanpc")
    console.log(arrayMarkerAModifier)
    arrayMarkerAModifier.forEach(marker => {
        if(map.hasLayer(marker)){
            map.removeLayer(marker)
            console.log("remove")
        }
        else {
            map.addLayer(marker)
            console.log("add")
        }
        
    });
    
}