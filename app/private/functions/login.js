$("document").ready(function() {
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
        $("#error2").fadeOut();
        $("#login_button").html("  sending ...");
      },
      success: function(response) {
        if (response == "ok") {
          $("#login_btn").html(
            '<div><i class="fas fa-spinner"></i>  Signing In ...</div>'
          );
          setTimeout(' window.location.href = "profile.php"; ', 2000);
        } else if (response == "nope") {
          $("#error2").fadeIn(1000, function() {
            $("#error2").html(
              '<div class="alert alert-danger"><i class="fas fa-skull-crossbones"></i> E-mail or Password wrong! </div>'
            );
            $("#login_btn").html("   Sign In");
          });
        } else if (response == "admin") {
          $("#login_btn").html(
            '<div><i class="fas fa-spinner"></i>  Signing In ...</div>'
          );
          setTimeout(
            ' window.location.href = "../../private/dashboard.php"; ',
            2000
          );
        }
      }
    });
    return false;
  }
});
