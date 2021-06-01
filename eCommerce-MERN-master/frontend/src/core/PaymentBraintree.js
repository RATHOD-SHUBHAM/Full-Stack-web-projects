import React, { useState, useEffect } from "react";
import { cartEmpty } from "./helper/CartHelper";
import { getmeToken, processPayment } from "./helper/PaymentHelper";
import { createOrder } from "./helper/CoreOrder";
import { isAuthenticate } from "../auth/helper/index";

import DropIn from "braintree-web-drop-in-react";

const PaymentBraintree = ({ products, setReload = f => f, reload = undefined }) => {

  const [info, setInfo] = useState({
    loading: false,
    success: false,
    clientToken: null, //this should be null, and not empty ==> cause the value which is going to be returned is pretty huge
    error: "",
    // instance will get filled automatically
    instance: {}
  });

  const userId = isAuthenticate() && isAuthenticate().user._id;
  const token = isAuthenticate() && isAuthenticate().token;

  const getToken = (userId, token) => {
      // info and responce are interchangable
    getmeToken(userId, token).then(info => {
      console.log("INFORMATION", info);
      if (info.error) {
        setInfo({ ...info, error: info.error });
      } else {
        const clientToken = info.clientToken;
        setInfo({ clientToken });
      }
    });
  };


  useEffect(() => {
    getToken(userId, token);
  }, []);



  const showbraintreedropIn = () => {
    return (
      <div>
        {info.clientToken !== null && products.length > 0 ? (
          <div>
            {/* from braintree-web-drop-in-react docs */}
            <DropIn
              options={{ authorization: info.clientToken }}
              onInstance={instance => (info.instance = instance)}
            />
            <button className="btn btn-block btn-success" onClick={onPurchase}>
              Buy
            </button>
          </div>
        ) : (
          <h3 className="text-center text-primary">Add something to cart</h3>
        )}
      </div>
    );
  };



  const onPurchase = () => {
    setInfo({ loading: true });
    let nonce;
    //API talks to brain tree and gets the instance/nonce from braintree
    // docs = braintree
    // Configure your button to call requestPaymentMethod to retrieve the payment method object, including the payment method nonce. From there, you can submit the nonce to your server in whatever way you see fit.
    let getNonce = info.instance
    .requestPaymentMethod()
    .then(data => {
      nonce = data.nonce;
      const paymentData = {
        paymentMethodNonce: nonce,
        // calculate the amount to charge
        amount: getAmount()
      };


      // make a payment using our api
      processPayment(userId, token, paymentData)
        .then(response => {
          setInfo({ ...info, success: response.success, loading: false });
          console.log("PAYMENT SUCCESS");


          // we are creating our order list
          const orderData = {
            products: products,
            transaction_id: response.transaction.id,
            amount: response.transaction.amount
          };
          
          createOrder(userId, token, orderData);
          cartEmpty(() => {
            console.log("Did we crash?");
          });

          setReload(!reload);
        })
        .catch(error => {
          setInfo({ loading: false, success: false });
          console.log("PAYMENT FAILED");
        });
    });
  };

  const getAmount = () => {
    let amount = 0;
    products.map(product => {
      amount = amount + product.price;
    });
    return amount;
  };

  return (
    <div>
      <h3 className="text-center text-warning">Your bill is {getAmount()}$</h3>
      {showbraintreedropIn()}
    </div>
  );
};

export default PaymentBraintree;
