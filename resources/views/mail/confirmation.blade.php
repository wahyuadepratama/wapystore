<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <title></title>

  </head>
  <body style="background-color: white;margin: 0 auto;font-family: 'Muli', sans-serif;">
    <div class="container-all" style="background-color: #eee;margin: 0 auto;font-family: 'Muli', sans-serif;">
    <div class="wapy-container" style="max-width:728px;margin: 0 auto;font-family: 'Muli', sans-serif;background-color: white;">
      <!-- LOGO WAPY -->
      <div class="wapy-logo" style="padding: 20px;">
        <center>
        <img src="https://wapydesign.com/guest/images/logo/wapydesign.svg" alt="Logo" title="Logo" height="80px" width="255px" style="display:block">
      </center>
      </div>
      <!-- END LOGO -->
      <!-- HEADER -->
      <div class="wapy-header" style="padding: 20px 0px;background-color:#f7482d;text-align: center;color: white;">
        <center><h2 style="margin:0px;padding:0px">Hi, {{ $name }}!</h2></center>
      </div>
      <!-- END HEADER -->
      <!-- CONTENT -->
      <div class="wapy-content" style="padding: 20px;">
        <p style="font-family: 'Muli', sans-serif;">Thanks for creating an account on <b>Wapy Design</b>. Your username is <b>{{ $name }}</b><br><br>

          You can access your account area to view your orders. Please confirm you email address here and you will get 10% discount for first order.<br><br>
        </p>
        <center><a href="@php echo url('/') @endphp/{{ $token }}" class="wapy-btn" style="padding: 15px;background-color: #f7482d;color: white;text-decoration: none;font-family: 'Muli', sans-serif;"><b>Email Confirmation</b></a></center>
      </div>
      <!-- END CONTENT -->
      <!-- FOOTER -->
      <div class="wapy-footer" style="margin-top: 25px;padding: 15px 20px;background-color: #ddd;">
        <h3 style="font-family: 'Muli', sans-serif; margin:0px"><b>Contact Us</b></h3>
        <table class="wapy-contact" style="font-family: 'Muli', sans-serif;">
          <tr>
            <td style="padding: 2px 0px;"><img src="https://lh5.googleusercontent.com/W9xosw1kseadgUw_zYYd39rQuOs-txIi_fNbM637cW6Wbj3OKyOobyjpVHiwSSdcJUdDiIaGAgLZ5PVD_puW=w1366-h577" alt="whatsapp" title="whatsapp" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;font-family: 'Muli', sans-serif;">0896-7625-3311</td>
          </tr>
          <tr>
            <td style="padding: 2px 0px;"><img src="https://lh6.googleusercontent.com/1tRHfaDo6syUlZgSuLsbqVFMTYMj3Skl_oyNryCz4Iw_ZYFMqB9BPGbhXoWCmt0fzsJCkFlv9q4NPShTIWN7=w1366-h577-rw" alt="line" title="line" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;font-family: 'Muli', sans-serif;">@paa0093h</td>
          </tr>
          <tr>
            <td style="padding: 2px 0px;"><img src="https://lh6.googleusercontent.com/2wLj9MJYycbYhleKKEait2fBS5DgXEyPT34LkNznhX2OI74NmzLkpYk7gimG8yI9WZdzTXmE4y5tPTNTaDq4=w1366-h577-rw" alt="email" title="email" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;"><span style="text-decoration:none;color:black;font-family: 'Muli', sans-serif;">official@wapydesign.com</span></td>
          </tr>
        </table>
      </div>
      <!-- END FOOTER -->
    </div>
</div>
  </body>
</html>
