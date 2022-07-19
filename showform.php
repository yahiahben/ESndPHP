<?php
require 'connectiondb.php';
require 'connection_es.php';
require 'function-sf.php';
require 'function.php';
?>
<!DOCTYPE HTML>
<html>

<head>
  <style>
    header {
      position: fixed;
    }

    img {
      width: 50%;
      display: block;
      margin: auto;
    }

    #titre {
      color: pink;
    }

    #body1 {
      background-color: pink;
    }

    #btn {
      width: 100%;
      color: #fff;
      background: pink;
      cursor: pointer;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      text-align: center;
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .error {
      color: #FF0000;
    }

    #frm {
      border: solid gray 1px;
      width: 60%;
      border-radius: 2px;
      margin: 120px auto;
      background: white;
      padding: 50px;
    }

    #frm2 {
      margin: 0;
      text-align: center;
      background: white;
      padding: 0;
    }

    #frm3 {
      margin: 10px;
      padding: 0;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    input[type=text],
    input[type=email] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    select[id=jour],
    select[id=mois],
    select[id=annee] {
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .footer-basic {
      padding: 40px 0;
      background-color: #ffffff;
      color: #4b4c4d;
    }

    .footer-basic ul {
      padding: 0;
      list-style: none;
      text-align: center;
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 0;
    }

    .footer-basic li {
      padding: 0 10px;
    }

    .footer-basic ul a {
      color: inherit;
      text-decoration: none;
      opacity: 0.8;
    }

    .footer-basic ul a:hover {
      opacity: 1;
    }

    .footer-basic .social {
      text-align: center;
      padding-bottom: 25px;
    }

    .footer-basic .social>a {
      font-size: 24px;
      width: 40px;
      height: 40px;
      line-height: 40px;
      display: inline-block;
      text-align: center;
      border-radius: 50%;
      border: 1px solid #ccc;
      margin: 0 8px;
      color: inherit;
      opacity: 0.75;
    }

    .footer-basic .social>a:hover {
      opacity: 0.9;
    }

    .footer-basic .copyright {
      margin-top: 15px;
      text-align: center;
      font-size: 13px;
      color: #aaa;
      margin-bottom: 0;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="./js/bootstrap.min.js"></script>
  <title>totallysports!</title>
  <link rel="icone" type="image" href="logo_Fini-removebg-preview.png">
</head>

<body>
  <div id="body1">
    <div class="w3-container w3-white w3-card">
      <div class="header">
        <a href="https://www.esigelec.fr/" target="_blank">
          <img src="esigelec-preview.png" alt="esigelec-link" style="width:200px ">
        </a>
      </div>
    </div>
    <!-- Displaying Flash Data if exist -->
    <?php if (isset($_SESSION['_flashdata'])) : ?>
      <!-- Looping All Flash messages -->
      <?php foreach ($_SESSION['_flashdata'] as $key => $val) : ?>
        <div class="my-2 px-3 py2 alert alert-<?= $key ?>">
          <div class="d-flex align-items-center">
            <div class="col-11">
              <!-- Displaying the Flash Message -->
              <p><?= get_flashdata($key) ?></p>
            </div>
            <div class="col-1 text-end">
              <button class="btn-close" type="button" onclick="this.closest('.alert').remove()"></button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- Looping All Flash messages -->
    <?php endif; ?>
    <!-- Displaying Flash Data if exist -->

    <div id="frm">

      <h1 id="titre" ; style="font: size 600px; text-align:center;">PHP test formulaire</h1>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <br><br>
        Last Name:
        <span class="error">*</span>
        <input type="text" name="lastname" placeholder="Your last name.." required oninvalid="this.setCustomValidity('Last name is required')" onvalid="this.setCustomValidity('')" x-webkit-speech />
        <br>
        First Name:
        <span class="error">*</span>
        <input type="text" name="firstname" placeholder="Your first name.." required oninvalid="this.setCustomValidity('First name is required')" onvalid="this.setCustomValidity('')" />
        <br>
        Date of birth:
        <span class="error">*</span>
        <div id="frm2">
          <select name="jour" id="jour" placeholder="jj" required oninvalid="this.setCustomValidity('birthday is required')" onvalid="this.setCustomValidity('')">
            <option value="">jj</option>
            <?php for ($date_jour = 1; $date_jour <= 31; $date_jour++) { ?>
              <option value="<?php echo $date_jour; ?>"><?php echo $date_jour; ?></option>
            <?php } ?>
          </select>

          <select name="mois" id="mois" placeholder="mm" required oninvalid="this.setCustomValidity('birthday is required')" onvalid="this.setCustomValidity('')">
            <option value="">mm</option>
            <?php for ($date_mois = 1; $date_mois <= 12; $date_mois++) { ?>
              <option value="<?php echo $date_mois; ?>"><?php echo $date_mois; ?></option>
            <?php } ?>
          </select>

          <select name="annee" id="annee" placeholder="aaaa" required oninvalid="this.setCustomValidity('birthday is required')" onvalid="this.setCustomValidity('')">
            <option value="">aaaa</option>
            <?php for ($date_annee = 1925; $date_annee <= 2022; $date_annee++) { ?>
              <option value="<?php echo $date_annee; ?>"><?php echo $date_annee; ?></option>
            <?php } ?>
          </select>
        </div>
        Gender:
        <span class="error">*</span>
        <div id="frm3">
          <input type="radio" name="gender" value="female" required>Female
          <input type="radio" name="gender" value="male" required>Male
          <input type="radio" name="gender" value="other" required>Other
        </div>
        Phone number:
        <span class="error">*</span>
        <input type="text" name="phonenumber" placeholder="+33612345678" required oninvalid="this.setCustomValidity('Phone number is required')" onvalid="this.setCustomValidity('')" />
        <br>
        E-mail:
        <span class="error">*</span>
        <input type="email" name="email" id="email" class="case" placeholder="name@groupe-esigelec.org" required />
        <br>
        Website:
        <input type="text" name="website" placeholder="Facebook Or Instagram" />
        <br><br>
        <p><span class="error">* required field</span></p>
        <br>

        <input type="submit" name="submit" id="btn" value="Submit" onclick="location.href='set_messages.php?msg=success';" />

      </form>
    </div>

    <div class="footer-basic">
      <footer>
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Home</a></li>
          <li class="list-inline-item"><a href="#">Services</a></li>
          <li class="list-inline-item"><a href="#">About</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Company Name © 2018</p>
      </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  </div>
</body>

</html>
