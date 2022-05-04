
<div class="container">
	<h2>Job Catalog</h2>
	<form class="form-inline" action="?controller=jobs&action=search" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="id" name="id" type="text" placeholder="Search by ID">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span>Search</button>
			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>JobTitle</th>
					<th>Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<tbody>
					<?php foreach ($listaJobs as$jobs) {?>

					
					<tr>
						<td> <a href="?controller=jobs&&action=updateshow&&idJobs=<?php  echo $jobs->getId()?>"> <?php echo $jobs->getId(); ?></a> </td>
						<td><?php echo $jobs->getName(); ?></td>
						<td><?php echo $jobs->getDescription(); ?></td>
						<td><?php if ( $jobs->getStatus()=='checked'):?>
							Active
						<?php  else:?>
							Inactive
						<?php endif; ?></td>
						<td><a href="?controller=jobs&&action=delete&&id=<?php echo $jobs->getId() ?>">Delete</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>