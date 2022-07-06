<?php
require 'connectiondb.php';
require 'connection_es.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
  // define variables
    $data = array(
      "lastname" => $_POST["lastname"],
      "firstname" => $_POST["firstname"],
      "birthday" => $_POST["annee"] . "/" . $_POST["mois"] . "/" . $_POST["jour"],
      "gender" => $_POST["gender"],
      "email" => $_POST["email"],
      "phonenumber" => $_POST["phonenumber"],
      "website" => $_POST["website"] ? $_POST["website"] : "",
    ); 
    $sql = "INSERT INTO phptest (lastname,firstname,birthday,gender,email,phonenumber,website) VALUES (:lastname, :firstname, :birthday, :gender, :email, :phonenumber, :website)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    $indexed = $client->index([
        'index' => 'formulaires',
        'type' => '_doc',
        'body' => $data
    ]);
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <style>
    body {
      background-color: pink;
    }

    #frm {
      border: solid gray 1px;
      width: 30%;
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

    #titre {
      color: pink;
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

    .error {
      color: #FF0000;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>totallysports!</title>
  <link rel="icone" type="image" href="logo_Fini-removebg-preview.png">
</head>

<body>
  <div id="frm">

    <h1 id="titre" ; style="font: size 600px; text-align:center;">PHP test formulaire</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <br><br>
      Last Name:
      <span class="error">*</span>
      <input type="text" name="lastname" placeholder="Your last name.." required oninvalid="this.setCustomValidity('Last name is required')" onvalid="this.setCustomValidity('')" />
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

      E-mail:
      <span class="error">*</span>
      <input type="email" name="email" id="email" class="case" placeholder="name@groupe-esigelec.org" required />
      <br>
      Phone number:
      <span class="error">*</span>
      <input type="text" name="phonenumber" placeholder="+33612345678" required oninvalid="this.setCustomValidity('Phone number is required')" onvalid="this.setCustomValidity('')" />
      <br>
      Website:
      <input type="text" name="website" placeholder="Facebook Or Instagram" />

      <br><br>
      <p><span class="error">* required field</span></p>
      <br>

      <input type="submit" name="submit" id="btn" value="Submit" />

    </form>
  </div>
</body>

</html>