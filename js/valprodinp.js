var z=document.getElementsByClassName("quan");
var x=document.getElementsByClassName("add");
var f=document.getElementsByClassName("prodform");

var a=document.getElementsByClassName("prodq");
for (i=0;i<a.length;i++){
    a[i].addEventListener('change',
    function(){
        var f=(this.parentElement).parentElement;
        var arr=this.value.split(",");
        
        if(arr[1]=="ADD"){
            f.querySelector(".add").innerHTML="ADD <i class='fas fa-cart-plus'></i>";
            f.querySelector(".quan").disabled=false;
            f.querySelector(".add").disabled=false;
        }
        else if(arr[1]=="IN CART"){
            f.querySelector(".add").innerHTML="IN CART <i class='fas fa-check'></i>";
            f.querySelector(".quan").disabled=true;
            f.querySelector(".add").disabled=true;
        }
        f.querySelector(".quan").value=arr[2];
        if (arr[3]=='0'){
            f.querySelector(".offer").style.display="none";
        }
        else{
            f.querySelector(".offer").style.display="block";
            f.querySelector(".offer").innerHTML=arr[3].concat("% off");
        }
        if(arr[4]==0.00){
            f.querySelector(".pprice").innerHTML=arr[0];
        }
        else{
            var f1=f.querySelector(".pprice");
            f1.innerHTML="<span style='color:red;text-decoration:line-through;'>".concat(arr[0]).concat("</span>").concat(arr[4]);
        }
    });
}

for (var i=0;i<z.length;i++){
    z[i].addEventListener('input',
    function(){
        if(this.value==''||this.value<1){  
            this.style.border="1.5px solid red";
            this.style.borderRadius="5px";
            this.parentElement.querySelector(".errmsg").style.display="block";
        }
        else{
            this.style.border="1.5px solid green";
            this.style.borderRadius="5px";
            this.parentElement.querySelector(".errmsg").style.display="none";
        }
    });
}
for(var i=0;i<x.length;i++){
    x[i].addEventListener('click',
    function(event){
        event.preventDefault();
        var y=this.parentElement.querySelector(".quan");
        if (y.value==''||y.value<1){
            y.style.border="1.5px solid red";
            y.style.borderRadius="5px";
            this.parentElement.querySelector(".errmsg").style.display="block";
        }
        else{
            y.style.border="1.5px solid green";
            y.style.borderRadius="5px";
            this.parentElement.querySelector(".errmsg").style.display="none";
            var inp=(((this.parentElement).parentElement).parentElement);
            var s=inp.querySelector("button").value;
            if (s=='yes'){
            inp.querySelector(".dispmsg").style.display="block";
            setTimeout(function() { inp.querySelector(".dispmsg").style.display="none"; },6000);
            setTimeout(function(){inp.querySelector(".prodform").submit();},1000);
            }
            else{
                window.location.replace('login.php?msg=login');
            }
        }
    });
}
  


