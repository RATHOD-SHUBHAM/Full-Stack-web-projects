//todo:  adding item to the cart
// when ecerything is done, hand over to call back

export const addItemToCart = (item, next) => {
    let cart = [];
    // typeof window = access the window object
    // If window object is accessible to us. Then access the local storage of the react as a property of set item
    if (typeof window !== undefined) {
        // if there is any cart then parse local storage
      if (localStorage.getItem("cart")) {
        cart = JSON.parse(localStorage.getItem("cart"));
      }
      // once we get all the cart push it from local to actual cart
      cart.push({
        ...item,
        //pushing each item to dirrent count rether than storing everything repeatedly
        count: 1
      });
      // set item with name of cart
      localStorage.setItem("cart", JSON.stringify(cart));
      next();
    }
  };
  



  //todo : load item into the cart
  export const loadCart = () => {
    if (typeof window !== undefined) {
      if (localStorage.getItem("cart")) {
          // insted of storing .. just return
        return JSON.parse(localStorage.getItem("cart"));
      }
    }
  };
  




  //todo:  remove item to the cart
  export const removeItemFromCart = productId => {
    let cart = [];
    if (typeof window !== undefined) {
      if (localStorage.getItem("cart")) {
        cart = JSON.parse(localStorage.getItem("cart"));
      }
      // loop through cart and if product id matches remove it
      cart.map((product, index) => {
        if (product._id === productId) {
            // splice will remove the product
            // The splice() method adds/removes items to/from an array, and returns the removed item(s)
          cart.splice(index, 1);
        }
      });
      // update the cart
      localStorage.setItem("cart", JSON.stringify(cart));
    }
    return cart;
  };




  // todo: once the payment or order is placed we will clear the cart.
  export const cartEmpty = next => {
    if (typeof window !== undefined) {
      localStorage.removeItem("cart");
      let cart = [];
      localStorage.setItem("cart", JSON.stringify(cart));
      next();
    }
  };
  