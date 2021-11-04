<?php
/** @var array $todo */
?>

<div class="todos-item">
	<div class="todos-item-checkbox"><?=$todo['completed'] ? "X" : ""?></div>
	<div class="todos-item-title <?=$todo['completed'] ? "completed" : ""?>"><?=$todo['title']?></div>
</div>