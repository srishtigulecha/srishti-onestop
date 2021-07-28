var pat=/[^0-9]/;
function chk(inp,msg){
    inpvalue=document.getElementById(inp);
    if (inpvalue.value==''){
        seterror(inpvalue,msg);
        return 1;
        }
    else if(inp=="emailid"){
        if (validateEmail(inpvalue.value)){
            setsucces(inpvalue);
            return 0;
        }
        else{
            seterror(inpvalue,'Invalid email');
            return 1;
        }
    }
    else if(inp=="phno" && pat.test(inpvalue.value)){
        seterror(inpvalue,'Phone number must contain only digits.');
        return 1;
    }
    else if(inp=="phno" && inpvalue.value.length!=10){
        seterror(inpvalue,'Invalid phone number.');
        return 1;
    }
    else{
        setsucces(inpvalue); 
        return 0;
    }
}

function seterror(inp,msg){
    var y=inp.parentElement;
    y.className="form-control error";
    var s=y.querySelector('small');
    s.innerText=msg;
    err=1;
}
function setsucces(inp){
    var y=inp.parentElement;
    y.className="form-control success";
}