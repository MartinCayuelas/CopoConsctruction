window.addEventListener('load', reset, false);

function reset(){
    var id = document.getElementById('deletePres');
    document.getElementById(id).value = '';
}

function resetById(id){
    document.getElementById(id).value = '';
}

