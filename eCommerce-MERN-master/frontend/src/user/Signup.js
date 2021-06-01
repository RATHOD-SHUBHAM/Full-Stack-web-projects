import React ,{useState} from 'react'
import Base from "../core/Base"
import {signup} from "../auth/helper/index"
import {Link} from "react-router-dom"

// to store what user types in the form we use state
const Signup = () => {

    const [values, setValues] = useState({
        name : "",
        email : "",
        password : "",
        error : "",
        success : false
    })
    // to access the email => value.email , so inorder to make it simple we destructure it
    const {name,email,password,error,success} = values;

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
        setValues({...values,error:false})
        //call the auth --> helper --> index --> signup file
        // and pass the name email and p/w
        // the signup will fire a request to backend and will give a responce back
        signup({name,email,password})
        .then(data =>{
            if(data.error){
                //if there is error  then set the values of error and success 
                setValues({...values,error:data.error,success: false})
            }
            else{
                // once user click submit we stored the value in state adn then we empty the fields. ie we reset the fields
                setValues({
                    ...values,
                    name: "",
                    email: "",
                    password: "",
                    error: "",
                    success: true})
            }
        })
        // if something go wrong . it will come to catch. so that we know something in this page went wrong
        .catch(console.log("Error in signup"));


    }

    //todo:  reusable approach
    const signUpForm = () => {
        return (
                <div className="row">
                    <div className = "col-md-6 col-sm-3 offset-sm-3 text-left">
                        <form>
                            <div className="form-group pb-3">
                                <label for="Name" className="form-label">Name</label>
                                <input 
                                    type="text" 
                                    className="form-control"

                                    // when there is change in the form. it will pass the name to handle change function
                                    onChange = {handleChange("name")}
                                    value={name}
                                    
                                    id="Name" 
                                    placeholder="FirstName LastName"/>
                            </div>
                            <div className="form-group pb-3">
                                <label for="Email" className="form-label">Email address</label>
                                <input 
                                    type="email" 
                                    // when user enter email. it will pass the email to handle change function
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
                                        placeholder="Password"
                                    />
                                </div>
                                <div class="col-auto offset-sm-4 mt-4">
                                    <button 
                                        type="submit" 
                                        // for onSubmit you will wait for button to be clicked. only then function is called
                                        // that is () => wil call the function immediatelt
                                        // like onChange() = as soon as i type things are going and getitng saved
                                        // but for button i got to wait till i click the button so there is no ()
                                        onClick={onSubmit}
                                        class="btn btn-primary mb-3">Confirm identity</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        )
    }

    // todo: popup for success message
    const successMessage = () =>{
        return (<div 
            className = "alert alert-success col-md-6 col-sm-3 offset-sm-3 text-center"
            //show the alert box when there is a success. else dont show
            style = {{display:success ? "":"none"}}
        >
            Account created successfully.
            click <Link to= "/signin"> Here </Link>to log in
        </div>)
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
        <Base title = "Sign-Up" description="Join us by signing up for free">
        {/* function calling */}
        {signUpForm()}
        {successMessage()}
        {errorMessage()}
        {/* this below line is just for testing */}
        <p className="text-white text-center">{JSON.stringify(values)}</p>
        </Base>
    )
}

export default Signup
