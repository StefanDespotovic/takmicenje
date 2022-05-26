 function authenticate(){
    var authorised;
    
    var name = document.getElementById("name").value;
    var mail = document.getElementById("mail").value;
    var psw = document.getElementById("psw").value;
    
    if(name == "a" && mail == "a@mail.com" && psw == "a"){
      authorised = true;
    }else{
      authorised = false;
      alert("Sorry, password is incorrect.");
    }
    return authorised;
  }