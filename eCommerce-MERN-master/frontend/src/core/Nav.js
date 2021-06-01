

// this is my navigation page. 
// we can link pages to router here
import React from 'react'
// with router will help us have compatability with nav bar and router file we created
import {
    Link,
    withRouter
  } from "react-router-dom"

// this is needed because we have to show user signout button only if he is logged in
// we dont have to show him always
import {signout,isAuthenticate} from "../auth/helper/index"





// to identify the active page
// history and path are coming up from Link so dont change them
const activeTab = (history,path) => {
    // if my pathname is equal to the actual path then change the color to black else keep it grey
    if(history.location.pathname === path){
        return {color:"#000"}
    }
    else{
        return {color:"#7f8c8d"}
    }
}

const Nav = ({history}) => {


    return (
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
            <div className="container-fluid">
                <Link style={activeTab(history,"/")} className="navbar-brand" to="/">
                    Home
                </Link>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <Link style={activeTab(history,"/cart")} className="nav-link" to="/cart">Cart</Link>
                        </li>


                        {/* show either user dash board or admin dashboard */}
                        {isAuthenticate() && isAuthenticate().user.role === 0 && (
                            <li className="nav-item">
                                <Link style={activeTab(history,"/user/dashboard")} className="nav-link" to="/user/dashboard">DashBoard</Link>
                            </li>
                        )}

                        {isAuthenticate() && isAuthenticate().user.role === 1 && (
                            <li className="nav-item">
                            <Link style={activeTab(history,"/admin/dashboard")} className="nav-link" to="/admin/dashboard" >AdminDashboard</Link>
                            </li>
                        )}


                        {/* show sigin and signup option */}
                        {/* If the user is not authenticated then show him sign in and sign up page  */}
                        {!isAuthenticate() && (
                            <>
                                <li className="nav-item">
                                    <Link style={activeTab(history,"/signin")} className="nav-link" to="/signin" >Signin</Link>
                                </li>
                                <li className="nav-item">
                                    <Link style={activeTab(history,"/signup")} className="nav-link" to="/signup" >SignUp</Link>
                                </li>
                            </>
                        )}
                        
                        {/* show signouy option */}
                        {/* if the user has authenticated then show hom signout page */}
                        {isAuthenticate() && (
                            <li className="nav-item">
                            {/* this is normal signout button */}
                            {/* <Link style={activeTab(history,"/signout")} className="nav-link" to="/signout" >SignOut</Link> */}
                            {/* Link will move us to some place. But when i click on signout. It must perform some function */}
                                <span
                                    style={activeTab(history,"/signout")} 
                                    className="nav-link"
                                    // once user click signout. we got to signout the user and redirect him to some page
                                    //our signout in auth/helper/index has next => which has the ability to take a call back
                                    onClick={() => {
                                        signout(()=>{
                                            history.push("/")
                                        })
                                    }}
                                    >
                                    Signout
                                </span>
                            </li>
                        )}
                    </ul>
                </div>
            </div>
        </nav>
    )
}

export default withRouter(Nav);



