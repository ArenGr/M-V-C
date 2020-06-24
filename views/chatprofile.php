<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="../public/js/chat_ajax.js"></script> -->
<div style="margin-top: 20px;">
  <div class="container-fluid" style="width:800px; margin:0 auto; padding: 5px;">
    <article class="card-body">
      <div style="height:500px; border:1px solid #ccc; overflow-y: scroll; padding:16px; background-color: tan;" class="chat_history" id="a">
        <?php echo $this->message;?>
      </div>
      <div class="form-group">
        <form action="" method="POST">
          <span>
            <input id="text" class="form-control" name="message" style="width: 91%; float: left;" />
          </span>
          <span>
          <input type="submit" id="send_msg" class="btn btn-success" value="Send" name="send_button" data-id="<?=$this->to_id?>"/>
        </form>
      </div>
    </article>
  </div>
</div>
