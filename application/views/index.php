<div id="container">
	<h2>Welcome to Event lister!</h2>

	<div id="body">
		<h1><a href="today">Today's events:</a></h1>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Location</th>
				<th>Date</th>
				<th>URL</th>
			</tr>
			<?php foreach($today as $event): ?>
				<tr>
					<td><?= $event['id'] ?></td>
					<td><?= $event['name'] ?></td>
					<td><?= $event['location'] ?></td>
					<td><?= $event['date'] ?></td>
					<td><a href="<?= $event['url'] ?>" target="_blank">Link</a></td>
				</tr>
			<?php endforeach ?>
		</table>

		<h1><a href="comming">Up comming events:</a></h1>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Location</th>
				<th>Date</th>
				<th>URL</th>
			</tr>
			<?php foreach($comming as $event): ?>
				<tr>
					<td><?= $event['id'] ?></td>
					<td><?= $event['name'] ?></td>
					<td><?= $event['location'] ?></td>
					<td><?= $event['date'] ?></td>
					<td><a href="<?= $event['url'] ?>" target="_blank">Link</a></td>
				</tr>
			<?php endforeach ?>
		</table>

		<h1><a href="passed">Passed events:</a></h1>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Location</th>
				<th>Date</th>
				<th>URL</th>
			</tr>
			<?php foreach($old as $event): ?>
				<tr>
					<td><?= $event['id'] ?></td>
					<td><?= $event['name'] ?></td>
					<td><?= $event['location'] ?></td>
					<td><?= $event['date'] ?></td>
					<td><a href="<?= $event['url'] ?>" target="_blank">Link</a></td>
				</tr>
			<?php endforeach ?>
		</table>

		<p class="footer">
			<a class="btn btn-primary new" href="create">Add new event</a>
		</p>
	</div>
</div>
