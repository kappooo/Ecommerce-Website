
//$(document).ready(function () {
 //   $('.link').click(function () {
 //       $('.login').load('index.php?page=register.php');
 //   });
//});

function get_page(page,id) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 & xmlhttp.status==200)
        {
            document.getElementById(id).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",page, true);
    xmlhttp.send();
}