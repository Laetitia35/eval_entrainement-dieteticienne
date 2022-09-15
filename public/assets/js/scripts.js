///form.onsubmit = (e) => {
   // avis_patients.textContent = `Prenom: ${firstname.value}, avis: ${commentaire.value},
    //note : ${note.value}`.

   // e.preventDefault();
    
//}

// AVIS Selecteurs

let firstname = document.querySelector("#firstname");
let commentaire = document.querySelector("#commentaire");
let note = document.querySelector("#note");
let buttonAvis= document.querySelector("#buttonAvis");

// écouteurs évenements
buttonAvis.addEventListener("click", addAvis);

//functions
function addAvis(event) {
    event.preventDefault();

    let addFirstname = document.createElement("h5");
    addFirstname.classList.add("firstname");
    addFirstname.textContent = firstname;
    avis_list.prepend(addFirstname);

    let addComment = document.createElement("p");
    addComment.classList.add("commentaire");
    addComment.textContent = commentaire;
    avis_list.prepend(addComment);

    //let addNote = document.createElement("p");
    //addNote.classList.add("note");
    //addNote.textContent = note;
    //avis_list.prepend(addNote);
}


// Stars
window.onload = () => {
    // On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".la-star");

    // On va chercher l'input
    const note = document.querySelector("#note");

    // On boucle sur les étoiles pour le ajouter des écouteurs d'évènements
    for(star of stars){
        // On écoute le survol
        star.addEventListener("mouseover", function() {
            resetStars();
            this.style.color = "red";
            this.classList.add("las");
            this.classList.remove("lar");
            // L'élément précédent dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;

            while(previousStar){
                // On passe l'étoile qui précède en rouge
                previousStar.style.color = "red";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                // On récupère l'étoile qui la précède
                previousStar = previousStar.previousElementSibling;
            }
        });

        // On écoute le clic
        star.addEventListener("click", function(){
            note.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        });
    }

    /**
     * Reset des étoiles en vérifiant la note dans l'input caché
     * @param {number} note 
     */
    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note){
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            }else{
                star.style.color = "red";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        }
    }
}

function btn_auth() {
    alert(" Il faut être un patient du Docteur Sandrine Coupart pour pouvoir s'identifier et bénéficier de certaines fonctionnalités du site web.");
}
