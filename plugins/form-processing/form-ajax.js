
var validator = {
    validateName: function() {
        return (nameInput.length > 0 && nameInput.length <= 5000);
    },
    validateEmail: function() {
        return (emailInput.length > 0 && emailInput.length <= 5000);
    },
    validateSubject: function() {
        return (subjectInput.length > 0 && subjectInput.length <= 5000);
    },
    validateMessage: function() {
        return (messageInput.length > 0 && messageInput.length <= 5000);
    }
};
    validator.validateForm = function() {
        
        nameInput = jQuery('#name-input').val();
        emailInput = jQuery('#email-input').val();
        subjectInput = jQuery('#subject-input').val();
        messageInput = jQuery('#message-input').val();
        jQuery('form').addClass('was-validated');
        
        if(validator.validateName() && validator.validateEmail() && validator.validateSubject() && validator.validateMessage()) {
            jQuery('#contact-form-submit').prop('disabled', false);
            
        } else {
            jQuery('#contact-form-submit').prop('disabled', true);
        }
    }

jQuery(document).ready(function() {

    jQuery('#name-input, #email-input, #subject-input, #message-input').change(validator.validateForm);
    jQuery('#name-input, #email-input, #subject-input, #message-input').keyup(function() { 
        jQuery(this).trigger("change"); 
    });

    jQuery("#contact-form-submit").click(function(event) {
        // Prevent default submit button behavior.
        event.preventDefault();

        // Remove any alert messages from the DOM.
        jQuery('.alert').remove();


        // Store form field values in a serialized manner.
        var formData = new FormData();
        formData.append('action', 'process_form');
        formData.append('name-input', jQuery('#name-input').val());
        formData.append('email-input', jQuery('#email-input').val());
        formData.append('subject-input', jQuery('#subject-input').val());
        formData.append('message-input', jQuery('#message-input').val());
        formData.append('g-recaptcha-response', grecaptcha.getResponse());

        // Attach any files to the form data.
        for(var i = 0; i < document.getElementById('file-input').files.length; i++) {
            let file = document.getElementById('file-input').files[i];
            formData.append('image'+ i, file, file.name);
        }

        // Send form data and files to server.
        jQuery.ajax({url: ajax_object.ajax_url, 
            type: "POST", 
            processData: false,
            contentType: false,
            data: formData,
            success: function(data, status, xhr) {
                jQuery('.alert').remove();

                // If email has sent, display success message. Otherwise, display error message.
                if (data == "Success") {
                    jQuery('#contact-form-section').prepend('<div class="alert alert-success" role="alert"><i style="padding-right: 10px;" class="far fa-check-circle"></i>Your message has been received!</div>');
                } else {
                    jQuery('#contact-form-section').prepend('<div class="alert alert-danger" role="alert"><i style="padding-right: 10px;" class="far fa-times-circle"></i>Message not sent: <br>' + data + '</div>');
                }
            },   
            error: function(xhr, status, error) {
                // Display AJAX request error message.
                jQuery('#contact-form-section').prepend('<div class="alert alert-danger" role="alert">Server error. Message not sent:<br>Please contact us directly at ralphjuden@gmail.com</div>');
            }
        });

        // If files were submitted with form, display loading message & spinner while waiting for files to upload.
        if(document.getElementById('file-input').files.length > 0) {
            jQuery('#contact-form-section').prepend('<div class="alert alert-info" role="alert">Sending message.  <img src="'+ ajax_object.plugin_folder +'/form-processing/spinner.svg" alt="Kiwi standing on oval"></div>');
        }

    });
});

(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('#contact-form-submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

