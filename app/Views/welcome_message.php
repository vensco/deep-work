<?= $this->extend("layouts/app") ?>

<?= $this->section("style") ?>
<link rel="stylesheet" href="style.css">
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card shadow">
				<div class="card-body"></div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section("script") ?>

<script>
	console.log("working");
</script>

<?= $this->endSection() ?>
