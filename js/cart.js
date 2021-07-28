var z=document.getElementsByClassName("quan");
var x=document.getElementsByClassName("remove_btn");
var b=document.getElementById("cart_btn");

var a=document.getElementsByClassName("prodq");
for (i=0;i<a.length;i++){
    a[i].addEventListener('change',
    function(){
        var f=(this.parentElement).parentElement;
        f.querySelector(".pprice").innerHTML=this.value;
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

b.addEventListener('click',(e)=>{e.preventDefault();chkinps();})
function chkinps(){
    var flag=0;
    for(i=0;i<z.length;i++){
        if(z[i].value==''||z[i].value<1){
           flag=1 ;
           break;
        }
    }
        if(flag){
            alert('Kindly check the quantities of products.');
        }
        else{
            var str='';
            for (j=0;j<z.length-1;j++){
                str=str.concat(z[j].value).concat(",");
            }
            str=str=str.concat(z[j].value);
            var inp=b.parentElement;
            inp.querySelector('.tr').value=str;
            document.getElementById("final").submit();
        }
}
