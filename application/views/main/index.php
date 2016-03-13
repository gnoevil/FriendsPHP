<!DOCTYPE html>
<html>
<head>
    <title>Login/Registration</title>
    <?php $this->load->view('partials/header.php')	?>
    <?php $this->load->view('partials/navigation.php')	?>
    <div class="container">
        <div class="main">
<div class="register col-lg-6">
<?php
    if($this->session->flashdata("registration_errors"))
        {
            echo $this->session->flashdata("registration_errors");
        }
    ?>
<div class="panel-heading">
    <h3 class="panel-title">Register</h3>
    <form  role="form" action='/register' method='post'>
    <div class="form-group col-lg-4">
        <label for="name">Name:</label>
        <input type='text' name='name' class="form-control"></input>
    </div>
    <div class="form-group col-lg-4">
        <label for="alias">Alias:</label>
        <input type='text' name='alias' class="form-control"></input>
    </div>
    <div class="form-group col-lg-4">
        <label for="email">Email:</label>
        <input type='email' name='email' class="form-control"></input>
    </div>
    <div class="form-group col-lg-4">
        <label for="password">Password:</label>
        <input type='password' name='password' class="form-control"></input>
    </div>
    <div class="form-group col-lg-4">
        <label for="passconf">Confirm PW:</label>
        <input type='password' name='passconf' class="form-control"></input>
    </div>
    <div class="form-group col-lg-4">
        <label for="dob">Date of Birth:</label>
        <input type='date' name='dob' class="form-control"></input>
    </div>

    <input type='submit' value='Register' class="btn btn-success"></input>

  </form>
  </div>
  </div>
  <div class="login col-lg-6">
<div class="panel-heading">
  <h3 class="panel-title">Login</h3>

  <form   role="form" action='/login' method='post'>

    <div class="form-group col-lg-4">
        <label for="email">Email:</label>
        <input type='email' name='email' class="form-control"></input>
    </div>
    <div class="form-group col-lg-4">
        <label for="password">Password:</label>
        <input type='password' name='password' class="form-control"></input>
    </div>

    <br><input type='submit' value='Log in' class="btn btn-success"></input>

  </form>

  </div>
  <?php   if($this->session->flashdata("login_errors"))
        {
            echo $this->session->flashdata("login_errors");
        }
    ?>
</div>
</div>
</div>
</body>
</html>
