<html>
  <head>
    <title>CIELO Challenge</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <style type="text/css">

      * {
        box-sizing: border-box
      }

      html, body {
        background-color: #f9f9f9;
      }
      .container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        width: 400px;
        margin: 0 auto;
        margin-top: 40px;
        font-size: inherit;
        padding: 16px;
        padding-top: 0px;
        border: 2px solid #f1f1f1;
        border-radius: 5px;
        background-color: white;
      }

      input[type=text], 
      input[type=date], 
      input[type=color], 
      input[type=email] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        border-radius: 5px;
        background: #f1f1f1;
      }

      input[type=text]:focus, 
      input[type=date]:focus, 
      input[type=color]:focus, 
      input[type=email]:focus {
        background-color: #ddd;
        outline: none;
      }

      input[type=date]::-webkit-inner-spin-button, 
      input[type=date]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
      }

      hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        margin-left: -16px;
        margin-right: -16px;
      }

      input[type=color] {
        padding: 5px;
        height: 50px;
        margin-bottom: 5px;
      }

      .hint {
        float: right;
        font-size: 12px;
        color:lightslategray;
        font-style:italic;
      }

      .register-btn {
        background-color: mediumseagreen;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        margin-top: 20px;
      }

      .register-btn:hover {
        opacity:1;
      }

      .notify-success {
        background-color:springgreen;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 7px;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        margin-top: 20px;
        display: none;
      }

      .notify-failure {
        background-color:tomato;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 7px;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        margin-top: 20px;
        display: none;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <h1>User Info</h1>
      <p>Tell us a bit about yourself.</p>
      <hr>
      <div class="notify notify-success">User information was submitted!</div>
      <div class="notify notify-failure">There was a problem sending your submission.</div>
      <form class="rg-form" id="registerForm" >
        <label for="fullname"><b>Name</b></label>
        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required><br/>

        <label for="dob"><b>Date of Birth</b></label>
        <input type="date" id="dob" name="dob" placeholder="YYYY-MM-DD" required><br/>

        <label for="email"><b>E-Mail</b></label>
        <input type="email" id="email" name="email" placeholder="email@domain.com" required><br/>

        <label for="color"><b>Favorite Color</b></label>
        <input type="color" id="color" name="color" placeholder="ex: Green" value="#a86fff"><br/>
        <label class="hint" for="color">(click to pick color)</label>
        
        <button type="submit" id="createUser" class="register-btn">Submit Details</button>
      </form>
    </div>
    <script>
      $(document).ready(function() {

        $('#registerForm').validate({
          rules: {
            fullname: 'required',
            dob: {
              required: true,
              dateISO: true
            },
            email: {
              required: true,
              email: true
            },
            color: 'required'
          },

          submitHandler: function(form) {
            var url = '<?= site_url('users/createNewUser') ?>';

            $.ajax({
              url: url,
              cache: false,
              method: 'POST',
              data: $(form).serializeArray(),
              dataType: 'json',
              success: function(response) {
                $('.notify-success').fadeIn();
              },
              error: function() {
                $('.notify-failure').fadeIn();
              }
            }); /* end ajax */
          } /* end submitHandler */
        });/* end validate */
      });
    </script>
  </body>
</html>