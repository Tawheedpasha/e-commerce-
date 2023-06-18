<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);

if(isset($_POST['update_order_status'])){
    $update_order_status=$_POST['update_order_status'];
    mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
}
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order master details</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
                   <table class="table">
                   <thead>
                                            <tr>
                                                <th class="product-thumbnail">Product Name</th>
                                                <th class="product-name"><span class="nobr">Product Image</span></th>
                                                <th class="product-price"><span class="nobr"> qty </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Price </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Total price </span></th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"select distinct(order_details.id) ,order_details.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_details,product,`order` where order_details.order_id='$order_id' and `order`.user_id='$uid' and order_details.product_id=product.id");
                                            $total_price=0;
                                            while($row=mysqli_fetch_assoc($res)){
                                                $total_price=$total_price+($row['qty']*$row['price']);
                                                $address=$row['address'];
                                                $city=$row['city'];
                                                $pincode=$row['pincode'];
                                                
                                            ?>
                                            <tr> <td class="product-name"><a href="#"><?php echo $row['name']?></a></td> 
                                            <td class="product-thumbnail"><a ><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']  ?>" alt="" /></a></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['qty']?></span></td>
                                                <td class="product-price"><span class="amount">₹<?php echo $row['price']?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock">₹<?php echo $row['price']*$row['qty']?></span></td>   
                                            </tr>
                                            <?php } ?>
                                            <tr>
												<td colspan="3"></td>
												<td class="product-name">Total Price</td>
												<td class="product-name"><?php echo $total_price?></td>
                                                
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                    <div class="add_sec" id="address_details">
                                        <strong>Address</strong> <?php echo $address; ?> <br>
                                        <strong>city/state</strong> <?php echo $city; ?><br>
                                        <strong>pincode</strong><?php echo $pincode; ?><br>
                                        <strong>order status</strong>
                                        <?php
                                          $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
                                            echo $order_status_arr['name'];
                                        ?>
                                            
                                    </div>
                                    <form method="post" class="add_sec">
                                    <select class="form-control" name="update_order_status">
										<option>Select Status</option>
										<?php
										$res=mysqli_query($con,"select * from order_status ");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
											
										}
										?>
									</select>
                                    <input type="submit" class="form-control">
                                    </form>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>