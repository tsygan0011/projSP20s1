<!DOCTYPE html>
<html>
<body>
<form action="cartprocess.php" method="post">

<img src="black.jpg" width="300" height="300">
<label for="quantity">Quantity:</label>
<input type="number" id="quantity" name="quantity1" min="1" max="5">
<input type="submit" value="Add to Cart">

</form>

<form action="cartprocess.php" method="post">
<img src="white.jpg" width="300" height="300">
<label for="quantity">Quantity:</label>
<input type="number" id="quantity" name="quantity2" min="1" max="5">
<input type="submit" value="Add to Cart">
</form>
<form action="cartprocess.php" method="post">
<img src="orange.jpg" width="300" height="300">
<label for="quantity">Quantity:</label>
<input type="number" id="quantity" name="quantity3" min="1" max="5">
<input type="submit" value="Add to Cart">
</form>
<form action="cartprocess.php" method="post">
<img src="red.jpg" width="300" height="300">
<label for="quantity">Quantity:</label>
<input type="number" id="quantity" name="quantity4" min="1" max="5">
<input type="submit" value="Add to Cart">
</form>
<form action="cartprocess.php" method="post">
<img src="yellow.jpg" width="300" height="300">
<label for="quantity">Quantity:</label>
<input type="number" id="quantity" name="quantity5" min="1" max="5">
<input type="submit" value="Add to Cart">
</form>

<form action="viewcart.php">
  <input type="submit" name="viewcart" value="View Cart">
</form>


</body>
</html>