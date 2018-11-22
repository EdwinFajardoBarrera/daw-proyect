function asyncChange()
{
    var request;
    
    if (window.XMLHttpRequest) {
        request = new window.XMLHttpRequest();
    } else {
        request = new window.ActiveXObject("Microsoft.XMLHTTP");
    }
    
    request.open("GET", "View/ViewComments.php", true);
    request.send();
    
    request.onreadystatechange = function()
    {
        if (request.readyState == 4 && request.status == 200)
        {
            document.getElementById("area-comentarios").innerHTML = "Hola " + request.responseText + "!";
        }
    }
}