<?php
session_start();
include('db.php');
$cart_count = 0;
$status = "";

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['action']) && $_POST['action'] == "remove") {
    $product_code = $_POST["code"];
    $delete_query = mysqli_query($con, "DELETE FROM `cart` WHERE user_id = ".$user_id." AND product_code = '$product_code'");

    if ($delete_query) {
        $status = "<div class='box' style='color:red;'>Product is removed from your cart!</div>";
    } else {
        $status = "<div class='box' style='color:red;'>Failed to remove product from cart!</div>";
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    $product_code = $_POST["code"];
    $new_quantity = $_POST["quantity"];
    $update_query = mysqli_query($con, "UPDATE `cart` SET quantity = $new_quantity WHERE user_id = ".$user_id." AND product_code = '$product_code'");

    if ($update_query) {
        $status = "<div class='box'>Quantity is updated in your cart!</div>";
    } else {
        $status = "<div class='box' style='color:red;'>Failed to update quantity in cart!</div>";
    }
}
?>

<html>
<head>
    <title>Gio hang</title>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>
    <div style="width:700px; margin:50 auto;">
        <h2>Gio hang</h2>
		<div class="back_to_index">
			<a href="index.php"><img src="./icons8-back-ice-cream/icons8-back-24.png"></a>
		</div>

        <div class="cart">
            <?php
            $result = mysqli_query($con, "SELECT products.*, cart.quantity as cart_quantity FROM `cart` 
                                            JOIN `products` ON cart.product_code = products.code 
                                            WHERE cart.user_id = ".$user_id."");
            ?>

            <?php if (mysqli_num_rows($result) > 0) : ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>ITEM NAME</td>
                            <td>QUANTITY</td>
                            <td>UNIT PRICE</td>
                            <td>ITEMS TOTAL</td>
                        </tr>
                        <?php
                        $total_price = 0;
                        while ($product = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
                                <td><?php echo $product["name"]; ?><br />
                                    <form method='post' action=''>
                                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove'>Remove Item</button>
                                    </form>
                                </td>
                                <td>
                                    <form method='post' action=''>
                                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <input type="number" name='quantity' class='quantity' value="<?php echo $product['cart_quantity'] ?>" onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td><?php echo "$" . $product["price"]; ?></td>
                                <td><?php echo "$" . $product["price"] * $product["cart_quantity"]; ?></td>
                            </tr>
                            <?php
                            $total_price += ($product["price"] * $product["cart_quantity"]);
                        }
                        ?>
                        <tr>
                            <td colspan="5" align="right">
                                <strong>TOTAL: <?php echo "$" . $total_price; ?></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php else : ?>
                <h3>Your cart is empty!</h3>
            <?php endif; ?>
        </div>

        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
        </div>

    </div>
</body>
</html>
