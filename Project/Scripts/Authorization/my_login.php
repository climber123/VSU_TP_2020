<!DOCTYPE html>
<html>
<title>Holiday Memories</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="../styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
	<style>
body, html {height: 100%}
header{font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;  
  background-image: url("../images/money_background.jpg_large");
  min-height: 100%;
}
</style>
<body>
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">Пожалуйста, войдите в Ваш аккаунт</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px">Smart<br>Expenses</span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>Smart<br>Expenses</b></span>
    <p><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xxlarge w3-black">Login</button></p>
  </div>
</header>

<div class="w3-container">
  <!--<h2>Holiday Memories</h2>
  <h4>Пожалуйста, войдите в Ваш аккаунт<h4>-->

  <!--<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>-->

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="../images/img_avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form method="post" class="w3-container" action="login.php">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" autofocus="true" type="text" placeholder="Enter Username" name="user_login" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="user_password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          
          
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
       
      </div>

    </div>
  </div>
</div>
            
</body>
</html>
