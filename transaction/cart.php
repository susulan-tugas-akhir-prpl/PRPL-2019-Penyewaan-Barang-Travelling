<style>
	.container{
	    padding: 30px 33px!important;
	    background: #fff;
	    margin: 20px auto;
	    border-radius: 5px;
	    border: 1px solid #dedede;
	}
	body{
		background: #f5f5f5!important;
	}
</style>
<?php include './../categories/support.php' ?>
<?php
	session_start();
	require '../dbconnect.php';
	require 'item.php';
	// $id_bar=$_GET['id_bar'];
	// $_SESSION['cart'];

	if(isset($_GET['id_bar']) && !isset($_POST['update']))  { 
		$sql = "SELECT * FROM itemproduk WHERE id_bar=".$_GET['id_bar'];

		$result = mysqli_query($konek, $sql);
			// var_dump($result); die();
		$product = mysqli_fetch_object($result); 
		// var_dump($product); die();
		$item = new Item();
		$item->id = $product->id_bar;
		$item->name = $product->nama_bar;
		$item->price = $product->harga;
		$iteminstock = $product->stok;
		$item->quantity = 1;

		
		// Check product is existing in cart
		header('Location: cart.php'); 
		$index = -1;
		$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
		for($i=0; $i<count($cart);$i++)
			if ($cart[$i]->id == $_GET['id_bar']){
				$index = $i;
				break;
			}
			if($index == -1) 
				$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
			else {
				
				if (($cart[$index]->quantity) < $iteminstock)
					$cart[$index]->quantity ++;
						$_SESSION['cart'] = $cart;
			}
	}
	// Delete product in cart
	if(isset($_GET['index']) && !isset($_POST['update'])) {
		$cart = unserialize(serialize($_SESSION['cart']));
		unset($cart[$_GET['index']]);
		$cart = array_values($cart);
		$_SESSION['cart'] = $cart;
	}
	// Update quantity in cart
	if(isset($_POST['update'])) {
		$arrQuantity = $_POST['quantity'];
		$cart = unserialize(serialize($_SESSION['cart']));
		for($i=0; $i<count($cart);$i++) {
			$cart[$i]->quantity = $arrQuantity[$i];
		}
		$_SESSION['cart'] = $cart;
	}
?>

<head>
	<title>Keranjang Belanja</title>
</head>

<body>
	<div class="container" style="padding:15px 33px;">
		<form method="POST">
		    <div class="row">
		    	<div class="col">
			        <h3 class="mr-auto">Items in your cart:</h3>
		        </div>
		    </div>
		    <div class="row justify-content-md-center">
		    	<div class="col">
			        <div class="lebarcanvas" style="width: 100%; margin: 10px 0px">
			            <table class="table">
			                <thead  class="thead-dark">
								<tr>
									<th>Opsi</th>
									<th>Nama Barang</th>
									<th>Harga</th>
									<th>Kuantitas</th> 
									<th>Jumlah Harga</th>
								</tr>

			                </thead>
			                <tbody>
								<?php 
										$cart = unserialize(serialize($_SESSION['cart']));
									$s = 0;
									$index = 0;
									for($i=0; $i<count($cart); $i++){
										$s += $cart[$i]->price * $cart[$i]->quantity;
								?>	

								<tr>
									<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
									
									<td> <?php echo $cart[$i]->name; ?> </td>
									<td>Rp. <?php echo $cart[$i]->price; ?> </td>
									<td> <input type="number" class="form-control" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> </td>  
									<td> Rp<?php echo number_format($cart[$i]->price * $cart[$i]->quantity); ?>,- </td> 
								</tr>

								<?php 
									$index++;
								} ?>
								
								<tr>
									<td colspan="3">
										<a href="../index.php"><button type="button" class="btn btn-light">Continue Shopping</button></a> | <a href="form.php"><button class="btn btn-danger" type="button">Checkout</button></a>
									</td>
									<td colspan="">
										<b>Subtotal : &emsp;&emsp;&emsp; Rp<?= number_format($s);?>,-</b>
									</td>
									<td colspan="2" style="text-align:right; font-weight:bold"> 
											<input id="saveimg" class="btn btn-primary" type="submit" value="Update Cart"  name="update" alt="Save Button">
											<input type="hidden" name="update">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</form>
	<br>
	
	<?php 
		$_SESSION['s']=$s;
		if(isset($_GET["id"]) || isset($_GET["index"])){
		header('Location: cart.php');
		} 
	?>
	</div>

</body>
