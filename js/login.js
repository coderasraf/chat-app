const form = document.querySelector('.login form');
const continueBtn = document.querySelector('.login form .submit-btn');
const errorTxt = document.querySelector('.error-txt');
form.onsubmit = (e) =>{
    e.preventDefault();
}
continueBtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "php/login.php", true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    errorTxt.style.display = "block";
                    errorTxt.classList.remove('alert-danger');
                    errorTxt.classList.add('alert-success');
                    errorTxt.textContent = 'Success';
                        location.href = 'users.php';
                }else{
                    errorTxt.style.display = "block";
                    errorTxt.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
errorTxt.onclick = ()=>{
    errorTxt.style.display = "none";
}