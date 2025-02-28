let connexionhead = document.querySelector(".connexionhead")
let formulaire = document.querySelector(".connexion")
// console.log(formulaire);

// // console.log(connexionhead);
connexionhead.addEventListener("click",(e)=>{
    e.stopPropagation()
    formulaire.classList.toggle("boolConnex")
})
// connexionhead.addEventListener("click",(event) =>{
//     if(event.target !== formulaire && !formulaire.contains(event.target)){
//         formulaire.style.bottom = "15vw"
//     }
// })


    document.querySelector("section").addEventListener("click",()=>{
        formulaire.style.bottom = "15vw"

    })
const faTimes = document.getElementById("fa-times")
const inscriptionUser = document.getElementById("inscriptionUser")
const btninscription = document.getElementById("btninscription")
btninscription.addEventListener("click",()=>{
    inscriptionUser.classList.toggle("addClass")
})
faTimes.addEventListener("click",()=>{
    inscriptionUser.classList.remove("addClass")
})
const notifStats = document.getElementById("status")
const faTimes2 = document.getElementById("fa-times2")
faTimes2.addEventListener("click",()=>{

  notifStats.classList.toggle("addClass2")
})

