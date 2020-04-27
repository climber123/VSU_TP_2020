<?php echo '
<nav class="w3-sidebar w3-green w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <form action="Authorization/logout.php">
		<button onclick="document.getElementById("id01").style.display="block"" class="w3-button w3-white w3-large" type="submit" value="submit">Logout</button>
	</form>
  </div>
  <div class="w3-bar-block">
    <!--<a href="./" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Домашняя</a> -->
    <a href="./categories_page.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Категории</a> 
    <a href="./operations_page.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Операции</a> 
    <a href="./view_page.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Обзор</a> 

  </div>
</nav>';
?>