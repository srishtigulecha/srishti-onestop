var x=1;
document.getElementById("login").addEventListener('submit',(e)=>{e.preventDefault();chkinp();});

var phno=document.getElementById('phno');
var passw=document.getElementById('passw');
phno.addEventListener('input',(e)=>{e.preventDefault();chk('phno','Phone number cannot be blank');});
passw.addEventListener('input',(e)=>{e.preventDefault();chk('passw','Password cannot be blank');});


function chkinp(){
    x=0
    x+=chk('phno','Phone number cannot be blank');
    x+=chk('passw','Password cannot be blank');
    if (x==0){
        document.getElementById("login").submit();
    }
    else{
        alert("Please fill out the required details.")
    }
}
