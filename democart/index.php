<?php

session_start();
include('db.php');
$cart_count = 0;
$status = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];


if (isset($_POST['code']) && $_POST['code'] != "") {
    $code = $_POST['code'];
    $quantity = 1; // Số lượng mặc định

    $check_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = ".$user_id." AND product_code = '$code'");

    if (mysqli_num_rows($check_query) > 0) {
        $update_query = mysqli_query($con, "UPDATE `cart` SET quantity = quantity + $quantity WHERE user_id = ".$user_id." AND product_code = '$code'");

        if ($update_query) {
            $status = "<div class='box'>Product quantity is updated in your cart!</div>";
        } else {
            $status = "<div class='box' style='color:red;'>Failed to update product quantity in cart!</div>";
        }
    } else {
        $insert_query = mysqli_query($con, "INSERT INTO `cart` (user_id, product_code, quantity) VALUES ($user_id , '$code', $quantity)");

        if ($insert_query) {
            $status = "<div class='box'>Product is added to your cart!</div>";
        } else {
            $status = "<div class='box' style='color:red;'>Failed to add product to cart!</div>";
        }
    }
}
?>


<html>
<head>
    <title>Testcart</title>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>
    <div style="width:700px; margin:50 auto;">
        <h2>San pham</h2>
        <div style="margin-top: 20px;">
            Welcome, <?php echo $_SESSION['username']; ?>! 
            <a href="?logout=true" style="margin-left: 10px;">Logout</a>
        </div>

		<div class="cart_div">
			<?php 
				//tinh lai so luong trong cart
                $cart_count_query = mysqli_query($con, "SELECT COUNT(DISTINCT product_code) as total_products FROM `cart` WHERE user_id = " . $user_id);
                $cart_count_result = mysqli_fetch_assoc($cart_count_query);
                $cart_count = $cart_count_result['total_products'];
			?>
			<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
		</div>
        <?php
        $result = mysqli_query($con, "SELECT * FROM `products`");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product_wrapper'>
                <form method='post' action=''>
                <input type='hidden' name='code' value=" . $row['code'] . " />
                <div class='image'><img src='" . $row['image'] . "' /></div>
                <div class='name'>" . $row['name'] . "</div>
                <div class='price'>$" . $row['price'] . "</div>
                <button type='submit' class='buy'>Buy Now</button>
                </form>
                </div>";
        }
        mysqli_close($con);
        ?>

        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
        </div>
    </div>
</body>
</html>
