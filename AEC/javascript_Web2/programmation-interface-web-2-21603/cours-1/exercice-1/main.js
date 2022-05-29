/**
 * 1 - Au chargement de la page, injecter la valeur de l'attribut 'maxlength' de l'input text dans l'élement <span data-js-input-limit>
 * 2 - À la saisi d'un caractère dans l'input text, afficher dynamiquement le nombre restant de caractère(s) avant d'atteindre la limite récupérée précédemment
 * 3 - Assurez-vous que la chaîne 'caractères' soit au pluriel seulement si le nombre restant est supérieur à 1
 * 4 - Au click du bouton 'Soumettre', si une valeur est saisie, injecter celle-ci dans l’élément <input>
 *     ainsi que la longueur de cette même valeur
 */






window.addEventListener("DOMContentLoaded", function() {

    


    let elForm = document.querySelector("form") ;
        elInputTexte = elForm.texte; 
        elNbMax =elForm.querySelector(["data-js-input-limit"])
        nbMax = elInputTexte.getAttribute("maxlength") ;
        


    elInputTexte.addEventListener("input", function() {

        let value = elInputTexte.value ; 
            nbSaisi = value.length ;
            difference = nbMax - nbSaisi;
            console.log(difference) ;

          elNbMax.textContent=  difference ; 


    })

  

}); 








