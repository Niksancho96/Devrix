<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		/*border-bottom: 1px solid #D0D0D0;*/
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	h2 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 20px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		line-height: 32px;
		padding: 0 10px 0 20px;
		margin: 50px 0 0 0;
	}

	#container {
		height: 665px;
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	.new {
		float: left;
		margin-left: -35px;
	}
</style>

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
			</tr>
			<?php foreach($today as $event): ?>
				<tr>
					<td><?= $event['id'] ?></td>
					<td><?= $event['name'] ?></td>
					<td><?= $event['location'] ?></td>
					<td><?= $event['date'] ?></td>
					<td><a href="#"><?= $event['url'] ?></a></td>
				</tr>
			<?php endforeach ?>
		</table>

		<h1>Up comming events:</h1>
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
					<td><a href="#"><?= $event['url'] ?></a></td>
				</tr>
			<?php endforeach ?>
		</table>

		<h1>Passed events:</h1>
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
					<td><a href="#"><?= $event['url'] ?></a></td>
				</tr>
			<?php endforeach ?>
		</table>

		<p class="footer">
			<a class="btn btn-primary new" href="#">Add new event</a>
		</p>
	</div>
</div>
