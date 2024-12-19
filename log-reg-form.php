<div class="login-form-main">
  <div class="wrapper">
    <a class="icon-close"><ion-icon name="close-outline"></ion-icon></a>
    <div class="form-box login">
      <h2>Login</h2>
      <form action="" method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" name="remember">Remember Me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" name="login" class="btn-log">Login</button>
        <div class="login-register">
          <p>Don't have an account? <a class="register-link">Register</a></p>
        </div>
      </form>
    </div>

    <div class="form-box register">
      <h2>Registration</h2>
      <form action="" method="POST">
        <div class="d-flex">
          <div class="input-box mx-1">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="name" required>
            <label>Name</label>
          </div>
          <div class="input-box mx-1">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="surname" required>
            <label>Surname</label>
          </div>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="person"></ion-icon></span>
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" name="agree_terms">I agree to terms & conditions.</label>
        </div>
        <button type="submit" name="register" class="btn-log btn-register">Register</button>
        <div class="login-register">
          <p>Already have an account? <a class="login-link">Login</a></p>
        </div>
      </form>
    </div>
  </div>
</div>