<?php 

require_once "functions/api.php";
require_once "includes/header.php";
require_once "config.php";

$movies = null; // Inisialisasi variabel $movies sebagai null
$page = rand(1, 50);
$error = null;


if (isset($_GET['search'])) { // Mengecek apakah ada pencarian yang dikirim via URL 
    $movies = searchMovies($_GET['search']); // query = yang di search user

    if (!$movies || $movies['Response'] == "False") {
        $error = $movies["Error"];
    }
}
?>

<h2 class="text-center">Search All Movies</h2>


<!-- menampilkan hasil pencarian -->
<div class="row justify-content-center ">
    <?php if ($movies && $movies["Response"] == "True") :?>
        <?php foreach($movies["Search"] as $movie) : ?>
            <div class="col-md-4">
            <div class="card mb-3">

            
  <img class="card-img-top" src="<?= $movie['Poster'] ?>" alt="<?= $movie['Poster'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?= $movie['Title'] ?></h5>
    <p class="card-text"><?= $movie['Year'] ?></p>
    <p class="card-text">Type: <?= $movie['Type'] ?></p>
    <a href="detail.php?id=<?= $movie['imdbID']?>" class="btn btn-primary">Go details</a>
  </div>
  </div>
</div>
<?php endforeach; ?>
< <?php elseif ($error) : ?> 
    <h3 class="text-center text-danger"><?= $error ?></h3>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php' ?>