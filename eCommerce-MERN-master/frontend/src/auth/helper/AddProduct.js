import React,{useState, useEffect} from 'react'
import Base from "../../core/Base"
import {Link} from "react-router-dom"
import {  getAllCategory, createProduct } from '../../admin/helper/adminapicall'
import { isAuthenticate } from '.'





const AddProduct = () => {

    const {user,token} = isAuthenticate();

    const [values, setValues] = useState({
        name: "",
        description: "",
        price: "",
        stock: "",
        photo: "",
        category: "",
        categories: [], //store different categories in array
        loading: false,
        error: "",
        createdProduct: "",
        didRedirect: false,
        // the form needs to be prepared in object of form data so all of the information can be submitted to backend
        formData: ""

    })

    const {
        name,
        description,
        price,
        stock,
        category,
        categories,
        // loading,
        error,
        createdProduct,
        // didRedirect,
        formData
    } = values;

    

    //todo: bring all the categories that are availabe in db
    const preload = (productId) => {
      getAllCategory(productId).then(data=>{
            if(data.error){
                setValues({...values,error:data.error})
            }
            else{
                setValues({...values, categories: data, formData : new FormData() })
            }
        })
        
    }




    useEffect(() => {
        preload(); // eslint-disable-next-line
    }, []);








    // todo: reusable form
    //todo: create form for admin to enter a new category
    const newProduct = () => (
        <form>
            <div className="mb-3">
                
                {/* name */}
                <label for="ProductName" className=" mt-3 form-label text-capitalize fst-italic fw-normal text-dark">Enter the Product: </label>
                <input 
                    type="text" 
                    className="form-control mt-1" 
                    id="ProductName" 
                    autoFocus 
                    required 
                    placeholder="For Eg. t-Shirt"
                    onChange = {handleChange("name")}
                    value={name}
                />
                {/* description */}
                <label for="Description" className=" mt-2 form-label text-capitalize fst-italic fw-normal text-dark">Description: </label>
                <input 
                    type="text" 
                    className="form-control mt-1" 
                    id="Description" 
                    autoFocus 
                    required 
                    placeholder="For Eg. This is a new summer edition 2021 Tee"
                    onChange = {handleChange("description")}
                    value={description}
                />
                {/* Price */}
                <label for="Price" className=" mt-2 form-label text-capitalize fst-italic fw-normal text-dark">Price: </label>
                <input 
                    type="number" 
                    className="form-control mt-1" 
                    id="Price" 
                    autoFocus 
                    required 
                    placeholder="For Eg. 21"
                    onChange = {handleChange("price")}
                    value={price}
                />
                {/* Category */}
                <label for="Category" className=" mt-3 form-label text-capitalize fst-italic fw-normal text-dark">Category: </label>
                <select 
                    className="form-select mt-1" 
                    aria-label="Default select example"
                    onChange = {handleChange("category")}
                    value={category}
                >
                    <option selected>Select A Category: </option>
                    {categories && categories.map((cat,index) => (
                        // if i am lopping through something then it must have a unique key value
                        <option key={index} value={cat._id}>{cat.name}</option>
                    ))}
                    
                </select>
                {/* Stock */}
                <label for="Stock" className=" mt-3 form-label text-capitalize fst-italic fw-normal text-dark">Stock: </label>
                <input 
                    type="number" 
                    className="form-control" 
                    id="Stock" 
                    autoFocus 
                    placeholder="For Eg. 1"
                    onChange = {handleChange("stock")}
                    value={stock}
                />
                {/* Photo */}
                <div className="my-3">
                    <label for="formFile" className=" mt-2 form-label text-capitalize fst-italic fw-normal text-dark">Select Image : </label>
                    <input 
                        className="form-control" 
                        type="file" 
                        id="formFile"
                        name="photo"
                        accept="image"
                        onChange = {handleChange("photo")}
                    />
                </div>

                <button 
                    type="submit" 
                    onClick = {onSubmit}
                    class="btn btn-outline-info my-3"
                >
                    Create Product
                </button>
                {/* get back to admin dash board */}
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
    const handleChange = name => event =>{
        // if the val that is coming is a photo then do have a file 
        // (file comes with a lot of iteratable) ==> this will give path of a file to load
        //  else do event.target.val
        const value = name === "photo" ? event.target.files[0] : event.target.value
        // value will now  have a file or a value
        formData.set(name,value);
        // load all the values
        // then set the values in setValue()
        //event.target.value will take the value which user types and store it
        setValues({...values, [name]:value})
    }


    //todo: function to see if user clicked the button
    const onSubmit = event =>{
        // when we click the submit button. our form usually routes to other place
        // inorder to stay in the same place we use preventDefault
        event.preventDefault();
        setValues({...values, error:"", loading:true})
        //call the admin --> helper --> adminapicall
        // and pass the userId,token,formData
        // the createProduct will fire a request to backend and will give a responce back
        createProduct(user._id, token, formData)
        .then(data =>{
            console.log("data is: ", data);
            if(data?.error){
                //if there is error  then set the values of error 
                setValues({...values,error:data.error})
            }
            else{
                setValues({
                    ...values,
                    name: "",
                    description: "",
                    price: "",
                    stock: "",
                    photo: "",
                    category: "",
                    loading: false,
                    // error: "",
                    createdProduct: data?.name
                })
            }
        })
        // if something go wrong . it will come to catch. so that we know something in this page went wrong
        .catch(console.log("Error while creating products"));
    }



    // todo: popup for success message
    const successMessage = () =>{
        return (<div 
            className = "alert alert-success col-md-6 col-sm-3 offset-sm-3 text-center "
            //show the alert box when there is a error. else dont show
            style = {{display:createdProduct ? "":"none"}}
        >
            {/* show error coming from db and stored in value */}
            {createdProduct} Created succesfully
        </div>)
    }

    // todo: popup for error message
    const errorMessage = () =>{
        return (
        <div 
            className = "alert alert-danger col-md-6 col-sm-3 offset-sm-3 text-center "
            //show the alert box when there is a error. else dont show
            style = {{display:error ? "":"none"}}
        >
            {/* show error coming from db and stored in value */}
            Product Could Not Be Created
        </div>
        )
    }






    return (
        <Base title="Add Products" 
            description = "Create new Products Here"
            className = "container bg-info mx-3 my-5 p-4"
        >
            <div className="row bg-white mx-2 rounded">
                <div className="col-md-8 offset-md-2" >
                    {newProduct()}
                    {successMessage()}
                    {errorMessage()}
                </div>
            </div>
        </Base>
    )
}

export default AddProduct


// ===============================================================================================


