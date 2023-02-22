<div class="col-md-4">
    <div class="card">
    <img src="<?= getDishImage($dish['image']); ?>" class="card-img-top" alt="<?= $dish['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $dish['title']; ?></h5>
            <p class="card-text"><?= $dish['description']; ?></p>
            <a href="plat.php?id=<?=$dish['id']; ?>" class="btn btn-primary">Voir le plat</a>
        </div>
    </div>
</div>