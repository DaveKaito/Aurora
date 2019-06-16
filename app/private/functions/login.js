// i decided to try ajax for this form because i was really intersted in making a form validation with it. I used the Jquery validation Library for this.

//the form gets sent from login.php to this file, where i check if the inputs are empty. If validate = true the form gets passed to submitLogin, where the post gets sent to my proc_login.php. This file checks all the db relevant stuff and outputs and echo depending on the result. This echo will be picked up by the associated response funtion and sends the user/admin to the next page. If the login is not succesful the user will get informed.
$("document").ready(function() {
  //i set the rules for the inputs here
  $("#login-form").validate({
    rules: {
      password: {
        required: true
      },
      email: {
        required: true,
        email: true
      }
    },
    //and the depending messages here
    messages: {
      password: {
        required: "please enter your password"
      },
      email: "please enter your email address"
    },
    submitHandler: submitLogin
  });
  function submitLogin() {
    var data = $("#login-form").serialize();
    $.ajax({
      type: "POST",
      url: "../../private/functions/proc_login.php",
      data: data,
      beforeSend: function() {
        $("#msg").fadeOut();
        $("#login_btn").html(
          '<div><i class="fas fa-spinner fa-spin mr-2"></i>Signing In ...</div>'
        );
      },
      success: function(response) {
        if (response == "user") {
          $("#login_btn").html(
            '<div><i class="fas fa-spinner fa-spin mr-2"></i>Signing In ...</div>'
          );
          setTimeout(' window.location.href = "profile.php"; ', 2000);
        } else if (response == "admin") {
          $("#login_btn").html(
            '<div><i class="fas fa-spinner fa-spin mr-2"></i>Signing In ...</div>'
          );
          setTimeout(
            ' window.location.href = "../../private/dashboard.php"; ',
            2000
          );
        } else if (response == "err") {
          $("#msg").fadeIn(1000, function() {
            $("#msg").html(
              '<div class="alert alert-danger"><i class="fas fa-skull-crossbones"></i> E-mail or Password wrong! </div>'
            );
            $("#login_btn").html("Sign In");
          });
        }
      }
    });
    return false;
  }
});
