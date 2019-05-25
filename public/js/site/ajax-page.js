$(function() {
    //var site_url = 'http://localhost/flower/';
    var site_url = $('#website_url').val()+'/';

    $.validator.addMethod("valid_email", function(value, element) {
        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }, "Please enter a valid email.");

    // For register user
    $("#registrationForm").validate({
        ignore: ".ignore",
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            term_check: {
                required: true
            },
            countries_id: {
                required: true
            },
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        errorPlacement: function(label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        },
        submitHandler: function (form) {
            $('.register_alert-danger').hide();
            $('.register_alert-danger').html('');
            $('.register_alert-success').hide();
            $('.register_alert-success').html('');
            $('.regsterFrm').addClass('loading');
            //var ajax_url = "{{route('site.users.register')}}";
            var reg_ajax_url = site_url+'users/register';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: reg_ajax_url,
                method: 'post',
                data: {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    confirm_password: $('#confirm_password').val(),
                    countries_id: $('#countries_id').val(),
                    mobile: $('#mobile').val(),
                    // CaptchaCode: $('#CaptchaCode').val()
                },
                success: function(data){
                    // $('#CaptchaCode').val('');
                    // $('#RegisterCaptcha_ReloadIcon').trigger( "click" );
                    $('.regsterFrm').removeClass('loading');
                    $.each(data.errors, function(key, value){
                        $('.register_alert-danger').show();
                        $('.register_alert-danger').append('<p>'+value+'</p>');
                    });
                    if(data.success){
                        $('.register_alert-success').show();
                        $('.register_alert-success').append('<strong>Success!</strong><p> '+data.success+'</p>');
                        $('#registrationForm')[0].reset();
                    }
                }
            });
            return false;
        }
    });

    // For login //
    $("#Userlogin").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        errorPlacement: function(label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        },
        submitHandler: function (form) {
            $('#Userlogin').addClass('loading');

            $('.login_alert_danger').hide();
            $('.login_alert_danger').html('');
            $('.login_alert_success').hide();
            $('.login_alert_success').html('');

            //var ajax_url = "{{route('site.users.register')}}";
            var login_ajax_url = site_url+'users/login';
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url: login_ajax_url,
                method: 'POST',
                data: {
                    email: $('#login_email').val(),
                    password: $('#login_password').val(),
                },
                success: function(data){
                    setTimeout(function(){
                        if(data.success){
                            $('#Userlogin')[0].reset();
                            $('.login_alert_success').show();
                            $('.login_alert_success').append('<strong>Success!</strong><p> '+data.success+'</p>');
                            /*setTimeout(function(){
                                window.location.href = site_url+'users/dashboard';
                            }, 1000);*/
                            $('.is_logged_in').val('Y');
                            if($('#command').find('.after_login').length){
                              $('#command').find('.after_login').each(function(){
                                var command = $(this).text();
                                command = JSON.parse(command);
                                $('[data-id="'+command.id+'"]').click();
                              });
                              redirectDashboard();
                            }else{
                              $('#Userlogin').removeClass('loading');
                              window.location.href = site_url+'users/dashboard';
                            }
                        }else if(data.error){
                            $('.is_logged_in').val('N');
                            $('.login_alert_danger').show();
                            $('.login_alert_danger').html('<p>'+data.error+'</p>');
                            $('#Userlogin').removeClass('loading');
                            setTimeout(function(){ $('.login_alert_danger').hide(); }, 4000);
                        }
                    }, 1000);
                }
            });
           return false;
        }
    });

    var interval_redirect = '';
    function redirectDashboard(){
      interval_redirect = setInterval(function () {
        if($('#command').find('.after_login').length == 0){
          clearInterval(interval_redirect);
          window.location.reload(true);
          //window.location.href = site_url+'users/dashboard';
        }
      }, 10);
    }

    /* Forgot password */
    $("#UserForgot").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        errorPlacement: function(label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        },
        submitHandler: function (form) {
            $('.forgot_alert_danger').hide();
            $('.forgot_alert_danger').html('');
            $('.forgot_alert_success').hide();
            $('.forgot_alert_success').html('');

            //var ajax_url = "{{route('site.users.register')}}";
            var forgot_ajax_url = site_url+'sendResetLinkEmail';
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url: forgot_ajax_url,
                method: 'post',
                data: {
                    email: $('#forgot_email').val()
                },
                success: function(data){
                    if(data.success){
                        $('.forgot_alert_success').show();
                        $('.forgot_alert_success').append('<strong>Success!</strong><p> '+data.success+'</p>');
                        $('#UserForgot')[0].reset();
                    }else if(data.errors){
                        $('.forgot_alert_danger').show();
                        $('.forgot_alert_danger').html('<p>'+data.errors+'</p>');
                        setTimeout(function(){ $('.forgot_alert_danger').hide(); }, 4000);
                    }
                }
            });
           return false;
        }
    });

    // For reset password
    $("#resetPasswordForm").validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#reset_password"
            },
        },
        errorPlacement: function(label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function(element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        },
        submitHandler: function (form) {
            $('.resetpassword_alert_danger').hide();
            $('.resetpassword_alert_danger').html('');
            $('.resetpassword_alert_success').hide();
            $('.resetpassword_alert_success').html('');

            //var ajax_url = "{{route('site.users.register')}}";
            var reset_pass_ajax_url = site_url+'resetPassword';
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
            $.ajax({
                url: reset_pass_ajax_url,
                method: 'post',
                data: {
                    password: $('#reset_password').val(),
                    token: $('#reset_token_value').val(),
                },
                success: function(data){
                    if(data.success){
                        $('.resetpassword_alert_success').show();
                        $('.resetpassword_alert_success').append('<strong>Success!</strong><p> '+data.success+'</p>');
                        $('#resetPasswordForm')[0].reset();
                        setTimeout(function(){
                            window.location.href = site_url+'?login=yes';
                        }, 4000);
                    }else if(data.error){
                        $('.resetpassword_alert_danger').show();
                        $('.resetpassword_alert_danger').html('<p>'+data.error+'</p>');
                        $('#resetPasswordForm')[0].reset();
                        setTimeout(function(){ $('.resetpassword_alert_danger').hide(); }, 4000);
                    }
                }
            });
           return false;
        }
    });
});

function recaptchaCallback() {
    $('#hiddenRecaptcha').valid();
};


//Delete address from user account path http://flowerindiawide.com/users/my-addresses
function delete_address_my_account(id) {
    //var site_url = 'http://localhost/flower/';
    var site_url = $('#website_url').val()+'/';
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4ba51f',
        cancelButtonColor: '#fcc225',
        confirmButtonText: 'Yes'
    }).then((result) => {
        var flower_ajax_url = site_url+'users/delete-address';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (result.value) {
            $.ajax({
                url: flower_ajax_url,
                method: 'POST',
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(response){
                    if(response.type == 'success'){
                        swal({title: response.title, text: response.message, type: response.type}).then(function(){
                               location.reload();
                           }
                        );
                        $('#my_address_'+id).remove();
                    }else{
                        setTimeout(function () {
                            swal(response.title, response.message, response.type);
                        }, 200);
                    }
                }
            });
        }
    });
}
