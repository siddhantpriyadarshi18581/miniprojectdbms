<?php include('db_connect.php');?>

<div class="container-fluid">
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Event Audience List</b>
						<span class="">

							<!-- <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_register">
					<i class="fa fa-plus"></i> New</button> -->
				</span>
					</div>
					<div class="card-body">
						
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr>
									<th class="text-center">id</th>
									<th class="">username</th>
									<th class="">email</th>
									<th class="">phone</th>
									<th class="">address</th>
									<th class="">dob</th>
									<th class="text-center">gender</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$i = 1;
								$sqli="CALL normalusers";
								$registering = $conn->query($sqli);
								while($row=$registering->fetch_assoc()):
									echo "
									<tr>
										<td>$row[id]</td>
										<td>$row[username]</td>
										<td>$row[email]</td>
										<td>$row[phone]</td>
										<td>$row[address]</td>
										<td>$row[dob]</td>
										<td>$row[gender]</td>
										
									";
									
								?>
								
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: 150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_register').click(function(){
		uni_modal("New Entry","manage_register.php")
	})
	
	$('.edit_register').click(function(){
		uni_modal("Manage register Details","manage_register.php?id="+$(this).attr('data-id'))
		
	})
	$('.delete_register').click(function(){
		_conf("Are you sure to delete this Person?","delete_register",[$(this).attr('data-id')])
	})

	function delete_register($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_register',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>