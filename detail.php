<?php 

require_once "functions/api.php";
require_once "includes/header.php";

$movie = null;
if (isset($_GET['id'])) {
    $movie = getDeatilMovie($_GET['id']);
}

?>


<?php if ($movie && $movie["Response"] == "True") : ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?= $movie['Poster'] ?>">
        </div>
        <div class="col-md-8">
            <h2><?= $movie['Title'] ?></h2>
            <ul class="list-group">
  <li class="list-group-item"><?= $movie["Year"] ?></li>
  <li class="list-group-item"> Relesaed: <?= $movie["Released"] ?></li>
  <li class="list-group-item">Runtime: <?= $movie["Runtime"] ?></li>
  <li class="list-group-item">Genre: <?= $movie['Genre'] ?></li>
  <li class="list-group-item">Actors: <?= $movie['Actors'] ?></li>
</ul>
<a href="index.php" class="btn btn-back btn-secondary mt-3">Back</a>
        </div>
       
    </div>
    <?php else : ?>
    <h3 class="text-center bold">Movie Not Found</h3cla>
<?php endif; ?>