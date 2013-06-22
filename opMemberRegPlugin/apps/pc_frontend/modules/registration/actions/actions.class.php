<?php

/**
 * registration actions.
 *
 * @package    OpenPNE
 * @subpackage registration
 * @author     Your name here
 */

require_once(dirname(__FILE__).'/../../../../../lib/vendor/twilio/Services/Twilio.php');

class registrationActions extends sfActions
{
    public  $AccountSid = "ACd4fda573b65520120264c5b8838efdfb";
    public  $AuthToken = "91e6d76101550d9a4e9e1cb7c9d7da70";

 /**
  * Executes index action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     $client = new Services_Twilio($this->AccountSid, $this->AuthToken);
    if($request->isMethod(sfWebRequest::POST)){
        $formdata =  $this->validation($_POST);
        $this->bindPostDataIntoFrom($_POST);
        if(empty($formdata)){
         $obj = new Member();
         $obj->setName($_POST['name']);
         $obj->save();
         $member_id = $obj->getId();
         $obj->generateApiKey();
         $apiKey = $obj->getApiKey();
         $_POST['api_key'] =  $apiKey;
         $_POST['password']= md5($_POST['password']);
         $name = $_POST['name'];
         unset($_POST['name']);
         unset($_POST['singlebutton']);
         unset($_POST['cpasswordinput']);
         $verify_key = $member_id.'C'.mt_rand(1, 9999);
         $_POST['telephone_auth'] =  $verify_key;

    foreach($_POST as $key => $val ){
         $namvaluehasKey = $this->generateNameValueHash($key,$val);
         $cofigobj = new MemberConfig();
         $cofigobj->setMemberId($member_id);
         $cofigobj->setName($key);
         $cofigobj->setValue($val);
         $cofigobj->setNameValueHash ($namvaluehasKey);
         $cofigobj->save();
    }

     $sms = $client->account->sms_messages->create(
            "+1 857-777-5778",
            trim($_POST['phone']),
            "Hey $name, for verificatin to space share please enter $verify_key into input box"
        );

      unset($_POST);
      $this->redirect('registration/verify');
      }
   }
    return sfView::SUCCESS;

  }

  private  function generateNameValueHash($name, $value)
  {
    return md5($name.','.$value);
  }

  public function executeVerify(sfWebRequest $request)
  {
        $member  = new Member();
        $cofigobj = new MemberConfig();

      if($request->isMethod(sfWebRequest::POST)){
           $varified = $_POST['verificatincode'];
           $q = Doctrine::getTable('MemberConfig')->createQuery('mc')->where('mc.value = ?', $varified);
           $memberconfig = $q->fetchArray();
           $id = $memberconfig[0]['member_id'];
          if($id){
             Doctrine_Query::create()
              ->update('Member m')
              ->set('m.is_active', '?', 1)
              ->where('m.id = ?', $id)
             ->execute();
             $this->redirect('/');
       }
  }
}
 private function validation($formData){
     $validationData = '';
    if($formData['name'] == ''){
        $this->msgName = 'Please Input Name';
        $validationData .=  $this->msgName;
    }
    if($formData['password'] == ''){
        $this->msgPass = 'Please Input Password';
        $validationData .= $this->msgPass;
    }

   if($formData['cpasswordinput'] == ''){
        $this->msgCpass = 'Please Input Confirm Password';
        $validationData .=$this->msgCpass;
    }
    if(!empty($formData['cpasswordinput'])&!empty($formData['password'])){
        if($formData['cpasswordinput'] != $formData['password']){
            $this->msgCpass = 'Password Dosen\'t Matches';
            $validationData .=$this->msgCpas;
        }
    }

    if($formData['phone'] == ''){
        $this->msgPhone = 'Please Input Phone Number';
        $validationData .= $this->msgPhone;
    }
    if(!empty($formData['phone'])){
        if($this->existsPhoneNumber($formData['phone'])){
            $this->msgPhone = 'This Phone Number Is Already Verified';
            $validationData .= $this->msgPhone;
        }
    }
    if($formData['pc_address'] == ''){
        $this->msgEmail = 'Please Input Email Address';
        $validationData .= $this->msgEmail;
    }
    if($formData['pc_address']){
         if(!$this->isValidEmail($formData['pc_address'])){
           $this->msgEmail = 'The Email Address Is Not Valid';
           $validationData .= $this->msgEmail;
         }

        if($this->existsEmail($formData['pc_address'])){
             $this->msgEmail = 'The Email Address is already Exists';
             $validationData .= $this->msgEmail;
         }
    }

    if($formData['secret_answer'] == ''){
        $this->msgSecret = 'Please Answer Secret Question';
        $validationData .= $this->msgSecret;
    }
    return $validationData ;
 }

 private function isValidEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
 }

 private function existsEmail($email){
      $q = Doctrine::getTable('MemberConfig')->createQuery('mc')->where('mc.value = ?', $email);
      $memberconfig = $q->fetchArray();

      return $phone = $memberconfig[0]['value'];
 }

 private function existsPhoneNumber($phoneNumber){
      $q = Doctrine::getTable('MemberConfig')->createQuery('mc')->where('mc.value = ?', $phoneNumber);
      $memberconfig = $q->fetchArray();
      return $phone = $memberconfig[0]['value'];
 }

 private function  bindPostDataIntoFrom($setData){
     $this->name = $setData['name'];
     $this->email = $setData['pc_address'];
     $this->password = $setData['password'];
     $this->cpassword = $setData['cpasswordinput'];
     $this->phone = $setData['phone'];
     $this->secretanswer = $setData['secret_answer'];
 }

}