<?php
if(!empty($_SESSION['message'])){
  $mesMessage=$_SESSION['message'];
  foreach($mesMessage as $key=>$message){
  echo '<div class="container" pt -5">
   <div class="alert alert- ' .$key.'warning alert-dismissible fade show" role="alert">'.$message.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  </div>';
  }
  $_SESSION['message']=[];
  }
  ?>