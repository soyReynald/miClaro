const formLogin = document.querySelector(".login form"),
continueBtn = formLogin.querySelector(".button input"),
errorText = formLogin.querySelector(".error-text");

formLogin.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "API/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                showUserListing();
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(formLogin);
    xhr.send(formData);
}