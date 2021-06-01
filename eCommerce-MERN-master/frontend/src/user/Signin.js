import React,{useState} from 'react'
import Base from "../core/Base"
import { Redirect} from "react-router-dom"
import {signin,authenticate,isAuthenticate} from "../auth/helper/index"

const Signin = () => {
    // to store what user types in the form we use state
    const [values, setValues] = useState({
        email:"",
        password: "",
        // error to evaluate the error
        error: "",
        //loading message to display to user
        loading:false,
        // if user signin succesfully redirect him to some page like home or user dash board etc
        didRedirect: false


    })
    // to access the email => value.email , so inorder to make it simple we destructure it
    const {email,password,error,loading,didRedirect} = values;

    // isAuthenticate from auth/helper/index is going to return a localStorage.getItem("jwt")
    //save it and just bring out user
    const {user} = isAuthenticate();

    //todo:  function to see if user typed something in the form
    // higher order function
    // the value user enters like name,email p/w is taken into val and is passed to event
    const handleChange = val => event =>{
        // load all the values
        // then set the values in setValue()
        //event.target.value will take the value which user types and store it
        setValues({...values, error: false, [val]: event.target.value})
    }


    //todo: function to see if user clicked the button
    const onSubmit = event =>{
        // when we click the submit button. our form usually routes to other place
        // inorder to stay in the same place we use preventDefault
        event.preventDefault();
        setValues({...values,error:false,loading:true})
        //call the auth --> helper --> index --> signin file
        // and pass the name email and p/w
        // the signin will fire a request to backend and will give a responce back
        signin({email,password})
        .then(data =>{
            console.log(data)
            if(data.error){
                //if there is error  then set the values of error and success 
                setValues({...values,error:data.error, loading:false})
            }
            else{
                // once user enter his credentials . we go to authenticate 
                // authenticate takes 2 prop data and next => so once authenticated user must to redirected
                authenticate(data, ()=> {
                    setValues({
                        ...values,
                        email: "",
                        password: "",
                        didRedirect: true
                    })
                })
            }
        })
        // if something go wrong . it will come to catch. so that we know something in this page went wrong
        .catch(console.log("Error in signin"));
    }



    // todo: performing redirect
    // should we redirect or no. if we have to where do we go
    const performRedirect = () => {
        if(didRedirect){
            // we will check if we have a user (got from isAuthenticate above ) and if the user has a role === 1 means he is admin
            // redirect him to admin
            if (user && user.role === 1){
                return <Redirect to="/admin/dashboard" />
            }
            else{
                return <Redirect to="/user/dashboard" />
            }
        }
        if(isAuthenticate()){
            return<Redirect to="/" />
        }
    }






    //todo: reusable approach
    const signInForm = () => {
        return(
            <div>
            <div className="row">
                <div className = "col-md-6 offset-sm-3 text-left">
                    <form>
                        <div className="form-group pb-3">
                            <label for="Email" className="form-label">Email address</label>
                            <input 
                                type="email" 
                                onChange = {handleChange("email")}
                                value={email}
                                className="form-control" 
                                id="email" 
                                placeholder="name@example.com"/>
                        </div>
                        <div className="form-group pb-3">
                            <div class="col-auto">
                                <label for="Password" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    onChange = {handleChange("password")}
                                    value={password}
                                    class="form-control" 
                                    id="Password" 
                                    placeholder="Password"/>
                            </div>
                            <div class="col-auto text-center mt-4">
                                <button 
                                    type="submit" 
                                    onClick = {onSubmit}
                                    class="btn btn-primary mb-3">Confirm identity</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        )
    }


    // todo: popup for success message
    const loadingMessage = () =>{
        return (
            // if loading and
            loading && (
                <div className="alert alert-info">
                    {/* get back here and add a gif */}
                    <h2>loading ....</h2>
                </div>
            )
        )
    }

    // todo: popup for error message
    const errorMessage = () =>{
        return (<div 
            className = "alert alert-danger col-md-6 col-sm-3 offset-sm-3 text-center "
            //show the alert box when there is a error. else dont show
            style = {{display:error ? "":"none"}}
        >
            {/* show error coming from db and stored in value */}
            {error}
        </div>)
    }



    return (
        <Base title ="Sign In Here " description = "Welcome Back. Please SignIn">
            {signInForm()}
            {performRedirect()}
            {loadingMessage()}
            {errorMessage()}
            {/* this below line is just for testing */}
            <p className="text-white text-center">{JSON.stringify(values)}</p>
        </Base>
    )
}

export default Signin


// ============================================================================================================