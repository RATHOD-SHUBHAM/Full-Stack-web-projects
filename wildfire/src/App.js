import Map from './components/Map'
import {useState, useEffect } from 'react'

// import loader

import Loader from './components/Loader'

import Header from './components/Header'



function App() {
  const [eventData, seteventData] = useState([])
  const [loading, setloading] = useState(false)


  useEffect(()=>{
    const fetchEvents = async () => {
      setloading(true)
      const res = await fetch('https://eonet.sci.gsfc.nasa.gov/api/v2.1/events')
      const { events } = await res.json() // pullin out only event from the entire json using destructuring
      
      
      seteventData( events )
      setloading(false)
    }

    // function call
    fetchEvents()

    console.log(eventData)

  },[]) // empty dependency array

  return (
    <div className="App">
      {/* <Map></Map> */}
      <Header/>
      {!loading ? <Map eventData = {eventData}/> : <Loader/>}
    </div>
  );
}

export default App;




