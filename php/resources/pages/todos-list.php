<?php
/** @var array $todos */
?>

<div class="content-title">What I need to do:</div>
<div class="todos-list">
	<?php foreach ($todos as $todo): ?>
		<?= renderTemplate("./resources/blocks/_todo.php", ['todo' => $todo]) ?>
	<?php endforeach; ?>
</div>