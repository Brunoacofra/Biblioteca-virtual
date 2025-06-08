let sel = document.getElementsByTagName('select');
let div = document.getElementById('Gender');
function adicionar(){
    let elementoAdc = document.createElement("select");
    var a = document.querySelectorAll('#Gender select');
    elementoAdc.name = 'select_'+(a.length+1);
    elementoAdc.className = 'select_'+(a.length+1);
    div.appendChild(elementoAdc);
    fetch('./includes/endPoints/mostrarOpcoes.php',{
        method:'POST'
    })
    .then(response => response.json())
    .then(data =>{
        console.log(data);
        for(let i = 0;i <= data.length-1;i++){
            let op = document.createElement('option');
            op.value = data[i]['gen_codigo'];
            op.innerText = data[i]['gen_nome'];
            elementoAdc.appendChild(op);
        }
    })
    .catch(error =>{
        alert(error);
    })
    anulabtn();
}
function remover(){
    if(sel.length >1){
        var a = document.querySelectorAll('#Gender select');
        a[a.length-1].remove();
    }else{
        alert('Sem campos para remover');
    }
    anulabtn();
}   
function anulabtn(){
    if(sel.length == 1){
		btn.disabled = true;
	}else{
		btn.disabled = false;
	}
}
function anulabtnCad(){
    let btn = document.getElementById('btn');
    var nome = document.getElementById('nome').value;
    if (nome == ""){
        btn.disabled = true;
    }else{
        btn.disabled = false;
    }
}
function cadastroAutor(){
    var nome = document.getElementById('nome').value;
    if (nome == ""){

    }else{
        fetch('./includes/endPoints/cadastroautorEnd.php',{
            method:'POST',
            headers:{
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body:"nome="+encodeURIComponent(nome)
        })
        .then(response => response.text())
        .then(data =>{
            alert(data);
        })
        .catch(error =>{
            alert(error);
        });
        document.getElementById('formulario').reset();
        anulabtnCad();
    } 
}
function editarAutor(cod,nome){
    alert(cod+'<-codigo |nome->'+nome);
    fetch('./includes/endPoints/editarAutor.php?cod='+cod+'&nome='+nome)
    .then(response =>response.text())
    .then(data =>{
        alert(data);
        location.reload();
    })
    .catch(error =>{
        alert(error);
    })
    window.cod = 0;
}
function excluirAutor(id){
    fetch('./includes/endPoints/excluirAutor.php?cod='+id)
    .then(response =>response.text())
    .then(data =>{
        alert(data);
        setTimeout(function(){
            location.reload();
        },500)
    })
    .catch(error =>{
        alert(error);
    })
}
function excluirLivro(id){
    fetch('./includes/endPoints/excluirLivro.php?cod='+id)
    .then(response =>response.text())
    .then(data =>{
        alert(data);
        setTimeout(function(){
            location.reload();
        },500)
    })
    .catch(error =>{
        alert(error);
    })
}
function excluirGenero(id){
    fetch('./includes/endPoints/excluirGenero.php?cod='+id)
    .then(response =>response.text())
    .then(data =>{
        alert(data);
        setTimeout(function(){
            location.reload();
        },500)
    })
    .catch(error =>{
        alert(error);
    })
}
function editarGenero(){

}
function editarGenero(cod,nome){
    alert(cod+'<-codigo |nome->'+nome);
    fetch('./includes/endPoints/editarGenero.php?cod='+cod+'&nome='+nome)
    .then(response =>response.text())
    .then(data =>{
        alert(data);
        location.reload();
    })
    .catch(error =>{
        alert(error);
    })
    window.cod = 0;
}