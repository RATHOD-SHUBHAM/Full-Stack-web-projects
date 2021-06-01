import React, { useState, useEffect } from "react";
// import "../App.css";
// import { API } from "../backend";
import Base from "./Base";
import Card from "./Card";
import { loadCart } from "./helper/CartHelper";
import PaymentBraintree from "./PaymentBraintree"

const Cart = () => {
  const [products, setProducts] = useState([]);

  // //todo: once the cart item are deleted we forcefull reload the page
  const [reload, setReload] = useState(false);

  useEffect(() => {
    setProducts(loadCart());
  }, [reload]);



  // //todo: This section is to load products
  const loadAllProducts = products => {
    return (
        <div>
            {products.map((product, index) => (
                <Card
                    key={index}
                    product={product}
                    removeFromCart={true}
                    addToCart={false}
                    setReload={setReload}
                    reload={reload}
                />
            ))}
        </div>
    );
  };


  return (
    <Base title="Your Cart" description="Ready to checkout">
      <div className="row text-center">
        <div className="col-4 ">
          {products.length > 0 ? (
            loadAllProducts(products)
          ) : (
            <h4>No products</h4>
          )}
        </div>
        <div className="col-6">
          <PaymentBraintree products={products} setReload={setReload} />
        </div>
      </div>
    </Base>
  );
};

export default Cart;
