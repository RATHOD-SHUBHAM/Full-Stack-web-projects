import React from 'react'
import Base from "../core/Base"
import {isAuthenticate} from "../auth/helper/index"
import {Link} from "react-router-dom"

function AdminDashBoard() {
    // isAuthenticate returns a user which has the following infor
    const{user : {name,email}} = isAuthenticate();

    const LeftSideSection = () => {
        return (
            <div className="card">
                <div className="card-header bg-dark text-white text-center">
                   Admin Navigation
                </div>
                <div className="card-body bg-light">
                    <ul className="list-group">
                        <li className="list-group-item">
                            {/* these link i created. */}
                            <Link to="/admin/create/category" className = "nav-link text-center text-primary" > Create New Category </Link>
                        </li>
                        <li className="list-group-item">
                            <Link to="/admin/manage/category" className = "nav-link text-center text-primary" > Manage Category </Link>
                        </li>
                        <li className="list-group-item">
                            <Link to="/admin/create/product" className = "nav-link text-center text-primary" > Create New Product </Link>
                        </li>
                        <li className="list-group-item">
                            <Link to="/admin/manage/products" className = "nav-link text-center text-primary" > Manage My Products </Link>
                        </li>
                        <li className="list-group-item">
                            <Link to="/admin/orders" className = "nav-link text-center text-primary" > Manage Orders </Link>
                        </li>
                    </ul>
                </div>
                
            </div>
        )
    }


    const RightSideSection = () => {
        return(
            <div className="card m-5">
                <div className="card-header bg-dark text-white text-center">
                   Admin Information
                </div>
                <div className="card-body bg-light">
                    <ul className="list-group">
                        <li className="list-group-item">
                            <span className="badge bg-success bg-gradient">Name : </span> <span className="text-capitalize">{name}</span> 
                        </li>
                        <li className="list-group-item">
                            <span className="badge bg-success bg-gradient">Email : </span> <span>{email}</span>
                        </li>
                        <li className="list-group-item">
                            <span className="badge bg-danger pull-right">Admin</span>
                        </li>
                    </ul>
                </div>
                
            </div>
        )
    }








    return (
        <Base 
            title="Admin DashBoard"
            description="Manage the page here"
            
        >
            {/* divide the page into right and left page */}
            <div className = "container bg-dark bg-gradient me-5  p-4">
                <div className="row gx-5">
                    <div className="col-3">
                        {LeftSideSection()}
                    </div>
                    <div className="col-9">
                        {RightSideSection()}
                    </div>
                </div>
            </div>
            
        </Base>
    )
}

export default AdminDashBoard
