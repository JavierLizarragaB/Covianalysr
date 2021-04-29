var response = "* campo no puede permanecer en blanco";
var checked = 0;

function search(pregunta, ERRpregunta){
    checked = 0;
    for(var i = 0; i < pregunta.length; i++)
    {
        if(pregunta[i].checked == true)
        {
            checked = checked + 1;
        }
    }
    if(checked == 0){
        document.getElementById(ERRpregunta).innerHTML = response;
        pregunta[0].focus();
        return false;
    }else{
        document.getElementById(ERRpregunta).innerHTML = " ";
        return true;
    }
}

function ifEmpty(){
    var pregunta1 = document.getElementsByName("pregunta1");
    var pregunta2 = document.getElementsByName("pregunta2");
    var pregunta3 = document.getElementsByName("pregunta3");
    var pregunta4 = document.getElementsByName("pregunta4");
    var pregunta5 = document.getElementsByName("pregunta5");
    var pregunta6 = document.getElementsByName("pregunta6");
    var pregunta7 = document.forms["myForm"]["pregunta7"];
    
    var pregunta21 = document.getElementsByName("2-pregunta1");
    var pregunta22 = document.getElementsByName("2-pregunta2[]");
    var pregunta23 = document.getElementsByName("2-pregunta3[]");
    var pregunta24 = document.getElementsByName("2-pregunta4[]");
    var pregunta25 = document.getElementsByName("2-pregunta5");

    var pregunta31 = document.getElementsByName("3-pregunta1");
    var pregunta32 = document.getElementsByName("3-pregunta2[]");
    var pregunta33 = document.getElementsByName("3-pregunta3[]");
    var pregunta34 = document.getElementsByName("3-pregunta4[]");
    var pregunta35 = document.getElementsByName("3-pregunta5");
    var pregunta36 = document.getElementsByName("3-pregunta6");
    var pregunta37 = document.getElementsByName("3-pregunta7");

    var pregunta41 = document.getElementsByName("4-pregunta1");
    var pregunta42 = document.getElementsByName("4-pregunta2[]");
    var pregunta43 = document.getElementsByName("4-pregunta3[]");
    var pregunta44 = document.getElementsByName("4-pregunta4");
    
    if(!search(pregunta1, "ERRpregunta1")){
        return false;
    }
    if(!search(pregunta2, "ERRpregunta2")){
        return false;
    }
    if(!search(pregunta3, "ERRpregunta3")){
        return false;
    }
    if(!search(pregunta4, "ERRpregunta4")){
        return false;
    }
    if(!search(pregunta5, "ERRpregunta5")){
        return false;
    }
    if(!search(pregunta6, "ERRpregunta6")){
        return false;
    }
    if (pregunta7.value == "N/A") {
        document.getElementById("ERRpregunta7").innerHTML = response;
        pregunta7.focus();
        return false;
    }else{
        document.getElementById("ERRpregunta7").innerHTML = " ";
    }

    if(!search(pregunta21, "ERRpregunta21")){
        return false;
    }
    if(!search(pregunta22, "ERRpregunta22")){
        return false;
    }
    if(!search(pregunta23, "ERRpregunta23")){
        return false;
    }
    if(!search(pregunta24, "ERRpregunta24")){
        return false;
    }
    if(!search(pregunta25, "ERRpregunta25")){
        return false;
    }
    
    if(!search(pregunta31, "ERRpregunta31")){
        return false;
    }
    if(!search(pregunta32, "ERRpregunta32")){
        return false;
    }
    if(!search(pregunta33, "ERRpregunta33")){
        return false;
    }
    if(!search(pregunta34, "ERRpregunta34")){
        return false;
    }
    if(!search(pregunta35, "ERRpregunta35")){
        return false;
    }
    if(!search(pregunta36, "ERRpregunta36")){
        return false;
    }
    if(!search(pregunta37, "ERRpregunta37")){
        return false;
    }

    if(!search(pregunta41, "ERRpregunta41")){
        return false;
    }
    if(!search(pregunta42, "ERRpregunta42")){
        return false;
    }
    if(!search(pregunta43, "ERRpregunta43")){
        return false;
    }
    if(!search(pregunta44, "ERRpregunta44")){
        return false;
    }

    return true;
}

