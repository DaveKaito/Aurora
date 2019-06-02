$("document").ready(function() {
  /* handle form validation */
  $("#register_form").validate({
    rules: {
      username: {
        required: true,
        minlength: 3
      },
      password: {
        required: true,
        minlength: 5,
        maxlength: 15
      },
      cpassword: {
        required: true,
        equalTo: "#password"
      },
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      username: "please enter user name",
      password: {
        required: "please provide a password",
        minlength: "password at least have 8 characters"
      },
      email: "please enter a valid email address",
      cpassword: {
        required: "please retype your password",
        equalTo: "password doesn't match !"
      }
    },
    submitHandler: submitForm
  });
  /* handle form submit */
  function submitForm() {
    var data = $("#register_form").serialize();
    $.ajax({
      type: "POST",
      url: "../functions/proc_register.php",
      data: data,
      beforeSend: function() {
        $("#error").fadeOut();
        $("#btn-submit").html(
          '<i class="fas fa-exchange-alt"></i>   sending ...'
        );
      },
      success: function(response) {
        if (response == 1) {
          $("#error").fadeIn(1000, function() {
            $("#error").html(
              '<div class="alert alert-danger">   <span class="glyphicon glyphicon-info-sign"></span> User with this e-mail already exists !</div>'
            );
            $("#btn-submit").html(
              '<span class="glyphicon glyphicon-log-in"></span>   Create Account'
            );
          });
        } else if (response == "registered") {
          $("#btn-submit").html(
            '<i class="fas fa-star-christmas fa-spin"></i>   Signing Up ...'
          );
          setTimeout(
            '$(".form-signin").fadeOut(500, function(){ $(".register_container").load("welcome.php"); }); ',
            3000
          );
        } else {
          $("#error").fadeIn(1000, function() {
            $("#error").html(
              '<div class="alert alert-danger"><i class="fas fa-skull-crossbones"></i> ERROR !</div>'
            );
            $("#btn-submit").html(
              '<span class="glyphicon glyphicon-log-in"></span>   Create Account'
            );
          });
        }
      }
    });
    return false;
  }
});
