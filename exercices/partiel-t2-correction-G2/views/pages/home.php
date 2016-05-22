<section>
	
	<a class="button" href="<?= URL ?>add">Ajouter</a>

	<table class="hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Dépenseur</th>
				<th>Nom</th>
				<th>Catégorie</th>
				<th>Montant</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($expenses as $_expense): ?>
				<tr>
					<td><?= $_expense->id ?></td>
					<td>
						<img width="50" height="50" src="https://api.adorable.io/avatars/50/<?= $_expense->expenser ?>" alt="">
						<?= $_expense->expenser ?>
					</td>
					<td><?= $_expense->name ?></td>
					<td><?= $_expense->category_name ?></td>
					<td><?= number_format($_expense->amount,2) ?> €</td>
					<td>
						<a class="button alert small" href="<?= URL.'?action=delete&id='.$_expense->id ?>">Suppr.</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</section>