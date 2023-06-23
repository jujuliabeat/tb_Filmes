function validarFilme() {
    var nome = document.getElementById("nome").value;
    var genero = document.getElementById("genero").value;
    var diretor = document.getElementById("diretor").value;
    var atores = document.getElementById("atores").value;
    var autores = document.getElementById("autores").value;
    var bsFR = document.getElementById("bsFR").value;
    var dtLanc = document.getElementById("dtLanc").value;

    //validar se os campos estaõ preenchidos
    var divErro = document.getElementById("divErro");

    if (nome == "") {
        divErro.innerHTML = "Preencha o nome do filme";
        return false;
    }
    if (genero == "") {
        divErro.innerHTML = "Preencha o genero do filme";
        return false;

    }
    if (diretor == "") {
        divErro.innerHTML = "Preencha o diretor do filme";
        return false;

    }
    if (atores == "") {
        divErro.innerHTML = "Preencha os atores do filme";
        return false;
    }
    if (autores == "") {
        divErro.innerHTML = "Preencha os autores do filme";
        return false;
    }
    if (bsFR == "") {
        divErro.innerHTML = "Preencha o bsFR do filme";
        return false;
    }
    if (dtLanc == "") {
        divErro.innerHTML = "Preencha a data de lançamento do filme";
        return false;
    }




    return false;
}