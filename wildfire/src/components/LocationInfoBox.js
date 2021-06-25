import React from 'react'

const LocationInfoBox = ({info}) => {
    return (
        <div className = "location-info">
            <h1>Location Info</h1>
            <ul>
                <li>
                    ID: <strong>{info.id}</strong>
                </li>
                <li>
                    Title: <strong>{info.title}</strong>
                </li>
            </ul>
        </div>
    )
}
//  export to map 
export default LocationInfoBox
