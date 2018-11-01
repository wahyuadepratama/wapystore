<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

  </head>
  <body style="background-color: white;margin: 0 auto;font-family: Century Gothic;">
    <div class="container-all" style="background-color: #eee;margin: 0 auto;font-family: Century Gothic;">
    <div class="wapy-container" style="max-width:728px;margin: 0 auto;font-family: Century Gothic;background-color: white;">
      <!-- LOGO WAPY -->
      <div class="wapy-logo" style="padding: 20px;">
        <center>
        <img src="https://lh4.googleusercontent.com/nVjOyuU29OTlzf897uTk3NL6517K3qi0OEKhPSPg4IFS5IidTzzBqOVNbzoob55HnmVMon0tv43eGxwod8zm=w1366-h626-rw" alt="Logo" title="Logo" height="80px" width="255px" style="display:block">
      </center>
      </div>
      <!-- END LOGO -->
      <!-- HEADER -->
      <div class="wapy-header" style="padding: 20px 0px;background-color:#f7482d;text-align: center;color: white;">
        <center><h2 style="margin:0px;padding:0px">New Order From Client</h2></center>
      </div>
      <!-- END HEADER -->
      <!-- CONTENT -->
      <div class="wapy-content" style="padding: 20px;">
        <p style="font-family: Century Gothic;text-align:justify">You get an order from our client, check here to get the job. </p>
        <table>
          <thead>
            <tr>
              <th>Order By</th>
              <th>Name</th>
              <th>Price</th>
              <th>Theme</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $data->user->name }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->price }}</td>
              <td>{{ $data->themew }}</td>
            </tr>
          </tbody>
        </table>
        <center>

          <br>
              <center><a href="#" class="wapy-btn" style="padding: 15px;background-color: #f7482d;color: white;text-decoration: none;font-family: Century Gothic;"><b>View List Order</b></a></center>
              <br>
              <p>or</p>
      </center>
      </div>
      <!-- END CONTENT -->
      <!-- FOOTER -->
      <div class="wapy-footer" style="margin-top: 25px;padding: 15px 20px;background-color: #ddd;">
        <h3 style="font-family: Century Gothic; margin:0px"><b>Contact Us</b></h3>
        <table class="wapy-contact" style="font-family: Century Gothic;">
          <tr>
            <td style="padding: 2px 0px;"><img src="https://lh5.googleusercontent.com/W9xosw1kseadgUw_zYYd39rQuOs-txIi_fNbM637cW6Wbj3OKyOobyjpVHiwSSdcJUdDiIaGAgLZ5PVD_puW=w1366-h577" alt="whatsapp" title="whatsapp" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;font-family: Century Gothic;">0896-7625-3311</td>
          </tr>
          <tr>
            <td style="padding: 2px 0px;"><img src="https://lh6.googleusercontent.com/1tRHfaDo6syUlZgSuLsbqVFMTYMj3Skl_oyNryCz4Iw_ZYFMqB9BPGbhXoWCmt0fzsJCkFlv9q4NPShTIWN7=w1366-h577-rw" alt="line" title="line" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;font-family: Century Gothic;"></td>
          </tr>
          <tr>
            <td style="padding: 2px 0px;"><img src="https://lh6.googleusercontent.com/2wLj9MJYycbYhleKKEait2fBS5DgXEyPT34LkNznhX2OI74NmzLkpYk7gimG8yI9WZdzTXmE4y5tPTNTaDq4=w1366-h577-rw" alt="email" title="email" width="20px" height="20" style="display:block"></td>
            <td style="padding: 2px 5px;"><span style="text-decoration:none;color:black;font-family: Century Gothic;">wapydesign@example.com</span></td>
          </tr>
        </table>
      </div>
      <!-- END FOOTER -->
    </div>
</div>
  </body>
</html>
