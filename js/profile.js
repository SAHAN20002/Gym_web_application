function functionOne(){
    alert("Function One");
}

function show_P_C_2(){
    document.getElementById("profile_container_2").style.display = "block";
    document.getElementById("Body").style.filter = "blur(5px)";
    document.getElementById("profile_container_2").classList.add("animate-show");
}

function goToProfile(){
    document.getElementById("profile_container_2").style.display = "none";
    document.getElementById("Body").style.filter = "blur(0px)";
    document.getElementById("profile_container_2").classList.remove("animate-show");
}