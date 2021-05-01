const form = document.querySelector('.typing-area');
const sendBtn = document.querySelector('.send-btn2');
const inputField = document.querySelector('.input-field');
const customAlert = document.querySelector('.custom-alert');
const chatBox = document.querySelector('.chat-box');
form.onsubmit = (e)=>{
    e.preventDefault();
}

sendBtn.onclick =()=>{
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "php/insert-chat.php", true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data== 'Success'){
                    inputField.value = '';
                    customAlert.textContent = 'Message sent successfully!';
                    customAlert.classList.add('active');
                    customAlert.classList.add('alert-success');
                    customAlert.classList.remove('alert-warning');
                    setTimeout(() => {
                        customAlert.classList.remove('active');
                    }, 1000);
                }

                if(data== 'failed'){
                    customAlert.textContent = 'Message not sent';
                    customAlert.classList.add('alert-danger');
                    customAlert.classList.remove('alert-success');
                }
                
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

// getting chat  from database with ajax
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/get-chat.php', true);
    xhr.onload = function(){
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
               chatBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);


