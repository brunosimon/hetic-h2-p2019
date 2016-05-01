<a href="<?= URL ?>add" class="button">Add</a>

<?php if(!empty($success)): ?>
	<div class="success callout">
		<?php foreach($success as $_success): ?>
			<p><?= $_success ?></p>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<table class="hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Dépenseur</th>
			<th>Name</th>
			<th>Value</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($expenses as $_expense): ?>
			<tr>
				<td><?= $_expense->id ?></td>
				<td><img width="30" height="30" src="https://api.adorable.io/avatars/30/<?= $_expense->expenser ?>"> <?= $_expense->expenser ?></td>
				<td><?= $_expense->name ?></td>
				<td><?= number_format($_expense->price,2) ?> €</td>
				<td><a href="<?= URL.'?action=delete&id='.$_expense->id ?>" class="button alert small">Suppr.</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>