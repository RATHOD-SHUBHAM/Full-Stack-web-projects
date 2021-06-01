import {API} from "../../backend";


//todo : connect to category in my backend 

export const createCategory = (userId,token,category) =>{
    // route should be same as backend
    return fetch (`${API}/category/create/${userId}`,{
        // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
        // when ever we pass some header first and foremost we need to have methods
        method: "POST",
        headers : {
            Accept: "application/json",
            "Content-Type" : "application/json",
            Authorization : `Bearer ${token} `
        },
        body: JSON.stringify(category)
    })
    .then(responce => {
        return responce.json();
    })
    .catch(error => console.log(error))
}

//todo  =================================================================================================================================


//todo : connect to product in my backend
// for product we also need to show to admin the categories, becuase each product belong to a specific category 

//todo - C
// create - product
export const createProduct = (userId, token, product) => {
    return fetch(`${API}/product/create/${userId}`, {
      method: "POST",
      headers: {
        Accept: "application/json",
        Authorization: `Bearer ${token}`
      },
      body: product
    })
      .then(response => {
        return response.json();
      })
      .catch(err => console.log(err));
  };



// ----------------------------------------------------------------------------------------------------------------------------------
//todo - R
// get - all - categories

// we cant just pass the category name ==> remember in postman we pass the category objectid asscociated with the category
// and in product we define type of category as a objectId
// in cateogry. we have created a route to get all categories
export const getAllCategory = () => {
    // route should be same as backend
    return fetch (`${API}/categories`,{
        // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
        // when ever we pass some header first and foremost we need to have methods
        method: "GET"
    })
    .then(responce => {
        // console.log("Get all category API is making a call to BE: ",responce);
        return responce.json();
    })
    .catch(error => console.log(error));
}



// ----------------------------------------------------------------------------------------------------------------------------------

// get - all - products

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


// ----------------------------------------------------------------------------------------------------------------------------------

// get - single - product
export const getAProducts = (productId) =>{
    // route should be same as backend
    return fetch (`${API}/product/${productId}`,{
        // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
        // when ever we pass some header first and foremost we need to have methods
        method: "GET",
    })
    .then(response => {
        return response.json();
    })
    .catch(error => console.log(error))
}

// ----------------------------------------------------------------------------------------------------------------------------------

// todo - U
// update product
export const updateProduct = (productId,userId,token,product) =>{
    // route should be same as backend
    return fetch (`${API}/product/${productId}/${userId}`,{
        // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
        // when ever we pass some header first and foremost we need to have methods
        method: "PUT",
        headers : {
            Accept: "application/json",
            Authorization : `Bearer ${token}`
        },
        //todo: check this out
        // body: JSON.stringify(product)
        body: product
    })
    .then(response => {
        return response.json();
    })
    .catch(error => console.log(error))
}

// ----------------------------------------------------------------------------------------------------------------------------------

// todo - D

export const deleteProduct = (productId,userId,token) =>{
    // route should be same as backend
    return fetch (`${API}/product/${productId}/${userId}`,{
        // body: JSON.stringify(user)  --> this wont work. it expects us to pass some header
        // when ever we pass some header first and foremost we need to have methods
        method: "DELETE",
        headers : {
            Accept: "application/json",
            Authorization : `Bearer ${token}`
        }
    })
    .then(response => {
        return response.json();
    })
    .catch(error => console.log(error))
}