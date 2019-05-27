var form = $("#quotation-form");

/*form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password"
        }
    }
}); */

form.children("div").steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft"
});

    
    /*
$("#quotation-form").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true
}); */