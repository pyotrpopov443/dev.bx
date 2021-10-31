<h1>Add new Task</h1>
<form action="add.php" method="post">
	<div>
		<label>Title:<input type="text" name="title"></label>
	</div>

	<div>
		<label for="description">Desctiption</label>
	</div>

	<div>
		<textarea name="description" id="description" cols="20" rows="5"></textarea>
	</div>

	<div>
		<label for="completed">Completed: <input type="checkbox" name="completed"></label>
	</div>

	<div>
		<input type="submit" value="Add">
	</div>

</form>