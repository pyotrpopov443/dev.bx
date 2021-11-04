<?php
/** @var array|null $newTodo */
/** @var array $errors */
?>

<?php if ($newTodo): ?>
	<div class="add-todo-success">
		<div>Title: <?= escape($newTodo['title']) ?></div>
		<div>Description: <?= escape($newTodo['description']) ?></div>
		<div>Completed: <?= $newTodo['completed'] ?></div>
	</div>
<?php elseif (!empty($errors)): ?>
	<ul class="add-todo-error">
	<?php foreach ($errors as $error): ?>
		<li><?= $error ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<h3>Add new task</h3>
<form action="add.php" method="post" enctype="multipart/form-data">
	<div>
		<label>Title: <input type="text" name="title"></label>
	</div>
	<div>
		<label for="description">Description</label>
	</div>
	<div>
		<textarea id="description" name="description" cols="20" rows="5"></textarea>
	</div>
	<div style="margin-bottom: 15px;">
		<label>Completed: <input type="checkbox" name="completed"></label>
	</div>
	<div><label>Task image: <input type="file" name="image"></label></div>
	<div class="add-todo-button-container">
		<input type="submit" value="Add">
	</div>
</form>