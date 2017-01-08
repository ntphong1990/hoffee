Shop Order:

First Name: <?php echo $shop['Order']['first_name'];?>

Last Name: <?php echo $shop['Order']['last_name'];?>

Email: <?php echo $shop['Order']['email'];?>

Phone: <?php echo $shop['Order']['phone'];?>


Billing Address: <?php echo $shop['Order']['billing_address'];?>

Billing Address 2: <?php echo $shop['Order']['billing_address2'];?>

Billing City: <?php echo $shop['Order']['billing_city'];?>


Description			Item Price			Quantity			Extended Price
<?php foreach ($shop['OrderItem'] as $orderitem): ?>
<?php echo $orderitem['Product']['name']; ?>			$<?php echo $orderitem['Product']['price']; ?>				<?php echo $orderitem['quantity']; ?>				$<?php echo $orderitem['subtotal']; ?>

<?php endforeach; ?>

Items:	<?php echo $shop['Order']['quantity'];?>

Total:	$<?php echo $shop['Order']['total'];?>



