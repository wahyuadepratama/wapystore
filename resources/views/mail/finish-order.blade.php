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
          Thank you for ordering <b>{{ $order_name }}</b> on <b>Wapy Design</b>. We are currently processing your order. Your total order is:<br>
          <center style="font-size: 25px"><b> Rp {{number_format(($order_price),0,',','.')}} ,- <b></center>
        </p><br>

        <p style="font-family: 'Google Sans', sans-serif; font-size: 17px">
          Payment can be made to one of the following accounts:
        </p><br>

        <table style="font-family: 'Google Sans', sans-serif; font-size: 17px">
          <tr>
            <td style="padding: 10px"><img src="https://wapydesign.com/guest/images/icons/bri.png" width="100px" style="display:block"></td>
            <td style="padding: 10px;font-family: 'Google Sans', sans-serif;">7241-01-005830-53-8</td>
            <td style="padding: 10px;font-family: 'Google Sans', sans-serif;">a/n Wahyu Ade Pratama</td>
          </tr>
          <tr>
            <td style="padding: 10px"><img src="https://wapydesign.com/guest/images/icons/mandiri.png" width="100px" style="display:block"></td>
            <td style="padding: 10px;font-family: 'Google Sans', sans-serif;">111-00-0755133-2</td>
            <td style="padding: 10px;font-family: 'Google Sans', sans-serif;">a/n Wahyu Ade Pratama</td>
          </tr>
          <tr>
            <td style="padding: 10px"><img src="https://wapydesign.com/guest/images/icons/bni.png" width="100px" style="display:block"></td>
            <td style="padding: 10px;font-family: 'Google Sans', sans-serif;">068-21-71537</td>
            <td style="padding: 10px;font-family: 'Google Sans', sans-serif;">a/n Wahyu Ade Pratama</td>
          </tr>
        </table><br>

        <p style="font-family: 'Google Sans', sans-serif; font-size: 17px">
          For information and questions related to orders or designs you can ask our contact below.
          thank you
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
