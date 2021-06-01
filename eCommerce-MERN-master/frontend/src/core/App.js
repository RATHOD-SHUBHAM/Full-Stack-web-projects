import React, {useState, useEffect} from "react";
import "../../src/App.css"
// import {API} from "../backend"
import Base from "./Base"
import Card from "./Card";
import { getAllProducts } from "./helper/CoreApiCall";



function App() {

  const [products, setProducts] = useState([])
  const [error, setError] = useState(false)


  const loadAllProduct = () => {
    getAllProducts().then(data => {
      console.log(data)
      if (data.error) {
        setError(data.error);
      } else {
        setProducts(data);
      }
    });
  };

  useEffect(() => {
    loadAllProduct();
  }, []);






  return (
    <Base  title = "Welcome to Shoppify" description = "View all Products">
       <div className="row text-center">
        <div className="row">
          {/* map will give a call back */}
          {products.map((product, index) => {
            return (
              <div key={index} className="col-4 mb-4">
                <Card product={product} />
              </div>
            );
          })}
        </div>
      </div>
    </Base>
  );
}


export default App;


