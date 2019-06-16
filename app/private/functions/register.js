//This file is basically the same, except it has some more restrictions. I explained alot about this process in login.js

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
        maxlength: 30
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
          '<div><i class="fas fa-spinner fa-spin mr-2"></i>Signing Up ...</div>'
        );
      },
      success: function(response) {
        if (response == "err") {
          $("#msg").fadeIn(1000, function() {
            $("#msg").html(
              '<div class="alert aj alert-warning"><i class="fas fa-exclamation-triangle"></i> User with this e-mail already exists !</div>'
            );
            $("#btn-submit").html("Create Account");
          });
        } else if (response == "registered") {
          $("#btn-submit").html(
            '<div><i class="fas fa-spinner fa-spin mr-2"></i>Signing Up ...</div>'
          );
          $("#msg").html(
            '<div class="alert alert-success"> You have successfully registered! Please login on the next page </div>'
          );
          setTimeout(' window.location.href = "login.php"; ', 5000);
        } else {
          $("#msg").fadeIn(1000, function() {
            $("#msg").html(
              '<div class="alert aj alert-danger"><i class="fas fa-skull-crossbones"></i> ERROR !</div>'
            );
            $("#btn-submit").html(" Create Account");
          });
        }
      }
    });
    return false;
  }
});
