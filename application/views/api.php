<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>Routes de Api Rest</title>
</head>
<body>

	<div class="container mt-3">
		<div class="card">
		  <h5 class="card-header">Routes Api Rest</h5>
		  <div class="card-body">
		    <h5 class="card-title">Pet</h5>
		    <div class="alert alert-secondary" role="alert">
			  GET /pet <br>	
			  GET /pet/$id <br>	
			  GET /pet/findByStatus?status=$status
			</div>
			<div class="alert alert-secondary" role="alert">
			  POST /pet <br>	
			</div>
			<div class="alert alert-secondary" role="alert">
			  PUT /pet/$id <br>	
			</div>
			<div class="alert alert-secondary" role="alert">
			  DELETE /pet/$id <br>	
			</div>
			<h5 class="card-title">Category</h5>
			<div class="alert alert-secondary" role="alert">
			  GET /category <br>	
			  GET /category/$id
			</div>
			<h5 class="card-title">Tags</h5>
			<div class="alert alert-secondary" role="alert">
			  GET /tag <br>	
			  GET /tag/$id
			</div>
		  </div>
		</div>
	</div>
	
</body>
</html>