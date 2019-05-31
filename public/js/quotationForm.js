var form = $("#quotation-form").show();

form.children("div").steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    autoFocus: true,
    
    onStepChanging: function (event, currentIndex, newIndex)
    {
        if (currentIndex > newIndex)
        {
            return true;
        }
        
        var radioButtonSelected1 = document.querySelector('input[name=project_type]:checked');
        
        if ( newIndex=== 1 && radioButtonSelected1 )
        {
            console.log(radioButtonSelected1.id);
            return true;
            
        } else { 
            alert("Veuillez sélectionner une option!");
        }
        
        var radioButtonSelected2 = document.querySelector('input[name=max_page]:checked');
        
        if ( newIndex=== 2 && radioButtonSelected2 )
        {
            console.log(radioButtonSelected2.id);
            return true;
            
        } else { 
            alert("Veuillez sélectionner une option!");
        }
        
        var contactForm_lastName = document.querySelector('input[name=lastName]');
        
        var contactForm_firstName = document.querySelector('input[name=firstName]');
        
        var contactForm_email = document.querySelector('input[name=email]');
        
        if ( newIndex=== 3 && (contactForm_lastName.value.length !==0))
        {
            if (contactForm_firstName.value.length !==0)   
            {
               if (contactForm_email.value.length !==0) 
                {
                    
                    console.log(contactForm_lastName.value);
                    console.log(contactForm_firstName.value);
                    console.log(contactForm_email.value);
                    return true; 
                } else { 
                    alert("Veuillez renseigner votre email.");
                }
            } else { 
                alert("Veuillez renseigner votre prénom.");
            }
        } else { 
            alert("Veuillez renseigner votre nom");
        }
        
        var checkboxSelected = document.querySelector('input[name=acceptTerms]:checked');
        
        if ( newIndex=== 4 && checkboxSelected )
        {
                console.log(checkboxSelected.id);
                return true;
            
        } else { 
            alert("Veuillez accepter les termes et conditions.");
        }
        
    },
    
    
    
    onFinished: function (event, currentIndex)
    {
        alert("Je vous remercie de votre confiance. Votre demande a bien été envoyée. Vous recevrez votre simulation de devis sous 48 heures à l'adresse mail indiquée. Pensez à vérifier votre courrier indésirable.");
    }
    
    
    
    
});


/*
var buttonNext = document.querySelectorAll('[href="#next"]');

function check(){

        if(document.querySelector('input[name=project_type]:checked')){
            //recupérer la donnée du bouton selectionné
            //passer à la slide suivante
            console.log("ca marche");
        }
        else {
            //empecher le passage à la slide suivante
            console.log("ca marche pas");
        } 
}

    for (i = 0; i < buttonNext.length; i++) {
        buttonNext[i].addEventListener("click", check);
    }

   */ 

    
