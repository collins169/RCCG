$(document).ready(function(){
                /*Submitting Visistor Comment*/
               $("#registration_form").submit(function(event){
                    // Stop form from submitting normally
                    event.preventDefault();
                   $('#registration_form').find('[name="register-btn"]').html('<i class="fas fa-circle-notch fa-spin fa-fw"></i> Saving...');
                   $('#registration_form').attr('disabled', true);
                    // Send the form data using post
                   var data = new FormData(this);
                    $.ajax({ 
                        url: "php/register.php",
                        type: "POST",
                        contentType: false,
                        dataType: "json",
                        cache: false,
                        processData:false,
                        async: false,
                        data: new FormData(this),
                        success: function(response){
                           console.log(response);
                         if (response.respCode == 0 || response.respMsg == "SUCCESS") {
                            swal({
                                title:'Success',
                                text: "Thank you for registering",
                                type: 'success',
                                allowOutsideClick: true,
                                confirmButtonClass: 'btn-success',
                            })
                             $('#registration_form').find('[name="register-btn"]').removeClass('btn-error');
                        $('#registration_form').find('[name="register-btn"]').html('<i class="fas fa-check-circle"></i> Saved').addClass('btn-passed');
                             $('#registration_form').attr('disabled', true);
                             setInterval( function() {
                                 $('#registration_form').trigger("reset");
                                 $('#registration_form').find('[name="register-btn"]').removeClass('btn-passed');
                        $('#registration_form').find('[name="register-btn"]').html('Register').addClass('btn-agile');
                             }, 3000);
                    } else {
                        $('#registration_form').find('[name="register-btn"]').removeClass('btn-agile');
                        
                        $('#registration_form').find('[name="register-btn"]').html('<i class="fa fa-times fa-fw"></i> Failed').addClass('btn-error');
                           swal({
                                title:'Error',
                                text: response.respMsg,
                                type: 'error',
                                allowOutsideClick: true,
                                confirmButtonClass: 'btn-success',
                            })
                        }
                    }
                });
            });
        });