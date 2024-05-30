<?php 
  include("../connection.php");

  $topay2 = mysqli_query($conn, "SELECT * FROM topay");
  if ($topay2 && mysqli_num_rows($topay2) > 0) {
      $rowss = mysqli_fetch_assoc($topay2);
      $_SESSION['pay_id'] = $rowss['pay_id'];
  } else {
      
      $_SESSION['pay_id'] = null;
  }

  if(isset($_POST['yes'])){
    if(isset($_SESSION['pay_id'])){
        $customer_id1 = $_POST['customer_id'];
        $catalog_id = $_SESSION['catalog_id'];
        $pay_id = $_SESSION['pay_id'];

        $merge_image = $_POST['merge_image'];
        $customer_upload_image = $_POST['customer_upload_image'];
        $customer_name = $_POST['customer_name'];
        $customize_product = $_POST['customize_product'];
        $product_color = $_POST['product_color'];
        $product_type = $_POST['product_type'];
        $product_collar = $_POST['product_collar'];
        $product_print_area = $_POST['product_print_area'];
        $small = $_POST['small'];
        $medium = $_POST['medium'];
        $large = $_POST['large'];
        $xlarge = $_POST['xlarge'];
        $receive_type = $_POST['receive_type'];
        $payment_method = $_POST['payment_method'];
        $order_total = $_POST['order_total'];
        $quantity = $_POST['quantity'];
        $reference_id = $_POST['reference_id'];
        $names = $_POST['names'];
        $phone_number = $_POST['phone_number'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $country = $_POST['country'];
        $address = $_POST['address'];

        $merge_image2 = $_POST['merge_image2'];
        $customer_upload_image2 = $_POST['customer_upload_image2'];
        $product_print_area2 = $_POST['product_print_area2'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Cancelled an order')");
        mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Cancelled an order')");
        mysqli_query($conn, "INSERT INTO `cancelled`(`customer_id`, `catalog_id`, `merge_image`,`merge_image2`, `customer_upload_image`,`customer_upload_image2`,`customize_product`, `product_color`, `product_type`, `product_collar`, `product_print_area`,`product_print_area2`, `small`, `medium`, `large`, `xlarge`, `receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id1','$catalog_id','$merge_image','$merge_image2','$customer_upload_image','$customer_upload_image2','$customize_product','$product_color','$product_type','$product_collar','$product_print_area','$product_print_area2','$small','$medium','$large','$xlarge','$receive_type','$payment_method','$order_total','$quantity','$reference_id','$names','$phone_number','$address','$city','$zipcode','$country')");
        mysqli_query($conn, "DELETE FROM `topay` WHERE pay_id = '$pay_id'");

        header("Location: orders-pay.php");
    }
}
?>