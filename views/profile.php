<link rel="stylesheet" href="../public/css/profile.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<div class="float-container">
  <div class="float-child-1">
    <div class="container mb-2" id="friends">
      <button class="btn btn-outline-success ml-5" id="showe_friends" data-id="<?=$_SESSION['user_id']?>">Friends</button>
      <div class="friends-list ml-5 pt-3"> </div>
    </div>
  </div>
  <div class="float-child">
    <div class="container mb-2 mt-3 ml-10" id="header">
      <div class="row">
        <div class="col-lg-5 col-md-20 mb-lg-1 pl-1 pt-1 mb-4">
          <div class="card testimonial-card" id="avatar">
            <div id="image_preview" class="avatar mx-auto white mt-4" >
              <?php if(!isset($this->avatar)) : ?>
              <img src='/images/layout/avatar.png' class='img-fluid img-thumbnail' width='200'>
              <?php else: ?>
              <img src="/images/<?=$this->avatar ?>" class='img-fluid img-thumbnail' width='200'>
              <?php endif;?>
            </div>
            <div>
              <span class="help-block mr-5"><?php echo helpers\FlashHelper::getFlash('file_type_err')?></span>
              <span class="help-block mr-5"><?php echo helpers\FlashHelper::getFlash('file_size_err')?></span>
            </div>
            <div id="message"></div>
            <div class="card-body">
              <form  id="uploadimage" action="profile/profileImage" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="custom-file" id="customFile" lang="es">
                    <input type="file" class="custom-file-input"  name="image[]" id="input-file" multiple>
                    <label class="custom-file-label" for="input-file">
                      Select file...
                    </label>
                  </div>
                </div>
                <div class="ml-5">
                  <div class="ml-5">
                    <input  type="submit" class="btn btn-outline-success ml-5" name="change" value="Change">
                  </div>
                </div>
              </form>
              <hr>
              <p class="dark-grey-text mt-4 ml-5"><i class="fa fa-quote-left pr-5"></i><b>Web Software Developer </b></p>
            </div>
          </div>
        </div>
        <div>
          <div id="logout">
            <a href="auth/logout" class="btn btn-outline-danger mt-1 ">Logout</a>
          </div>
          <div id="user_data">
            <span class="user_info"> <b>Name:</b> <?=$this->user_name?> </span><br>
            <br>
            <span class="user_info"> <b>Email:</b> <?=$this->user_email?></span><br>
            <br>
            <span class="user_info"> <b>Skills: </b>PHP, JavaScript, Python</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/public/js/showeFriends.js"></script>
