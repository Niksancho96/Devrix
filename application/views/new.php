<div id="container">
	<h2>Welcome to Event lister!</h2>

	<div id="body">
		<h1>Create new event:</h1>

		<form method="post">
			<div class="form-group row">
				<label for="name" class="col-2 col-form-label">Event Name:</label>
				<div class="col-10">
					<input class="form-control" type="text" name="name" id="name">
				</div>
			</div>

			<div class="form-group row">
				<label for="location" class="col-2 col-form-label">Event Location:</label>
				<div class="col-10">
					<input class="form-control" type="text" name="location" id="location">
				</div>
			</div>

			<div class="form-group row">
				<label for="date" class="col-2 col-form-label">Event Date:</label>
				<div class="col-10">
					<input class="form-control" type="date" name="date" id="date">
				</div>
			</div>

			<div class="form-group row">
				<label for="url" class="col-2 col-form-label">Event URL:</label>
				<div class="col-10">
					<input class="form-control" type="text" name="url" id="url">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-10">
					<button class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>

		<p class="footer">
			<a class="btn btn-primary new" href="index"><i class="fa fa-arrow-circle-left"></i> Back</a>
		</p>
	</div>
</div>
