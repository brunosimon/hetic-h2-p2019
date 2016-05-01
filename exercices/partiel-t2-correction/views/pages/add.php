<a href="<?= URL ?>" class="button">Liste</a>

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
		<label for="name">Dépenseur</label>
		<input type="text" placeholder="John Snow" id="expenser" name="expenser">
	</div>

	<!-- NAME -->
	<div>
		<label for="name">Nom</label>
		<input type="text" placeholder="Tomates" id="name" name="name">
	</div>

	<!-- PRICE -->
	<div>
		<label for="price">Prix</label>
		<div class="input-group">
			<span class="input-group-label">€</span>
			<input class="input-group-field" type="number" placeholder="10" id="price" name="price" step="0.01">
		</div>
	</div>

	<!-- SUBMIT -->
	<div>
		<input type="submit" class="button" value="Envoyer">
	</div>
</form>