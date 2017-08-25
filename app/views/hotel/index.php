<div class="container hotels">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="text-center">Hotels</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="POST">
				<input type="text" name="search" placeholder="Search Hotels...">
			</form>
		</div>
	</div>
	<?php if (!empty($search)): ?>
	<div class="row">
		<div class="col-xs-12 col-sm-offset-1 col-sm-10">
			<p class="search-for">Your search for: <span><?= $search ?></span></p>
		</div>
	</div>
	<?php endif ?>
	<div class="col-xs-12 col-sm-offset-1 col-sm-10">
		<?php if (!empty($hotels)): ?>
		<ul class="hotels-list">
			<?php foreach ($hotels as $h): ?>
			<li>
				<div class="hotel-cover" style="background-image: url('<?= $h->image ?>')"></div>
				<div class="info">
					<h2 class="title"><?= $h->name ?></h2>
					<div class="stars">
						<?php for ($i=0; $i < (int) $h->star_rating; $i++) { ?>
						<i class="glyphicon glyphicon-star" aria-hidden="true"></i>
						<?php } ?>
					</div>
					<?
						if (strlen(strip_tags($h->description, '<p>')) > 200) {
						   $h->description = substr($h->description, 0, 200) . "...";
						}
					?>
					<p><?= $h->description ?></p>

					<div class="location">
						<?= $h->location->city ?> - <?= $h->location->country ?>
					</div>
				</div>
			</li>
			<?php endforeach ?>
		</ul>
		<?php else: ?>
			<h2 class="no-results">OOPS... we didn't found any results for this search :(</h2>
		<?php endif ?>
	</div>
</div>