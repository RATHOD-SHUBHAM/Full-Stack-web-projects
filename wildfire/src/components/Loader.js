import React from 'react'
//  import spinner gif
import spinner from './spinner.gif'

const Loader = () => {
    return (
        <div className = "loader">
            {/* just want to display the image  */}
            <img src = {spinner} alt = "loading" />
            <h1> Fetching Data</h1>
        </div>
    )
}

export default Loader
