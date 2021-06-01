/**
 * this is just a design of user form .
 * This page is not used anywhere
 * this page is same as that as signup.
 * except for that signup has some components to store the user value\
 * this page just act as a blue print. 
 */

import React from 'react'
import Base from "../core/Base"
// import {Link} from "react-router-dom"

const signup = () => {
    // reusable approach
    const signUpForm = () => {
        return (
                <div className="row">
                    <div className = "col-md-6 col-sm-3 offset-sm-3 text-left">
                        <form>
                            <div className="form-group pb-3">
                                <label for="Name" className="form-label">Name</label>
                                <input type="text" className="form-control" id="Name" placeholder="FirstName LastName"/>
                            </div>
                            <div className="form-group pb-3">
                                <label for="Email" className="form-label">Email address</label>
                                <input type="email" className="form-control" id="email" placeholder="name@example.com"/>
                            </div>
                            <div className="form-group pb-3">
                                <div class="col-auto">
                                    <label for="Password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="Password" placeholder="Password"/>
                                </div>
                                <div class="col-auto offset-sm-4 mt-4">
                                    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        )
    }
    
    return (
        <Base title = "Sign-Up" description="Join us by signing up for free">
        {/* function calling */}
        {signUpForm()}
        </Base>
    )
}

export default signup
