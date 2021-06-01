// here we talk to the backend


import {API} from "../../backend"
// API  means = "http://localhost:8000/api/"


//todo: signup
export const signup = (user) => {
    return fetch (`${API}/signup`,{
        // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
        // when ever we pass some header first and foremost we need to have methods
        method: "POST",
        headers : {
            Accept: "application/json",
            "Content-Type" : "application/json",
        },
        body: JSON.stringify(user)
    })
    .then(responce => {
        return responce.json();
    })
    .catch(error => console.log(error))
}




//todo: signin
export const signin = (user) => {
    return fetch (`${API}/signin`,{
        // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
        // when ever we pass some header first and foremost we need to have methods
        method: "POST",
        headers : {
            Accept: "application/json",
            "Content-Type" : "application/json"
        },
        body: JSON.stringify(user)
    })
    .then(response => {
        return response.json();
    })
    .catch(error => console.log(error))
}

// browser doesnot remember json => We have to do something to keep user signed in 
export const authenticate = (data,next) => {
    // typeof window = access the window object
    // If window object is accessible to us. Then access the local storage of the react as a property of set item
    // then set jwt(json web token) to stringify data
    if(typeof window !== "undefined"){
        localStorage.setItem("jwt",JSON.stringify(data))
        next();
    }
}
// this will now set the jwt token if the user is succesfully  signed in



// check if user is signed in or signedout
/**
 * first we check if we can access the window object
 * if we dont get access ==> then user is not authenticated ==> return false
 * else we get window obj ==> local storage  => then we return jwt value
 * so that in the front end we can again check if the token is same as the user token
 * then we return true
 * else false
 */
export const isAuthenticate = () => {
    if(typeof window == "undefined"){
        return false
    }
    if(localStorage.getItem("jwt")){
        return JSON.parse(localStorage.getItem("jwt"))
    }
    else{
        return false
    }
}
// isAuthenticate  returns user information


//todo: signout
// access the object above and remove the jwt token
export const signout = next => {
    if(typeof window !== "undefined"){
        localStorage.removeItem("jwt")
        next();
    }
    // once this is removed remove the user
    return fetch(`${API}/signout`,{
        method: "GET"
    })
    .then(responce => console.log("successfully signed Out"))
    .catch(error => console.log(error))
}