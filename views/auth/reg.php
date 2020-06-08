<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type='text/css'>
<body>
  <div class="container-fluid">
    <div class="card bg-light">
      <article class="card-body mx-auto">
        <h4 class="card-title mt-3 text-center">create your account</h4>
        <form action="/Auth/reg" method="post">
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              <input name="input_user_name" class="form-control" placeholder="User name" type="text">
            </div>
            <div>
            </div>
          </div>
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              <input name="input_email" class="form-control" placeholder="Email address">
            </div>
            <div>
            </div>
          </div>
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              <input name = "input_password" class="form-control" placeholder="Enter password" type="password">
            </div>
          </div>
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              <input name = "input_conf_password" class="form-control" placeholder="Repeat password" type="password">
            </div>
            <div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success btn-block rounded" name="submit" value="create account" id="button">
          </div>
          <p class="text-center"><i>Have an account? </i><a href="/Auth/index">log in</a> </p>
        </form>
      </article>
    </div>
</body>
