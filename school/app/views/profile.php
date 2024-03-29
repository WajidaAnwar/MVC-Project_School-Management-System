<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		

		<?php if($row):?>

		<?php
 			$image = get_image($row->image,$row->gender);
 		?>

		<div class="row">
			<div class="col-sm-4 col-md-3">
				<img src="<?=$image?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px;">
				<h3 class="text-center"><?=esc($row->firstname)?> <?=esc($row->lastname)?></h3>
			</div>
			<div class="col-sm-8 col-md-9 bg-light p-2">
				<table class="table table-hover table-dark table-bordered">
					<tr><th>First Name:</th><td><?=esc($row->firstname)?></td></tr>
					<tr><th>Last Name:</th><td><?=esc($row->lastname)?></td></tr>
					<tr><th>Email:</th><td><?=esc($row->email)?></td></tr>
					<tr><th>Gender:</th><td><?=esc($row->gender)?></td></tr>
					<tr><th>Rank:</th><td><?=ucwords(str_replace("_"," ",$row->rank))?></td></tr>
					<tr><th>Date Created:</th><td><?=get_date($row->date)?></td></tr>

				</table>
			</div>
		</div>
		<br>
		<div class="container-fluid">
			<ul class="nav nav-tabs">



		 
			</ul>

			<nav class="navbar navbar-light bg-light">
			  <form class="form-inline">
			    <div class="input-group">
			      <div class="input-group-prepend">
			        
			      </div>
			      
			    </div>
			  </form>
			</nav>

		</div>
		<?php else:?>
			<center><h4>Profile not found!</h4></center>
		<?php endif;?>

	</div>

<?php $this->view('includes/footer')?>
