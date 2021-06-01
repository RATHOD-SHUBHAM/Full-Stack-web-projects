import React, {useState} from 'react'
import { addItemToCart,removeItemFromCart } from './helper/CartHelper';
import ImageHelper from './helper/ImageHelper';
import { Redirect } from "react-router-dom";

const Card = ({
    product,
    addToCart = true,
    removeFromCart = false, 
    // this can be written as
    //setReload = function(f){return f}
    setReload = f => f,
    reload = undefined
}) => {

    const cartTitle = product ? product.name : "Product Pic";
    const cartDescrption = product ? product.description : "Our Product will looklike this";
    const cartPrice = product ? product.price : "DEFAULT";


    const [redirect, setRedirect] = useState(false)
    const [count, setCount] = useState(product.count)


    // todo: button to show add to cart option
    const methodaddToCart = (addToCart) => {
        return(
            addToCart && (
                <button
                    onClick={addItemToCartPage}
                    className="btn btn-block btn-outline-success mt-2 mb-2"
                >
                    Add to Cart
                </button>
            )
        )
    }

    // todo: button to show delete from cart option
    const methodremoveFromCart = (removeFromCart) => {
        return (
            removeFromCart && (
                <button
                    onClick={ () => {
                            removeItemFromCart(product._id)
                            // just flip=> what ever you saved unsave it and return
                            setReload(!reload);
                        }
                    }
                    className="btn btn-block btn-outline-danger mt-2 mb-2"
                >
                    Remove from cart
                </button>
            )
        )
    }


    //todo :  redirect
    const getAredirect = (redirect) => {
        if(redirect) {
            return <Redirect to = "/cart" />
        }
    }


    // todo: method to add item to cart\
    const addItemToCartPage = () => {
        addItemToCart(product, () => setRedirect(true));
      };


    return (
        <div className="card text-white bg-dark border border-info mt-2">
            <div className="card-header fw-bold pt-4 lead">
                {cartTitle}
            </div>
            <div className="card-body">
                <ImageHelper product = {product}/>
                <p className="lead bg-success font-weight-normal text-wrap mt-3">
                    {cartDescrption}
                </p>
                <p className="btn btn-success rounded  btn-sm px-4">{cartPrice}$</p>
                <div className="row">
                    <div className="col-12">
                        {methodaddToCart(addToCart)}
                    </div>
                    <div className="col-12">
                        {methodremoveFromCart(removeFromCart)}
                    </div>
                </div>
                {getAredirect(redirect)}
            </div>
        </div>
    );
}

export default Card
