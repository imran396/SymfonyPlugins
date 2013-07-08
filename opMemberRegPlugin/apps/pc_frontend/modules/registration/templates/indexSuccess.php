
<style>
    .form-horizontal{
    margin-left: 50px;
}

input, select {
    height:30px;
    width:286px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #cccccc;
    padding:0 10px;
}
select{
    width:304px;
}

.control-label{
    float:left;
    text-align: left;
    width: 200px;
}
.control-group{
    margin-bottom: 10px;
}

#regbutton{
margin-left: 100px;
border:1px solid #7d99ca; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:14px;font-family:arial, helvetica, sans-serif; padding: 10px 20px 10px 20px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #a5b8da; background-image: -webkit-gradient(linear, left top, left bottom, from(#a5b8da), to(#7089b3));
 background-image: -webkit-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -moz-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -ms-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -o-linear-gradient(top, #a5b8da, #7089b3);
 background-image: linear-gradient(to bottom, #a5b8da, #7089b3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a5b8da, endColorstr=#7089b3);
}

#regbutton:hover{
 border:1px solid #5d7fbc;
 background-color: #819bcb; background-image: -webkit-gradient(linear, left top, left bottom, from(#819bcb), to(#536f9d));
 background-image: -webkit-linear-gradient(top, #819bcb, #536f9d);
 background-image: -moz-linear-gradient(top, #819bcb, #536f9d);
 background-image: -ms-linear-gradient(top, #819bcb, #536f9d);
 background-image: -o-linear-gradient(top, #819bcb, #536f9d);
 background-image: linear-gradient(to bottom, #819bcb, #536f9d);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#819bcb, endColorstr=#536f9d);
}
</style>



<div class="top_roll">
      <form class="form-horizontal" method="post">

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Name"><?php echo ($lang === 'en')?'Name':'名前'?></label>
  <div class="controls">
    <input id="Name" name="name" type="text" placeholder="" class="input-xlarge" value = "<?php echo $name = !empty($name) ? $name: '';?>">
  </div>
    <span style="color: #ff0000;"><?php echo $msg = !empty($msgName) ? $msgName: '';?></span>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Email"><?php echo ($lang === 'en')?'Email':'メール'?></label>
  <div class="controls">
    <input id="Email" name="pc_address" type="text" placeholder="" class="input-xlarge" value="<?php echo $email = !empty($email) ? $email: '';?>">
  </div>
     <span style="color: #ff0000;"><?php echo $msg = !empty($msgEmail) ? $msgEmail: '';?></span>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password"><?php echo ($lang === 'en')?'Password':'パスワード'?> </label>
  <div class="controls">
    <input id="password" name="password" type="password" placeholder="" class="input-xlarge" value="<?php echo $password = !empty($password) ? $password: '';?>">
  </div>
     <span style="color: #ff0000;"><?php echo $msg = !empty($msgPass) ? $msgPass: '';?></span>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="cpasswordinput"><?php echo ($lang === 'en')?'ReType-Password':'パスワード再入力'?> </label>
  <div class="controls">
    <input id="cpasswordinput" name="cpasswordinput" type="password" placeholder="" class="input-xlarge" value="<?php echo $cpassword = !empty($cpassword) ? $cpassword: '';?>">
  </div>
     <span style="color: #ff0000;"><?php echo $msg = !empty($msgCpass) ? $msgCpass: '';?></span>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="phone"><?php echo ($lang === 'en')?'Phone Number':'電話番号'?></label>
  <div class="controls">
    <input id="phone" name="phone" type="text" placeholder="" class="input-xlarge" value="<?php echo $phone = !empty($phone) ? $phone: '';?>">

  </div>
     <span style="color: #ff0000;"><?php echo $msg = !empty($msgPhone) ? $msgPhone: '';?></span>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="secretq"><?php echo ($lang === 'en')?'Secret Question':'秘密の質問'?></label>
  <div class="controls">
    <select id="secretq" name="secret_question" class="input-xlarge">
        <option value="1"><?php echo ($lang === 'en')?'Maiden name of the father or mother?':'父または母の旧姓は？'?></option>
        <option value="2"><?php echo ($lang === 'en')?' The last 5 digits of driver\'s license number?':'運転免許証番号の下 5 桁は？'?></option>
        <option value="3"><?php echo ($lang === 'en')?'The name of the first love?':'初恋の人の名前は？'?></option>
        <option value="4"><?php echo ($lang === 'en')?'The name of the elementary school you graduated?':'あなたが卒業した小学校の名前は？'?></option>
        <option value="5"> <?php echo ($lang === 'en')?'State name of permanent address it?':'本籍地の都道府県名は？'?></option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="secret_ans"><?php echo ($lang === 'en')?'Secret Question Answer':'秘密の質問回答'?> </label>
  <div class="controls">
    <input id="secret_ans" name="secret_answer" type="text" placeholder="" class="input-xlarge" value="<?php echo $secretanswer = !empty($secretanswer) ? $secretanswer: '';?>">
  </div>
    <span style="color: #ff0000;"><?php echo $msg = !empty($msgSecret) ? $msgSecret: '';?></span>
</div>

<!-- Button -->
<div class="control-group" style="">
  <label class="control-label" for="regbutton">&nbsp;&nbsp;&nbsp;</label>
  <div class="controls">
    <button id="regbutton" name="singlebutton" class="btn btn-primary"><?php echo ($lang === 'en')?'Send':' 送信する'?></button>
  </div>
</div>

</form>

      <br class="both" />

   </div>
