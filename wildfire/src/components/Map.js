import React from 'react'
import GoogleMapReact from 'google-map-react';

// bring location marker 
import LocationMarker from './LocationMarker';

// bring location info
import LocationInfoBox from './LocationInfoBox';
import { useState } from 'react';

// // google map react takes two props center and zoom
const Map = ({eventData, center,zoom}) => {

    const NATURAL_EVENT_WILDFIRE = 8;
    //location info

    const [locationInfo, setlocationInfo] = useState(null)

    // loop through the event data
    const marker = eventData.map((ev, index) => {
        //  first check if this is a wildfire
        if(ev.categories[0].id === NATURAL_EVENT_WILDFIRE){
            return <LocationMarker 
                key = {index}
                lat = {ev.geometries[0].coordinates[1]} 
                lng = {ev.geometries[0].coordinates[0]}

                // this is for location info

                onClick={() => setlocationInfo({id:ev.id, title: ev.title})}
            /> 
        }
        return null
    })

    
    return (
        //  index.css will have .maps
        <div className="map">
            <GoogleMapReact
                bootstrapURLKeys={{ key: 'AIzaSyDKq--u-QNNhKCl4ZCzHKTJGRzb-wGlsoo' }}
                defaultCenter={center}
                defaultZoom={zoom}
            >
               {marker}
            </GoogleMapReact>
            {/* we have to say when the on click is true then show the location info box component */}
            {locationInfo && <LocationInfoBox info = {locationInfo}/>}
        </div>
    )
}



// setting default props
Map.defaultProps = {
    center: {
      lat: 49.237794,
      lng: -25.054468
    },
    zoom: 3
  };


// send this component to APP
export default Map
