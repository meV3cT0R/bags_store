
let card = document.querySelectorAll(".Carry");
let mainPage = document.querySelector(".main");
let abouts = document.querySelector("#abouts");

function shop(){
    mainPage.style.display="none";
    card.forEach(c=> {
        c.style.display="block";
    })
    document.getElementById("shop").style.color="black";
    document.getElementById("home").style.color="bisque";
    document.getElementById("about").style.color="bisque";
    document.getElementById("contact").style.color="bisque";
}

function home(){
mainPage.style.display="flex";
card.forEach(c=> {
    c.style.display="block";
})
document.getElementById("home").style.color="black";
document.getElementById("shop").style.color="bisque";
document.getElementById("about").style.color="bisque";
document.getElementById("contact").style.color="bisque";
}

function about(){
    mainPage.style.display="none";
    abouts.style.display="block";
    card.forEach(c=> {
        c.style.display="none";
    })

    document.getElementById("home").style.color="bisque";
document.getElementById("shop").style.color="bisque";
document.getElementById("about").style.color="black";
document.getElementById("contact").style.color="bisque";
}


console.log(hello);