var x=1;
document.getElementById("signup").addEventListener('submit',(e)=>{e.preventDefault();chkinp();});

var fname=document.getElementById('fname');
var lname=document.getElementById('lname');
var emailid=document.getElementById('emailid');
var phno=document.getElementById('phno');
var passw=document.getElementById('passw');
var chkpass=document.getElementById('chkpass');
var address=document.getElementById('address');
var gender=document.getElementsByName('gender');

fname.addEventListener('input',(e)=>{e.preventDefault();chk('fname','First Name cannot be blank');});
lname.addEventListener('input',(e)=>{e.preventDefault();chk('lname','Last Name cannot be blank');});
emailid.addEventListener('input',(e)=>{e.preventDefault();chk('emailid','Email ID cannot be blank');});
phno.addEventListener('input',(e)=>{e.preventDefault();chk('phno','Phone number cannot be blank');});
passw.addEventListener('input',(e)=>{e.preventDefault();chk('passw','Password cannot be blank');});
chkpass.addEventListener('input',(e)=>{e.preventDefault();passchk();});
address.addEventListener('input',(e)=>{e.preventDefault();chk('address','Address cannot be blank');});


function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
var err;
function chkgen(){
    var inp1=document.getElementById('gender');
    var s=inp1.parentElement;
    if (!(gender[0].checked || gender[1].checked || gender[2].checked)) {
        inp1.className="form-control error";
        var s=inp1.querySelector('small');
        s.innerHTML='Please select a gender';
        return 1;
    }
    else{
        inp1.className="form-control success";
        return 0;
    }
}
function passchk(){
    if(chkpass.value==''){
        seterror(chkpass,'Password cannot be blank');
        return 1;
    }
    else if(passw.value!=chkpass.value){
        seterror(chkpass,'Passwords do not match');
        return 1;
    }
    else{
        setsucces(chkpass);
        return 0;
    }
}

function disp(){
    x=0;
    x+=chk('fname','First Name cannot be blank');
    x+=chk('lname','Last Name cannot be blank');
    x+=chk('emailid','Email ID cannot be blank');
	x+=chk('phno','Phone number cannot be blank');
    x+=chk('passw','Password cannot be blank');
    x+=chk('address','Address cannot be blank');
    x+=passchk();
    x+=chkgen();
}

function chkinp(){
    disp();
    if (x==0){
        document.getElementById("signup").submit();
    }
    else{
        alert("Please fill out the required details.")
    }
}