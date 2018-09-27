function searchText(cadena, idForAdd) {
    var i;
    var elements =  document.getElementsByName(cadena).values;

    open('searchResults.html','_parent') ; 
    this.getElementById(idForAdd).innerHTML = cadena;
    return elements;
}

function abrirXd() { 
    open('searchResults.html','_parent') ; 
    } 