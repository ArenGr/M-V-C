<link rel="stylesheet" href="/public/css/profile.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<div class="float-container">
  <div class="float-child-1">
    <div class="container mb-2" id="friends">
    <button class="btn btn-outline-success ml-5" id="chat" data-friendId="<?=$this->id?>"><a href="/chat/conversation/<?=$this->id?>/<?=$this->name?>">Chat</a></button>
      
      <div class="friends-list ml-5 pt-3">
      </div>
    </div>
  </div>
  <div class="float-child">
    <div class="container mb-2 mt-3 ml-10" id="header">
      <div class="row">
        <div class="col-lg-5 col-md-20 mb-lg-1 pl-1 pt-1 mb-4">
          <div class="card testimonial-card" id="avatar">
            <div id="image_preview" class="avatar mx-auto white mt-4" >
            <img src="/public/images/<?=$this->avatar?>" class='img-fluid img-thumbnail'>
            </div>
            <div class="card-body">
              <hr>
              <p class="dark-grey-text mt-4 ml-5"><i class="fa fa-quote-left pr-5"></i><b>Web Software Developer </b></p>
            </div>
          </div>
        </div>
        <div>
          <div id="logout">
            <a href="/profile" class="btn btn-outline-info mt-1 ">My Profile</a>
          </div>
          <div id="user_data">
            <span class="user_info"> <b>Name:</b> <?=$this->name?> </span><br>
            <br>
            <span class="user_info"> <b>Email:</b> <?=$this->email?></span><br>
            <br>
            <span class="user_info"> <b>Skills: </b>PHP, JavaScript, Python</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
