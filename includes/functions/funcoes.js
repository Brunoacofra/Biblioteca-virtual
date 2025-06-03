let sel = document.getElementsByTagName('select');
let div = document.getElementById('Gender');
function adicionar(){
    let elementoAdc = document.createElement("select");
    div.appendChild(elementoAdc);
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
