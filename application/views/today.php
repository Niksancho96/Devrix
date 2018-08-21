<div id="container">
	<h2>Welcome to Event lister!</h2>

	<div id="body">
		<h1>Today's events:</h1>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Location</th>
				<th>Date</th>
				<th>URL</th>
				<th>Actions</th>
			</tr>
			<?php foreach($today as $event): ?>
				<tr>
					<td><?= $event['id'] ?></td>
					<td><?= $event['name'] ?></td>
					<td><?= $event['location'] ?></td>
					<td><?= $event['date'] ?></td>
					<td><a href="<?= $event['url'] ?>" target="_blank">Link</a></td>
					<td><button class="btn-small btn-primary"><i class="fa fa-check"></i> Add to Google Calendar</button></td>
				</tr>
			<?php endforeach ?>
		</table>



		<p class="footer">
			<a class="btn btn-primary new" href="index"><i class="fa fa-arrow-circle-left"></i> Back</a>
		</p>
	</div>
</div>
