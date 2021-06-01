// this file holds content that is common for all pages.
import React from "react";
import Nav from "./Nav"

//here i pass some params they can be default or they can be coming form the particular page
const Base = ({
  title = "My Title",
  description = "My desription",
  className = " text-white p-4",
  children
}) => (
    <div>
        <Nav/>
        <div className="container-fluid m-4 ">
            <div className="jumbotron  text-white text-center">
                <h2 className="display-4">{title}</h2>
                <p className="lead">{description}</p>
            </div>
            <div className={className}>{children}</div>
        </div>
        <footer className="footer  py-3">
            <div className="container-fluid bg-success text-white text-center py-3">
            <p className="text-center ">Got feedback. Let's Chat.</p>
                <button className="btn  btn-warning btn-lg" >Contact Us</button>
            </div>
            <div className="container ">
                <span className="pull-right text-muted ">
                    My <span className="text-white">Shopping</span> Website
                </span>
            </div>
        </footer>
    </div>
);

export default Base;