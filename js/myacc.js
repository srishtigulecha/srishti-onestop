document.getElementById("edit_btn").addEventListener('click',(e)=>{e.preventDefault();allowinp();});
var y=document.getElementById("acc_det");
var x=y.getElementsByTagName("input");
l=x.length;
var pat=/[^0-9]/;
var flag=1;

function allowinp(){
    document.getElementById("save_btn").style.display="inline";
    document.getElementById("edit_btn").display="none";
    document.getElementById("edit_btn").disabled=true;
    for(i=0;i<l;i++){
        x[i].disabled=false;
    }
    document.getElementById("address").disabled=false;
}

document.getElementById('fname').addEventListener('input',(e)=>{e.preventDefault();chk('fname','First Name cannot be blank.');});
document.getElementById('lname').addEventListener('input',(e)=>{e.preventDefault();chk('lname','Last Name cannot be blank.');});
document.getElementById('emailid').addEventListener('input',(e)=>{e.preventDefault();chk('emailid','Email cannot be blank.');});
document.getElementById('phno').addEventListener('input',(e)=>{e.preventDefault();chk('phno','Phone number cannot be blank.');});
document.getElementById('address').addEventListener('input',(e)=>{e.preventDefault();chk('address','Address cannot be blank.');});
document.getElementById('gender').addEventListener('input',(e)=>{e.preventDefault();chk('gender','Gender cannot be blank.');});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

/*same code used in order.html*/
function chk(inp,msg){
    var inpv=document.getElementById(inp);
    var x=document.getElementById('er'+inp);
    if (inpv.value==''){
        seterror(inpv,x,msg);
        return 1;
    }
    else if(inp=="phno" && pat.test(inpv.value)){
        seterror(inpv,x,"Phone number must have only digits.");
        return 1;
    }
    else if(inp=="phno" && inpv.value.length!=10){
        seterror(inpv,x,"Invalid phone number.");
        return 1;
    }
    else if(inp=="emailid"){
        if (validateEmail(inpv.value)){
            setsucces(inpv,x);
            return 0;
        }
        else{
            seterror(inpv,x,'Invalid email');
            return 1;
        }
    }
    else if(inp=="gender"){
        var str=inpv.value.toLowerCase();
        if(str=='male'||str=='female'||str=='others'){
            setsucces(inpv,x);
            return 0;
        }
        else{
            seterror(inpv,x,'Invalid gender.');
            return 1;
        }
    }
    else{
        setsucces(inpv,x);
        return 0;
    }
}

function seterror(inpv,x,msg){
    x.style.display="block";
    inpv.style.border="2px solid red";
    x.innerHTML=msg;
}

function setsucces(inpv,x){
    inpv.style.border="2px solid rgb(19, 165, 19)";
    x.style.display="none";
}
/*till here*/

document.getElementById("save_btn").addEventListener('click',(e)=>{e.preventDefault();chkinp();});

function disp(){
    flag=0;
    flag+=chk('fname','First Name cannot be blank');
    flag+=chk('lname','Last Name cannot be blank');
    flag+=chk('emailid','Email cannot be blank');
	flag+=chk('phno','Phone number cannot be blank');
    flag+=chk('gender','Gender cannot be blank');
    flag+=chk('address','Address cannot be blank');
}

function chkinp(){
    disp();
    if (flag==0){
        //alert('Account details modified.')
        document.getElementById("det_form").submit();
    }
    else{
        alert("Please fill out the required details.");
    }
}

