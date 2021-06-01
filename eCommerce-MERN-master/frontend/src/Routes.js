import React from 'react'
import {
    BrowserRouter as Router,
    Switch,
    Route,
  } from "react-router-dom";

// Home and app both are same 
import App from './core/App'
import Signin from './user/Signin';
import Signup from './user/Signup';
import Cart from "./core/Cart"
// admin route and private route for Admin dashboard and user dashboard
import AdminRoutes from "./auth/helper/AdminRoutes"
import PrivateRoutes from "./auth/helper/PrivateRoutes"
import UserDashBoard from './user/UserDashBoard'
import AdminDashBoard from "./user/AdminDashBoard"

import AddCategory from "./auth/helper/AddCategory"
import ManageCategories from "./auth/helper/ManageCategories"
import AddProduct from "./auth/helper/AddProduct"
import ManageProducts from "./auth/helper/ManageProducts"
import UpdateProduct  from './auth/helper/UpdateProduct';



function Routes() {
    return (
        <Router>
          <Switch>
            <Route path ='/' exact component={App}></Route>
            <Route path ='/signup' exact component={Signup}></Route>
            <Route path ='/signin' exact component={Signin}></Route>
            {/* <Route path ='/cart' exact component={Cart}></Route> */}

            {/* creating a private route for userdashboard */}
            <PrivateRoutes path ='/user/dashboard' exact component={UserDashBoard}/>

            {/* creating a Admin route for admindashboard */}
            <AdminRoutes path ='/admin/dashboard' exact component={AdminDashBoard}/>
            <AdminRoutes path ='/admin/create/category' exact component={AddCategory}/>
            <AdminRoutes path ='/admin/manage/category' exact component={ManageCategories}/>
            <AdminRoutes path ='/admin/create/product' exact component={AddProduct}/>
            <AdminRoutes path ='/admin/manage/products' exact component={ManageProducts}/>
            {/* update product */}
            <AdminRoutes path ='/admin/product/update/:productId' exact component={UpdateProduct} />



            <AdminRoutes path ='/cart' exact component={Cart}></AdminRoutes>





          </Switch>
        </Router>
    )
}

export default Routes;
