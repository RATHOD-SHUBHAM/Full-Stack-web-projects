import React from 'react'
import { API } from '../../backend'

export const getAllProducts = () =>{
  // route should be same as backend
  return fetch (`${API}/products`,{
      // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
      // when ever we pass some header first and foremost we need to have methods
      method: "GET",
  })
  .then(response => {
      return response.json();
  })
  .catch(error => console.log(error))
}
