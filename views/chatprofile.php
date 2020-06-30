<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<body>
  <div style="margin-left: 1220px; margin-top: 20px;"><a href="/profile" class="btn btn-outline-info">Go Back</a></div>
  <div align="center" id="chat-with" data-id="<?=$this->to_id?>">Chat with <?= $this->name?> </div>
  <div style="margin-top: 20px;">
    <div class="container-fluid" style="width:800px; margin:0 auto; padding: 5px;">
      <article class="card-body">
        <div style="height:500px; border:1px solid #ccc; overflow-y: scroll; padding:16px;" class="chat_history" id="chat-board">
          <ul class="list-unstyled">
            <?php foreach ($this->user_messages as $key):?>
            <tr>
              <td>
                <?php if($key['from_to_id'] != $this->to_id) : ?>
                <li style="border-bottom:1px dotted #ccci">
                  <p>
                    <?=$key['body'];?>
                    <div align="left" id="bl">
                      <small><em><?=$key['date'];?></em></small>
                    </div>
                  </p>
                </li>
                <?php else: ?>
                <li style="border-bottom:1px dotted #ccci" align="right">
                  <p id="block">
                    <img src='/public/images/<?=$key['avatar'];?>' width='50px'><br>
                    <?=$key['body'];?>
                    <div align="right">
                      <small><em><?=$key['date'];?></em></small>
                    </div>
                  </p>
                </li>
                <?php endif;?>
              </td>
            </tr>
            <br>
            <?php endforeach;?>
            <span id="user_block">
            </span>
          </ul>
        </div>
        <div class="form-group">
          <span>
            <input id="user-message" class="form-control" name="message" style="width:91%; float:left;"/>
          </span>
          <span>
          <button id="send_msg" class="btn btn-outline-success" data-image="<?=$this->image?>"  data-id="<?=$this->to_id;?>" />Send</button>
        </div>
      </article>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/public/js/showeMessages.js"></script>
</body>
