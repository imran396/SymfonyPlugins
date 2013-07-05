
<div class="top_roll">

<form action="" method="post">
          <div class="mail_box mt30">
          <input name="verificatincode" type="text" class="mail_form" />
           <span style="color:red;"> <?php echo $invalidMessage;?></span>
          </div>
          <!--mail_box-->

          <p class="text_center mt30"><?php echo $lang === 'en'?'We have sent verification code in your moble phone. Please verify with this code for first time logged in':'私達はあなたの頭をすっぽり包む携帯電話に確認コードを送信しました。ログインして初めて、このコードで確認してください'?> </p>

        <div class="soushin_btn mt20">
            <input type="submit" value="<?php echo ($lang === 'en')?'Submit':'提出する'?>">
         </div>
 </form>
</div>