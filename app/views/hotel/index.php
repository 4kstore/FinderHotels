<div class="container hotels">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="text-center">Hotels</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="POST">
				<input type="text" name="search" placeholder="Search hotels...">
			</form>
		</div>
	</div>
	<?php if (!empty($search)): ?>
	<div class="row">
		<div class="col-sm-12">
			<p class="search-for">Search for: <span><?= $search ?></span></p>
		</div>
	</div>
	<?php endif ?>
	<div class="row">
	<?php $i = 1; foreach ($hotels as $h): ?>
		<div class="col-sm-4">
			<article class="hotel-card">
				<h3><?= $h->name ?></h3>
				<img class="img-thumbnail" src="<?= $h->image ?>">
			</article>
		</div>
	<?php if ( $i % 3 === 0 ) {
	echo '
	</div>
	<div class="row">';
	} ?>
	<?php $i++; ?>
	<?php endforeach ?>
</div>