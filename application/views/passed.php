<div id="container">
	<h2>Welcome to Event lister!</h2>

	<div id="body">
		<h1>Passed events:</h1>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Location</th>
				<th>Date</th>
				<th>URL</th>
			</tr>
			<?php foreach($passed as $event): ?>
				<tr>
					<td><?= $event['id'] ?></td>
					<td><?= $event['name'] ?></td>
					<td><a href="<?= $event['location']['link'] ?>" target="_blank"><?= $event['location']['address'] ?></a></td>
					<td><?= $event['date'] ?></td>
					<td><a href="<?= $event['url'] ?>" target="_blank">Link</a></td>
				</tr>
			<?php endforeach ?>
		</table>

		<p class="footer">
			<a class="btn btn-primary new" href="index.php/welcome/index"><i class="fa fa-arrow-circle-left"></i> Back</a>
		</p>
	</div>
</div>
