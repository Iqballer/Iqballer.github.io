let ikon = document.getElementById("gelap")
let root = document.documentElement 
let button = document.getElementById("button")

button.addEventListener("click",function(){
    root.classList.toggle("gelap")
    if(root.classList.contains("gelap")){
        ikon.src = "assets/light_mode.png"
    }
    else{
        ikon.src = "assets/dark_mode.png"
    }
})

document.getElementById("hamburger").addEventListener("click",function(){
    document.getElementById("navList").classList.add("active")
})

document.getElementById("close").addEventListener("click",function(){
    document.getElementById("navList").classList.remove("active")
})