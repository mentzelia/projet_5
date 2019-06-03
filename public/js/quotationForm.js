var form = $("#quotation-form").show();
 
form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
       
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
        
        
    },
    onFinished: function (event, currentIndex)
    {
        alert("Je vous remercie de votre confiance. Vous recevrez votre simulation de devis sous 48 heures à l'adresse mail indiquée. Pensez à vérifier votre courrier indésirable.");
            
        form.submit();  
        
    }
}).validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    
   
});