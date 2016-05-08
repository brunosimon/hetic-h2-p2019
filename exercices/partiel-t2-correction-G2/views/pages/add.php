<section>

	<a class="button" href="<?= URL ?>">Liste</a>

	<?php if(!empty($errors)): ?>
		<div class="alert callout">
			<?php foreach($errors as $_error): ?>
				<p><?= $_error ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if(!empty($success)): ?>
		<div class="success callout">
			<?php foreach($success as $_success): ?>
				<p><?= $_success ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<form action="#" method="post">
		
		<!-- EXPENSER -->
		<div>
			<label for="expenser">Expenser</label>
			<input type="text" name="expenser" id="expenser" placeholder="John Snow">
		</div>
		
		<!-- NAME -->
		<div>
			<label for="name">Nom</label>
			<input type="text" name="name" id="name" placeholder="Tomates">
		</div>

		<!-- AMOUNT -->
		<div>
			<label for="amount">Montant</label>
			<div class="input-group">
				<span class="input-group-label">€</span>
				<input
					class="input-group-field"
					type="number"
					name="amount"
					id="amount"
					placeholder="10"
					step="0.01"
				>
			</div>
		</div>

		<!-- SUBMIT -->
		<div>
			<input class="button success" type="submit" value="Envoyer">
		</div>

	</form>
</section>