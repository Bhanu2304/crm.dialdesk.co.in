<?php 

require("element/dbconnect_mysqli.php");
require("element/functions.php");
//require("element/session-check.php");
session_start();

$user = $_SESSION['user'];

if($_POST)
{
  #print_r($_POST);
    $campaign_id = $_POST['campaignId'];
    $find_campaigns="SELECT campaign_id,campaign_name,campaign_allow_inbound from vicidial_campaigns where campaign_id='$campaign_id' and active='Y' limit 1";
    $rsc_campaign=mysqli_query($link, $find_campaigns);
    $campaign_det = mysqli_fetch_assoc($rsc_campaign);
    
    if(!empty($campaign_det))
    {
        $_SESSION['VD_campaign']	   = $campaign_det['campaign_id'];
        $campaign_allow_inbound = $campaign_det['campaign_allow_inbound'];
        $dial_method = $campaign_det['dial_method'];
        $campaign_leads_to_call = $campaign_det['campaign_leads_to_call'];
        $no_hopper_leads_logins = $campaign_det['no_hopper_leads_logins'];
        
        if ( ( ($campaign_allow_inbound == 'Y') and ($dial_method != 'MANUAL') ) || ($campaign_leads_to_call > 0) || (preg_match('/Y/',$no_hopper_leads_logins)) )
        {
            
        }
        
        header("location: agent-panel.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimantran - Agent Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            width: 800px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 600px;
        }

        .left-side {
            background: linear-gradient(to bottom, #002a43, #005173);
            color: white;
            padding: 30px;
            text-align: center;
            width: 50%;
        }
        
        .img_phone {
            width: 300px;
            margin-bottom: 20px;
        }

        .left-side h1 {
            margin: 0;
            font-size: 24px;
        }

        .left-side p {
            margin: 5px 0 0;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .right-side {
            padding: 30px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
            border: 1px solid #002a43;
            border-radius: 30px 0px 0px 30px;
            box-sizing: border-box;
            position: relative;
        }
        
        .right-side h2 {
            margin: 0 0 20px;
            font-size: 24px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input, form select {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        form button {
            padding: 10px;
            background-color: #002a43;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 20px;
        }

        form button:hover {
            background-color: #005173;
        }


        .text-wrapper {
            width: 440px;
            top: 0;
            left: 0;
            text-shadow: 0px 4px 4px #00000040;
            font-family: "Roboto Mono-Bold", Helvetica;
            font-weight: 700;
            color: #fefffd;
            font-size: 64px;
            text-align: center;
            letter-spacing: 20px;
            line-height: normal;
            white-space: nowrap;
        }

        .text-wrapper-p {
            width: 440px;
            top: 0;
            left: 0;
            text-shadow: 0px 4px 4px #00000040;
            font-family: "Roboto Mono-Bold", Helvetica;
            font-weight: 700;
            color: #f7c704;
            font-size: 36px;
            text-align: center;
            letter-spacing: 10.8px;
            line-height: normal;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      function checkFields() 
      {
        //console.log("hello");
          const userId = $('#userId').val();
          const password = $('#password').val();
          const phoneLogin = $('#phone_login').val();
          const phonePassword = $('#phone_password').val();
          //console.log("userId"+userId+"password"+password+"phoneLogin"+phoneLogin+"phonePassword"+phonePassword);
          if (userId && password && phoneLogin && phonePassword) 
          {
              $('#errorMessage').hide();
              $('#succesMessage').hide();
              //console.log("true");
                const formData = {
                    userId: userId,
                    password: password,
                    phone_login:phoneLogin,
                    phone_password: phonePassword
                };

                $.ajax({
                    type: 'POST',
                    url: 'campaign_show.php',
                    data: formData,
                    success: function(response) 
                    {
                        const responseData = JSON.parse(response);
                        if(responseData.error)
                        {
                          const campaignSelect = $('#campaignId');
                          campaignSelect.empty();
                          $('#errorMessage').text('Error: ' + responseData.error).show();
                        } else{

                            $('#errorMessage').show()
                            $('#succesMessage').text('Success: ' + responseData.Success).show();
                            const campaignOptions = responseData.campaign;
                            const campaignSelect = $('#campaignId');
                            campaignSelect.empty();
                            campaignSelect.append(campaignOptions);
                            $('#errorMessage').hide();
                            $('#campaignDiv').show();
                        }
                        
                    },
                    error: function() {
                      $('#errorMessage').text('Error retrieving campaigns.').show();
                    }
                  })
            } 
      }
    </script>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="assets2/images/headset.png" alt="Head Set"  style= "margin-right: 290px;width: 80px;"> 
            <br><br><br><br>
            <h1 class="text-wrapper">NIMANTRAN</h1>
            <!-- style="color: yellow;letter-spacing: 32px;" -->
            <p class="text-wrapper-p">voice of your support</p>
            <img class="img_phone" src="assets2/images/phone.png" alt="Red Phone" style="margin-top: 132px;"> 
        </div>
        <div class="right-side">
            <h2>Agent Login</h2>
            <form name="vicidial_form" id="vicidial_form" action="<?php echo $agcPAGE;?>" method="post">
                <label for="userId">User Id</label>
                <input type="text" id="userId" name="userId" oninput="checkFields()">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" oninput="checkFields()" required="">
                <label for="phoneNumber">Phone Login ID</label>
                <input  required="" type="text" id="phone_login"  name="phone_login"  maxlength="20" oninput="checkFields()"/>
                <label for="phoneNumber">Phone Password</label>
                <input type="password" id="phone_password" required="" name="phone_password" oninput="checkFields()"/>
                <div id="errorMessage" style="color: red; display: none;"></div>
                <div id="succesMessage" style="color: green; display: none;"></div>
                
                <label for="campaignId">Campaign Id</label>
                <select id="campaignId" name="campaignId">
                    <option value="">Select Campaign</option>
                    <!-- Add more options as needed -->
                </select>
                <button  type="submit" name="SUBMIT" value="Next" >LOGIN</button>
                <!-- <button type="submit">LOGIN</button> -->
            </form>
        </div>
    </div>
</body>
</html>
