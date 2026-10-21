document.getElementById("form-login").onsubmit = (e) => {
    e.preventDefault();

    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    let mensagem = document.getElementById("mensagem");    

        mensagem.innerHTML = "";


        document.getElementById("form-login").reset();
    } 

    

    