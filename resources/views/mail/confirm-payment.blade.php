<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.gstatic.com/s/googlesans/v9/4UaGrENHsxJlGDuGo1OIlL3Awp5MKg.woff2">
    <title></title>

  </head>
  <body style="background-color: white;margin: 0 auto;font-family: 'Google Sans', sans-serif;">
    <div class="container-all" style="background-color: white;margin: 0 auto;font-family: 'Google Sans', sans-serif;">
    <div class="wapy-container" style="max-width:728px;margin: 0 auto;font-family: 'Google Sans', sans-serif;background-color: white;">
      <!-- LOGO WAPY -->
      <div class="wapy-logo" style="padding: 20px;">
        <center>
        <img src="https://wapydesign.com/guest/images/logo/wapydesign.png" alt="Logo" title="Logo" height="110px" width="255px" style="display:block">
      </center>
      </div>
      <!-- END LOGO -->
      <!-- HEADER -->
      <div class="wapy-header" style="padding: 20px 0px;background-color:#f7482d;text-align: center;color: white;">
        <center><h2 style="margin:0px;padding:0px">Hi {{ $name }}!</h2></center>
      </div>
      <!-- END HEADER -->

      <!-- CONTENT -->
      <div class="wapy-content" style="padding: 20px;">
        <p style="font-family: 'Google Sans', sans-serif; font-size: 17px">
          We have processed your payment. We will send you a <b>preview of your design</b> via social media (Whatsapp and Line).
          If there is <b>no confirmation from you in 24 hours</b>, we assume there is <b>no revision</b>. After the revision is complete,
          we will send the design file to <b>your email</b> and the status will be <b>"closed"</b>.
        </p><br>

        <center>
          <table style="font-family: 'Google Sans', sans-serif; font-size: 17px">
            <tr>
              <td style="font-family: 'Google Sans', sans-serif;">Order &nbsp;</td>
              <td style="font-family: 'Google Sans', sans-serif;">&nbsp; : &nbsp;</td>
              <td style="font-family: 'Google Sans', sans-serif;">{{ $data->order->name }}</td>
            </tr>
            <tr>
              <td style="font-family: 'Google Sans', sans-serif;">Price &nbsp;</td>
              <td style="font-family: 'Google Sans', sans-serif;">&nbsp; : &nbsp;</td>
              <td style="font-family: 'Google Sans', sans-serif;">Rp {{number_format(($data->order->price),0,',','.')}} ,-</td>
            </tr>
            <tr>
              <td style="font-family: 'Google Sans', sans-serif;">Status &nbsp;</td>
              <td style="font-family: 'Google Sans', sans-serif;">&nbsp; : &nbsp;</td>
              <td style="font-family: 'Google Sans', sans-serif; color: green;"><strong>{{ $data->payment_status }}</strong></td>
            </tr>
          </table>
        </center><br>

        <p style="font-family: 'Google Sans', sans-serif; font-size: 17px">
          Please immediately <b>check your social media</b> regarding <b>revision information</b>. Thank you for trusting your design to <b>Wapy Design</b>.
          <br><br> Best Regards <br> <b>CEO Wapy Design</b>
        </p>

        </p>
      </div>
      <!-- END CONTENT -->

      <!-- FOOTER -->
      <div class="wapy-footer" style="margin-top: 25px;padding: 15px 20px;background-color: #ddd;">
        <h3 style="font-family: 'Google Sans', sans-serif; margin:0px"><b>Contact Us</b></h3>
        <table class="wapy-contact" style="font-family: 'Google Sans', sans-serif;">
          <tr>
            <td style="padding: 2px 0px;"><img src="https://wapydesign.com/guest/images/icons/whatsapp.png" alt="whatsapp" title="whatsapp" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;font-family: 'Google Sans', sans-serif;">0896-7625-3311</td>
          </tr>
          <tr>
            <td style="padding: 2px 0px;"><img src="https://wapydesign.com/guest/images/icons/line.png" alt="line" title="line" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;font-family: 'Google Sans', sans-serif;">@paa0093h</td>
          </tr>
          <tr>
            <td style="padding: 2px 0px;"><img src="https://wapydesign.com/guest/images/icons/email.png" alt="email" title="email" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;"><span style="text-decoration:none;color:black;font-family: 'Google Sans', sans-serif;">official@wapydesign.com</span></td>
          </tr>
        </table>
      </div>
      <!-- END FOOTER -->

    </div>
</div>
  </body>
</html>
