<div class="col-md-4">
    <div class="card">
        <img src="<?= _DISHES_IMG_PATH_. $dish['image']; ?>" class="card-img-top" alt="<?= $dish['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $dish['title']; ?></h5>
            <p class="card-text"><?= $dish['description']; ?></p>
            <a href="dish.php?id=<?=$key; ?>" class="btn btn-primary">Voir le plat</a>
        </div>
    </div>
</div>