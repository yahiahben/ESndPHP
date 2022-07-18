<?php
require 'connectiondb.php';
require 'connection_es.php';
require 'function-sf.php';
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

    body {
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
      width: 40%;
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

    footer {
      text-align: center;
      padding: 3px;
      background-color: white;
      color: darkblue;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>totallysports!</title>
  <link rel="icone" type="image" href="logo_Fini-removebg-preview.png">
</head>

<body>
  <div class="w3-container w3-white w3-card">
    <div class="header">
      <a href="https://cas.esigelec.fr/">
        <img src="esigelec-preview.png" alt="esigelec-link" style="width:200px">
      </a>
    </div>
  </div>
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
  <footer>
    <p>Author: Hameda Benchekroun Yahia<br>
    <a href="mailto:yahya.hbenchekroun@gmail.com">support@gmail.com</a>
    </p>
  </footer>
</body>

</html>