<div class="container">
	<h2>Update Job</h2>
	<form action="?controller=jobs&&action=update" method="POST">
		<input type="hidden" name="id" value="<?php echo $jobs->getId() ?>" >
		<div class="form-group">
			<label for="text">Job Title</label>
			<input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $jobs->getName() ?>">
		</div>
		<div class="form-group">
			<label for="text">Description</label>
			<input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $jobs->getDescription(); ?>">
		</div>
		<div class="check-box">
			<label>Active <input type="checkbox" name="estado" <?php echo $jobs->getStatus() ?>></label>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>

	</form>
</div>