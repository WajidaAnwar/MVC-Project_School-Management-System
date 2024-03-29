
<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		

		<nav class="navbar navbar-light" style="background-color: #800080">
		  <form class="form-inline">
		    <div class="input-group">
		      <div class="input-group-prepend">
		      </div>
			  <div class="d-flex justify-content-center">
  
			  </div>
			  <div class="p-1" >
			  <font color="white">
				  
			  <center>
				  <h4>	<br>Staff Members</h4>
				</center>
			  </font>
				  
</div>
		     
		    </div>
		  </form>
 			<a href="<?=ROOT?>/signup">
			<?php if(Auth::access('admin')):?> <?php //only for super admins,admins ?>
				<button class="btn btn-sm btn-primary"><i></i>Add New</button>
			</a>
 		</nav>

		<div class="card-group justify-content-center">

			<?php if($rows):?> 
				<?php foreach ($rows as $row):?>
				 
				 <?php
 				 	$image = get_image($row->image,$row->gender);
 				 ?>
				<div class="card m-2 shadow-sm" style="max-width: 14rem;min-width: 14rem;">
		  		  <img src="<?=$image?>" class="card-img-top " alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><?=$row->firstname?> <?=$row->lastname?></h5>
				    <p class="card-text"><?=str_replace("_", " ", $row->rank)?></p>
				    <a href="<?=ROOT?>/profile/<?=$row->user_id?>" class="btn btn-primary">Profile</a>
				  </div>
				</div>

	 			<?php endforeach;?>
 			<?php else:?>
 				<h4>No staff members were found at this time</h4>
 			<?php endif;?>
		</div>

		
	 
	</div>
 
<?php $this->view('includes/footer')?>
