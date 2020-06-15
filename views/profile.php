<style type="text/css" media="screen">
.help-block{
    font-size: 12px;
    color: red;
    margin-left: 37px;
}
</style>
<?php $avatar = "<img src='$this->avatar' class='img-fluid img-thumbnail' width='200'>";?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<div class="container mb-2 mt-2 ml-10" id="header">
  <div class="row">
    <div class="col-lg-5 col-md-20 mb-lg-1 pl-1 pt-1 mb-4">
      <div class="card testimonial-card" id="avatar">
        <div id="image_preview" class="avatar mx-auto white mt-4" >
            <?php echo !isset($this->avatar) ? "<img src='../public/images/layout/avatar.png' class='img-fluid img-thumbnail'>" : $avatar?>
        </div>
            <div>
                <span class="help-block mr-5"><?php echo $this->file_size_err; ?></span>
                <span class="help-block"><?php echo $this->file_type_err; ?></span>
            </div>
        <div id="message"></div>
        <div class="card-body">
          <form  id="uploadimage" action="/ProfileImage" method="post" enctype="multipart/form-data">
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
        <a href="logout" class="btn btn-outline-danger mt-4 ">Logout</a>
      </div>
      <div id="data">
        <span class="user_info"> <b>Name:</b> <?=$this->user_name?> </span><br>
        <br>
        <span class="user_info"> <b>Email:</b> <?=$this->user_email?></span><br>
        <br>
        <span class="user_info"> <b>Skills: </b>PHP, JavaScript, Python</span>
      </div>
    </div>
  </div>
</div>

