const inputs = document.querySelectorAll(".input");


function addcl(){
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl(){
    let parent = this.parentNode.parentNode;
    if(this.value == ""){
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});

function submitpage(myForm) {
    var phonenumber = document.getElementById("phonenum").value;
    // alert(phonenumber)
    // alert(phonenumber.length)
    // alert(typeof phonenumber)
    var message = document.getElementById("message").value;
    // alert(message)
    // alert(typeof message)

    if (phonenumber.length > 10) {
        // alert(phonenumber.length)
        // alert('here')
        link= "https://api.whatsapp.com/send?phone=+"+phonenumber+"&text="+message
        // alert(link)
        window.location.href = link;
        return false;
    }
    else{
        alert("Enter Phone Number along with country code and area code");
    }
}