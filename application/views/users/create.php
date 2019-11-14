<html>
  <head>
    <title>CIELO Challenge</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <style type="text/css">
      * {box-sizing: border-box}
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
    </style>
  </head>
  <body>
    <div class="container">
      <form class="rg-form" id="registerForm">
        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required><br/>

        <input type="date" id="dob" name="dob" placeholder="YYYY-MM-DD" required><br/>

        <input type="email" id="email" name="email" placeholder="email@domain.com" required><br/>

        <input type="color" id="color" name="color" placeholder="ex: Green" value="#a86fff"><br/>
        
        <button type="submit" id="createUser" class="register-btn">Submit Details</button>
      </form>
    </div>
    <script>
      $(document).ready(function() {
        $('#registerForm').validate();/* end validate */
      });
    </script>
  </body>
</html>