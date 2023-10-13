<?php
require('top.inc.php');

$condition='';
$condition1='';
if($_SESSION['ADMIN_ROLE']==1){
	$condition=" and product.added_by='".$_SESSION['ADMIN_ID']."'";
	$condition1=" and added_by='".$_SESSION['ADMIN_ID']."'";
}

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' $condition1 where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id' $condition1";
		mysqli_query($con,$delete_sql);
	}
}
$sql1="select * from admin_users where id='".$_SESSION['ADMIN_ID']."'";
$res1=mysqli_query($con,$sql1);
$sql="select * from product where added_by='".$_SESSION['ADMIN_ID']."'";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title"><img src="../Doremonwork/profile.png" alt="" width="30px" height="30px"> Profile</h4>
				   <div class="row">
						<!-- <div class="col-md-4">
							<h4 class="box-link"><a class="btn btn-primary" href="jpg-pdf.php">Convert JPG to PDF Tool</a> </h4>
						</div>
						<div class="col-md-4">
							<h4 class="box-link"><a class="btn btn-success" href="png-pdf.php">Convert PNG to PDF Tool</a> </h4>
						</div> -->
						<div class="col-md-4">
							
								<table class="table" style="margin-top: 50px;">
								<thead style="background-color: #e8e9ef;">
								<tr>
									<th class="serial">Username</th>
									<th width="2%">Email</th>
									<th width="30%">Number</th>	
								</tr>
						 		</thead>
								 <tbody>
									<?php
									while($row1=mysqli_fetch_assoc($res1)){?>
									<tr>
										<td><?php echo $row1['username']?></td>
										<td><?php echo $row1['email']?></td>
										<td><?php echo $row1['mobile']?></td>
									</tr>
									<?php } ?>
								</table>
						</div>

					</div>

				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
						<h5 class="box-title" style="padding-left: 20px;">My History</h5>
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th width="2%">ID</th>
							   <th width="30%">Name</th>
							   <th width="10%">Image</th>
							   <th width="26%">Action</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=0;
							while($row=mysqli_fetch_assoc($res)){ $i++;?>
							
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td>
								<!--<a  class="badge badge-complete" href="<?php PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" target="_blank">Download PDF</a>
							-->
								<?php
								/*if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}*/
								echo "<span class='badge badge-edit'><a href='pdfdownload.php?id=".$row['id']."'>View PDF</a></span>&nbsp;";
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
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