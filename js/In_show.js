
let date = new Date();
let expireddate = new Date(date);
expireddate.setMonth(expireddate.getMonth() + 1);

document.getElementById("IN_01").addEventListener("click", function(){
 let paymnetLink = document.getElementById("payment_slip_01").value;

    if(paymnetLink == ""){
        alert('Please enter the paymnet slip link');
        alert(expireddate);
    }else{

    }

});
document.getElementById("IN_02").addEventListener("click", function(){
 let paymnetLink = document.getElementById("payment_slip_02").value;
    
        if(paymnetLink == ""){
            alert('Please enter the paymnet slip link');
        }else{
    
        }
});
document.getElementById("IN_03").addEventListener("click", function(){
    let paymnetLink = document.getElementById("payment_slip_03").value;
        
            if(paymnetLink == ""){
                alert('Please enter the paymnet slip link');
            }else{
        
            }
});