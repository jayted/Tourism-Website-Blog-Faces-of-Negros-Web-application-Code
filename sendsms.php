        <?php 

                      require('textlocal.class.php');
                      require('cred_sms.php');

                      $textlocal = new Textlocal(false,false,API_KEY);

                      $numbers = array($_POST['contact_number']);
                      $sender = 'TXTLCL';
                      $message = $_POST['name'] .''.$_POST['sms_message'].'<br>'."please contact me on".$_POST['mobile_number'];

                      try {
                          $result = $textlocal->sendSms($numbers, $message, $sender);
                          print_r($result);
                          echo "success";
                      } catch (Exception $e) {
                          die('Error: ' . $e->getMessage());
                      }  


                     ?>