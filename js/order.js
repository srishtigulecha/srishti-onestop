function edit(){
    window.location="cart.php";
}

var flag=1;
var pat=/[^0-9]/;
document.getElementById('address').addEventListener('input',(e)=>{e.preventDefault();chk('address','Address cannot be blank.');});
document.getElementById("confirm_btn").addEventListener('click',(e)=>{e.preventDefault();valinp();});

function chkall(){
    flag=0;
    flag+=chk('address','Address cannot be blank');
    return  flag;
}

function valinp(){
    flag=chkall();
    if (flag==0){
        document.getElementById("del_det").submit();
        alert('Your order has been placed.\nHappy Shopping.');
    }
    else{
        alert("Please fill out the required details.");
    }
}