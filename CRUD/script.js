function validar(){
  let nome = document.getElementById("nome").value;
  let email = document.getElementById("email").value;
  let nascimento = document.getElementById("nascimento").value;
  if (nome == ""){
    alert("nome invalido");
    return false;
  }
  if (email == ""){
    alert("email invalido");
    return false;
  }
  if (nascimento == ""){
    alert("nome invalido");
    return false;
  }
  return true;
}