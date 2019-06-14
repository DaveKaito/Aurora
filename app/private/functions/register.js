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
        minlength: 8,
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
      username: "please enter a username",
      password: {
        required: "please provide a password",
        minlength: "password should at least have 8 characters"
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
      url: "../../private/functions/proc_register.php",
      data: data,
      beforeSend: function() {
        $(".alert").fadeOut();
        $("#btn-submit").html(
          '<i class="fas fa-star-christmas fa-spin"></i> Sending ...'
        );
      },
      success: function(response) {
        if (response == 1) {
          $("#error").fadeIn(1000, function() {
            $("#error").html(
              '<div class="alert alert-danger">   <span class="glyphicon glyphicon-info-sign"></span> User with this e-mail already exists !</div>'
            );
            $("#btn-submit").html("Create Account");
          });
        } else if (response == "registered") {
          $("#btn-submit").html(
            '<i class="fas fa-star-christmas fa-spin"></i>   Signing Up ...'
          );
          setTimeout(' window.location.href = "login.php"; ', 2000);
        } else {
          $("#error").fadeIn(1000, function() {
            $("#error").html(
              '<div class="alert alert-danger"><i class="fas fa-skull-crossbones"></i> ERROR !</div>'
            );
            $("#btn-submit").html(" Create Account");
          });
        }
      }
    });
    return false;
  }
});
