

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
      <form>
          <input type="hidden" name="loginActive" id="loginActive" value="1">
          <input type="hidden" name="action" value="loginSignUp">
  <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" placeholder="email address" id="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" placeholder="password" class="form-control" id="password">
  </div>
  

</form>
      </div>
      <div class="modal-footer">
        <a href="#" id="toggleLogin">Sign up</a>
        <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
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
      alert(loginActive.val());

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
        
    });
    </script>
