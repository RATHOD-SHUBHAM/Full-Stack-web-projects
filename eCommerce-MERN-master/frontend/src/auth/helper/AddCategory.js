import React,{useState} from 'react'
import Base from "../../core/Base"
import {isAuthenticate} from "./index"
import {Link} from "react-router-dom"
import {createCategory} from "../../admin/helper/adminapicall"


const AddCategory = () => {

    // const [name, setName] = useState("initialState");
    // const [error, setError] = useState(false);
    // const [success, setSuccess] = useState(false);

    const [values, setValues] = useState({
        name : "",
        error : false,
        success : false
    })

    // to access the email => value.email , so inorder to make it simple we destructure it
    // error and success is only used in popup
    const {name,error,success} = values;


    const {user,token} = isAuthenticate();

    //todo: create form for admin to enter a new category
    const newCategory = () => (
        <form>
            <div className="mb-3">
                <label for="CreateNewCategory" className=" mt-2 form-label text-capitalize fst-italic fw-normal text-dark">Enter the Category: </label>
                <input 
                    type="text" 
                    className="form-control mt-1" 
                    id="CreateNewCategory" 
                    autoFocus 
                    required 
                    placeholder="For Eg. Spring Collections"
                    onChange = {handleChange("name")}
                    value={name}
                />
                <button 
                    type="submit" 
                    onClick = {onSubmit}
                    class="btn btn-outline-info my-3"
                >
                    Create Category
                </button>
                <Link
                    className="btn btn-outline-info mx-3" 
                    to="/admin/dashboard"
                >
                    Back
                </Link>
            </div>
        </form>
        
    )

    // todo : check if user entered into form
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
        setValues({...values,error:false,success:true})
        //call the admin --> helper --> adminapicall
        // and pass the userId,token,category
        // the createCategory will fire a request to backend and will give a responce back
        createCategory(user._id,token,{name})
        .then(data =>{
            if(data.error){
                //if there is error  then set the values of error 
                setValues({...values,error:true})
            }
            else{
                setValues({
                    ...values,
                    name:"",
                    error: "",
                    success:true
                })
            }
        })
        // if something go wrong . it will come to catch. so that we know something in this page went wrong
        .catch(console.log("Error in signin"));
    }


    // todo: popup for success message
    const successMessage = () =>{
        return (
            // if success and
            success && (
                <div className="alert alert-info col-md-8 col-sm-3 offset-sm-3 text-center">
                    {/* get back here and add a gif */}
                    <h2>Collection Created succesfully </h2>
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
            Collection Could Not Be Created
        </div>)
    }







    return (
        <Base title="Create New Category Here"
            description = "Add new Category"
            className = "container bg-info mx-3 my-5 p-4"    
        >
            <div class="row bg-white rounded">
                <div class="col-md-8 offset-md-2" >
                    {newCategory()}
                    {successMessage()}
                    {errorMessage()}
                </div>
            </div>
        </Base>
    )
}

export default AddCategory
