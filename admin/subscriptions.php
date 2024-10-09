<?php
require('top.inc.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from subscriptions where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from subscriptions order by id DESC";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Subscribers List </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <!--<th>ID</th>-->
							   <!--<th>Name</th>-->
							   <th>Email</th>
							   <!--<th>Subject</th>
							   <th>Message</th>-->
							   <th>Date</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
						 <?php 
								$i = 1;
								while ($row = mysqli_fetch_assoc($res)) {
							?>
							<tr>
							   <td class="serial"><?php echo $i ?></td>
							   <!--<td><?php //echo $row['id']?></td>-->
							  <!--<td><?php //echo $row['name']?></td>-->
							   <td><?php echo $row['email']?></td>
							   <!--<td><?php //echo $row['subject']?></td>-->
							   <!--<td><?php //echo $row['message']?></td>-->
							   <td><?php echo $row['created_at']?></td>
							   <td>
							   <?php
									echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php
								$i++;
								} 
							?>
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