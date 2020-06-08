<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type='text/css'>
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <title>Home</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="card bg-light">
        <article class="card-body mx-auto">
            <h4 class="card-title mt-3 text-center">login</h4>
            <form action="/" method="post">
              <div class="form-group input-group">
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  <input name="input_email" class="form-control" placeholder="Enter email" type="text">
                </div>
              </div>
              <div class="form-group input-group">
                <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  <input name="input_password" class="form-control" placeholder="Enter password" type="password">
                </div>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success btn-block rounded" value="login" name="login_submit" id="button">
              </div>
              <p class="text-center"><i>Have an account? </i><a href="/Home/reg" id="sign">sign up</a></p>
            </form>
        </article>
      </div>
  </body>
</html>
