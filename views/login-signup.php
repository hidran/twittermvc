

<div class="modal fade" id="loginsignup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="loginModalTitle">Login</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<form id="loginsignupForm" method="post">
<input type="hidden" name="loginActive" id="loginActive" value="1">
<input type="hidden" name="action" value="loginSignUp">
<div class="form-group">
<label for="email">Email </label>
<input type="email"  name="email" class="form-control" placeholder="email address" id="email" aria-describedby="emailHelp">
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password"  name="password" placeholder="password" class="form-control" id="password">
</div>
<div class="form-group row d-flex justify-content-end">
<div class="col-md-4 offset-md-4">
<a href="#" class="btn btn-default" id="toggleLogin">Sign up</a>
</div>
<div class="col-md-4">
<button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
</div>
</div>

</form>
</div>

</div>
</div>
</div>

<script>
$('#toggleLogin').click(function(evt){
    
    let loginActive = $('#loginActive');
    let modalTile  = $('#loginModalTitle');
    let loginSignupButton = $('#loginSignupButton');
    evt.preventDefault();
  
    
    if(loginActive.val() === '1'){
        evt.target.innerHTML = 'Login';
        loginActive.val(0);
        modalTile.html('Sign up');
        loginSignupButton.html('Sign up');
    } else {
        loginActive.val(1);
        modalTile.html('Login');
        loginSignupButton.html('Login');
        evt.target.innerHTML = 'Signup';
    }
});

$('#loginSignupButton').click(function(evt){
    evt.preventDefault();
   $.ajax({
       method: 'POST',
       url:'actions.php',
       data : $('#loginsignupForm').serialize(),
       success: function(data){
        console.log(data);
       },
       failure: function(){

       }


   });

});
</script>
