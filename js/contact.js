document.getElementById("name").addEventListener("input",(e)=>{e.preventDefault();dispchange("name",ermsg[0]);});
document.getElementById("phno").addEventListener("input",(e)=>{e.preventDefault();dispchange("phno",ermsg[1]);});
document.getElementById("emailid").addEventListener("input",(e)=>{e.preventDefault();dispchange("emailid",ermsg[2]);});
document.getElementById("query").addEventListener("input",(e)=>{e.preventDefault();dispchange("query",ermsg[3]);});
document.getElementById("submit_query").addEventListener("click",(e)=>{e.preventDefault();chkinp();});

ermsg=['Name cannot be blank.','Phone number cannot be blank.','Email ID cannot be blank.','Please type your query.'];
var pat=/[^0-9]/;

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function dispchange(inp,msg){
    var x=document.getElementById(inp);
    var x1=document.getElementById('er'+inp);
    if (x.value==''){
        seterror(x,x1,msg);
        return 1;
    }
    else if(inp=="phno" && pat.test(x.value)){
        seterror(x,x1,"Phone number must have only digits.");
        return 1;
    }
    else if(inp=="phno" && x.value.length!=10){
        seterror(x,x1,"Invalid phone number.");
        return 1;
    }
    else if(inp=="emailid"){
        if (validateEmail(x.value)){
            setsucces(x,x1);
            return 0;
        }
        else{
            seterror(x,x1,'Invalid email');
            return 1;
        }
    }
    else{
        setsucces(x,x1);
        return 0;
    }
}
function seterror(x,x1,msg){
    x.style.border="2px solid red";
    x1.style.display="block";
    x1.innerHTML=msg;
}
function setsucces(x,x1){
    x.style.border="2px solid rgb(19, 165, 19)";
    x.style.borderRadius="5px";
    x1.style.display="none";
}
function chkinp(){
    var flag=0;
    var arr=["name","phno","emailid","query"];
    for (i=0;i<4;i++){
        flag+=dispchange(arr[i],ermsg[i]);
    }
    if (flag==0){
        alert("Our customer service team will reach out to you soon.")
        document.getElementById("con_form").submit();
    }
    else{
        alert("Kindly fill the details");
    }
}