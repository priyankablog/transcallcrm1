<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style type="text/css">
   p {
      color: #fff
   }
   .transcol-box {
      /*max-width: 500px;*/
      width: 100%;
      background-color: #1da1f3;
      padding: 20px;
      border-radius: 10px;
      margin: 0 auto;
   }

   .account-information-txt span {
      color: #fff;
      text-transform: uppercase;
      margin-bottom: 0;
   }

   .account-information-txt {
      background: linear-gradient(90deg, rgba(37, 86, 153, 1) 25%, rgba(42, 42, 114, 1) 100%, rgba(0, 212, 255, 1) 100%);
      padding: 5px;
      border-radius: 5px;
      margin-bottom: 10px;
   }

   .client-detail {
      max-width: 400px;
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
   }

   .form-select {
      background: #fff;
      padding: 5px;
      outline: none;
   }

   .account-detail {
      margin-bottom: 40px;
   }

   .form-select-box {
      max-width: 80px;
      width: 100%;
   }
   
   .wrap-code .client-detail p {
      margin-bottom: 0;
      text-transform: uppercase;
   }

   .call-detail p {
      margin-bottom: 0
   }

   .transcol-logo {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      margin-bottom: 20px;
   }

   .transcol-logo span i {
      cursor: pointer;
      margin-left: 40px;
   }

   .transcol-header p {
      font-size: 12px;
      text-align: center;
      margin-bottom: 25px;
   }

   .name-filed {
      max-width: 120px;
      width: 100%;
      outline: none;
   }

   .user-name-detail .client-detail {
      max-width: 260px;
      width: 100%;
      margin-bottom: 10px;
   }

   .user-name-detail .client-detail p {
      margin-bottom: 0
   }

   .user-call-detail {
      max-width: 260px;
      width: 100%;
      margin-bottom: 10px;
   }

   .user-call-detail p {
      margin-bottom: 0;
   }
   .transcol-logo span {
    color: #fff;
   }
   .popup_btn{
      width:100px;
   }

   @media (max-width: 320px) {
      .call-detail {
         max-width: 210px;
      }
   }
</style>
<div id="wrapper">
   <div class="content">
      <div class="row">
         <div class="col-md-12">

            <!-- Transcol-box -->

            <div class="transcol-box">
               <div class="transcol-logo">
                  <p>Transcall</p>
                  <span>00:00 <i class="fa-solid fa-xmark"></i></span>
               </div>
               <div class="transcol-header">
                  <p>Thank you for calling TransCall interpreting Services.This is (____________),ID No..(____) I will
                     be your(________) Interpreter today.How may I help you today? </p>
               </div>
               <div class="account-information-box">
                  <div class="account-information-txt">
                     <span>Account Information</span>
                  </div>
                  <form action="/admin/callpopups/popup_submit" method="post">
                  <?php
                     if(isset($clientdata)){
                        ?>
                           <div class="account-detail">
                              <div class="client-detail">
                                 <p>CLIENT NAME</p>
                                 <p><?= $clientdata->company; ?></p>
                              </div>
                              <div class="client-detail">
                                 <p>ACCOUNT NAME</p>
                                 <p><?= $clientdata->company; ?></p>
                              </div>
                              <div class="client-detail">
                                 <p>ACCOUNT NUMBER</p>
                                 <p><?= $clientdata->unique_id; ?></p>
                              </div>
                           </div>
                        <?php
                     }
                     else{
                        ?>
                           <div class="client-detail">
                              <p>CLIENT NAME</p>
                              <input type="text" name="client_name">
                           </div>
                           <div class="client-detail">
                              <p>ACCOUNT NAME</p>
                              <input type="text" name="account_name">
                           </div>
                           <div class="client-detail">
                              <p>ACCOUNT NUMBER</p>
                              <input type="text" name="account_number">
                           </div>
                        <?php
                     }
                  ?>
               </div>

               <div class="account-information-box ">
                  <div class="account-information-txt">
                     <span>CALL INFORMATION</span>
                  </div>
                  <div class="account-detail">
                     <div class="client-detail">
                        <p>PHONE NUMBER</p>
                        <input type="hidden" name="<?= get_instance()->security->get_csrf_token_name(); ?>" value="<?= get_instance()->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="providercontactid" value="<?= $providercontactid; ?>" >
                        <?php
                           if(isset($clientdata)){
                              ?>
                                 <p><?= ($clientdata->phonenumber == "")?'N/A':$clientdata->phonenumber; ?></p>
                              <?php
                           }
                           else{
                              ?>
                                 <input type="text" name="phone_number">
                              <?php
                           }
                        ?>
                     </div>
                     <div class="client-detail call-detail">
                        <p>LANGUAGE</p>
                        <div class="form-select-box">
                           <select required="" name="language" class="form-select">
                              <option value="">Select Language</option>
                              <?php
                                foreach ($langs as $key) { ?>
                                  <option value="<?= $key['description']; ?>" <?= (isset($calldata) && $calldata->skillsetname == "SPA_Skillset_215" && $key['id'] == "1")?"selected":"" ?> ><?= $key['description']; ?></option>
                                 <?php } 

                              ?>
                           </select>
                        </div>
                     </div>


                  </div>
               </div>
               <?php
               if(isset($dc) && $dc == '1'){ ?>
                 <div class="account-information-box ">
                    <div class="account-information-txt">
                       <span>DATA COLLECTION</span>
                    </div>
                    <div class="account-detail">
                       <div class="client-detail">
                          <p>May I have your name?</p>
                          <input type="text" name="name">
                       </div>
                       <div class="client-detail">
                          <p>May I have your Agent ID ?</p>
                          <input type="text" name="agent_id">
                       </div>
                    </div>
                 </div>
               <?php }
               ?>
               <div class="account-information-box wrap-code">
                  <div class="account-information-txt">
                     <span>WRAP CODE</span>
                  </div>
                  <div class="account-detail">
                     <div class="client-detail">
                        <p>wrap code</p>
                        <div class="form-select-box">
                           <select required="" name="wrap_code" class="form-select">
                              <option value="">Select Wrap Code</option>
                              <?php
                                foreach ($wrap_codes as $key) { ?>
                                  <option value='<?= $key['name']; ?>' ><?= $key['name']; ?></option>
                                 <?php } 
                              ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div>
                  <button type="Submit" class="btn btn-primary popup_btn">Submit</button>
              </form>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
</div>
</div>

</div>
</body>



</html>