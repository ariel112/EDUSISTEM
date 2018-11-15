(function(){
  'use strict';
  





  $(document).ready(function(){

  	let form = $('.bootstrap-form');

  	// On form submit take action, like an AJAX call
    $(form).submit(function(e){

        if(this.checkValidity() == false) {
            $(this).addClass('was-validated');
            e.preventDefault();
            e.stopPropagation();
        }

    });

    // On every :input focusout validate if empty
    $(':input').blur(function(){
    	let fieldType = this.type;

    	switch(fieldType){
    		 case 'text':
    		case 'password':
                validateText($(this));
                break;
    		case 'email1':
                validateEmail($(this));
                break;
    		case 'checkbox':
    			validateCheckBox($(this));
    			break;
    		case 'select-one':
    			validateSelectOne($(this));
    			break;
    		case 'select-multiple':
    			validateSelectMultiple($(this));
    			break;
    		default:
	    		break;
    	}
	});


       // validacion personalisada
    $(':input').blur(function(){
        let fieldType = this.id;

        switch(fieldType){
            case 'text': 
            case 'identidad':
                validateId($(this));
                break;
            case 'nombres':
                validateName($(this));
                break;
            case 'telefono':
                validateTel($(this));
                break;
            case 'select-one':
                validateSelectOne($(this));
                break;
            case 'select':
                validateSelect($(this));
                break;
            default:
                break;
        }
    });


	// On every :input focusin remove existing validation messages if any
    $(':input').click(function(){

    	$(this).removeClass('is-valid is-invalid');

	});

    // On every :input focusin remove existing validation messages if any
    $(':input').keydown(function(){

        $(this).removeClass('is-valid is-invalid');

    });

	// Reset form and remove validation messages
    $(':reset').click(function(){
        $(':input, :checked').removeClass('is-valid is-invalid');
    	$(form).removeClass('was-validated');
    });

  });

    // Validate Text and password
    function validateText(thisObj) {
      let fieldValue = thisObj.val();
        if(fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
        
    }

    // Validate Email
    function validateEmail(thisObj) {
        let fieldValue = thisObj.val();
        let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

        if(pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }


    // Validate identidad
    function validateId(thisObj) {
        let fieldValue = thisObj.val();
        let pattern = /^([0-9]){13,13}$/;

        if(pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

     // Validate de telefono
    function validateTel(thisObj) {
        let fieldValue = thisObj.val();
        let pattern = /^([0-9]){8,8}$/;

        if(pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }



     // Validate del nombre
    function validateName(thisObj) {
        let fieldValue = thisObj.val();
        let pattern = /^[a-zA-Z ]*$/;

        if(pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }


     // Validate Select Multiple Tag
    function validateSelect(thisObj) {

        let fieldValue = thisObj.val();
        
        if(fieldValue.length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    // Validate CheckBox
    function validateCheckBox(thisObj) {
         
        if($(':checkbox:checked').length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    // Validate Select One Tag
    function validateSelectOne(thisObj) {

        let fieldValue = thisObj.val();
        
        if(fieldValue != null) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    // Validate Select Multiple Tag
    function validateSelectMultiple(thisObj) {

        let fieldValue = thisObj.val();
        
        if(fieldValue.length > 0) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

})();
