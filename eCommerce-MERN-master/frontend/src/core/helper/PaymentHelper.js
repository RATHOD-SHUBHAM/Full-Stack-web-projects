import { API } from "../../backend";


// this is to get the token
export const getmeToken = (userId, token) => {
  return fetch(`${API}/payment/gettoken/${userId}`, {
    method: "GET",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
      Authorization: `Bearer ${token}`
    }
  })
    .then(response => {
      return response.json();
    })
    .catch(err => console.log(err));
};



// make the payment
export const processPayment = (userId, token, paymentInfo) => {
    //paymentInfo is the amount
  return fetch(`${API}/payment/tobraintree/${userId}`, {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
      Authorization: `Bearer ${token}`
    },
    body: JSON.stringify(paymentInfo)
  })
    .then(reponse => {
      return reponse.json();
    })
    .catch(err => console.log(err));
};
