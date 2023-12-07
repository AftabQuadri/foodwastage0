<?php
// Retrieve the username from the query parameter
if (isset($_GET["username"])) {
    $username = $_GET["username"];
    // Use the username as needed in the rest of the file
}
else{
  header("Location: dondashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/food.css">
</head>
<body>
    <section class="forms-section">
        <h1 class="section-title">Food And Cloth Details</h1>
        <div class="forms">
          <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
              Food Details
              <span class="underline"></span>
            </button>
            <form class="form form-login" action="food.php" method="post">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
              <fieldset>
                <legend>Please, update the food details</legend>
                <div class="input-block">
                  <label for="Fooditem">Food items</label>
                  <input id="fooditems" type="text" name="fooditems" required>
                </div>
                <div class="input-block">
                  <label for="descriptions">Descriptions</label>
                  <input id="descriptions" type="text" name="Descriptions" required>
                </div>
                <div class="input-block">
                  <label for="quantity">Quantity For People</label>
        <input type="number" class="quantity" name="quantity" min="1" required>
                </div>
                <div class="input-block">
                    <label for="address">Pickup address</label>
                    <input id="address" type="text" name="address" required>
                  </div>
                  <div class="input-block">
                    <label for="City">City</label>
                    <input id="city" type="text" name="city" required>
                  </div>
                  <div class="input-block">
                    <label for="state">State</label>
                    <input id="state" type="text" name="state" required>
                  </div>
                  <div class="input-block">
                    <label for="pincode">Pincode</label>
                    <input id="pincode" type="text" name="pincode" required>
                  </div>
                  <div class="input-block">
                    <label for="contactno">Contact No.</label>
                    <input id="contactno" type="text" name="contactno" required>
                  </div>
                  <div class="input-block">
                    <label for="food-picture">Food Picture:</label>
                    <input type="file" id="foodpicture" name="image" accept="image/*" required>
                    <img id="uploaded-picture" src="" width="175px" height="100px" alt="Food Picture">
                  </div>
              </fieldset>
              <button type="submit" class="btn-login">submit</button>
            </form>
          </div>
          <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
              Cloth Details
              <span class="underline"></span>
            </button>
            <form class="form form-signup" action="cloth.php" method="post">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
              <fieldset>
                <legend>Please, Update the cloth details</legend>
                <div class="input-block">
                  <label for="clothtype">Cloth type</label>
                  <input id="clothtype" type="text" name="clothtype" required>
                </div>
                <div class="input-block">
                  <label for="cdescriptions">Descriptions</label>
                  <input id="cdescriptions" type="text" name="password" required>
                </div>
                <div class="input-block">
                  <label for="quantity">Quantity</label>
        <input type="number" class="quantity" name="quantity" min="1" required>
                </div>
                <div class="input-block">
                  <label for="Pickup address">Pickup Address</label>
                  <input id="cpickupaddress" type="text" name="address" required>
                </div>
                <div class="input-block">
                    <label for="ccity">City</label>
                    <input id="ccity" type="text" name="city" required>
                  </div>
                  <div class="input-block">
                    <label for="cstate">State</label>
                    <input id="cstate" type="text" name="state" required>
                  </div>
                  <div class="input-block">
                    <label for="cpincode">Pincode</label>
                    <input id="cpincode" type="text" name="pincode" required>
                  </div>
                  <div class="input-block">
                    <label for="ccontactno">Contact No.</label>
                    <input id="ccontactno" type="text" name="contactno" required>
                  </div>
                  <div class="input-block">
                    <label for="cloth-picture">Food Picture:</label>
                    <input type="file" id="clothpicture" name="image" accept="image/*" required>
                    <img id="uploaded-picture" src="" width="175px" height="100px" alt="Cloth Picture">
                  </div>
              </fieldset>
              <button type="submit" class="btn-signup">Continue</button>
            </form>
          </div>
        </div>
      </section>
      <script src="JS/food.js"></script>
</body>
</html>