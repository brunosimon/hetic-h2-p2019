<section>
	<a class="button" href="<?= URL ?>">Liste</a>

	<?php if(!empty($errors)): ?>
		<div class="callout alert">
			<?php foreach($errors as $_error): ?>
				<p><?= $_error ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if(!empty($success)): ?>
		<div class="callout success">
			<?php foreach($success as $_success): ?>
				<p><?= $_success ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<form action="#" method="post">

		<!-- EXPENSER -->
		<div>
			<label for="expenser">Expenser</label>
			<input type="text" id="expenser" name="expenser" placeholder="John Snow">
		</div>

		<!-- NAME -->
		<div>
			<label for="name">Nom</label>
			<input type="text" id="name" name="name" placeholder="Tomate">
		</div>

		<!-- CATEGORY -->
		<div>
			<label for="id_category">Catégorie</label>
			<select name="id_category" id="id_category">
				<?php foreach($categories as $_category): ?>
					<option value="<?= $_category->id ?>"><?= $_category->name ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<!-- AMOUNT -->
		<div>
			<label for="amount">Montant</label>
			<div class="input-group">
				<span class="input-group-label">$</span>
				<input 
					class="input-group-field"
					type="number"
					step="0.01"
					id="amount"
					name="amount"
					placeholder="10.00"
				>
			</div>
		</div>

		<!-- SUBMIT -->
		<div>
			<input class="button" type="submit">
		</div>

	</form>

</section>