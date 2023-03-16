<?php

$dishes = [
    ['title' => 'Cassolette de veau', 'description' => 'Mousse quick example text to build on the card title and make up the bulk of the card\'s content.', 'image' => '1-cassolette-de-veau.jpg'],
    ['title' => 'Gratin d aubergine', 'description' => 'Gratin quick example text to build on the card title and make up the bulk of the card\'s content.', 'image' => '2-gratin-d-aubergine.jpg'],
    ['title' => 'Salade de la mer', 'description' => 'Salade quick example text to build on the card title and make up the bulk of the card\'s content.', 'image' => '3-salade-de-la-mer.jpg'],
];


function getDishById(PDO $pdo, int $id) {
    
    $query = $pdo->prepare("SELECT * FROM dishes WHERE id = :id");
    $query->bindParam(':id', $id, $pdo::PARAM_INT);
    $query->execute();
    $dish = $query->fetch();

    return $dish;
}

function getDishImage (string|null $image){
    if ($image == null) {
         return _ASSETS_IMAGES_FOLDER_.'dish_default.jpg';
    } else {
        return _DISHES_IMG_PATH_ . $image;
    }
    }

    function getDishes(PDO $pdo, int $limit = null) {
        $sql = 'SELECT * FROM dishes ORDER BY id DESC';
    
        if ($limit) {
            $sql .= ' LIMIT :limit';
        }
    
        $query = $pdo->prepare($sql);
    
        if ($limit) {
            $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
    
        $query->execute();
        return $query->fetchAll();
    }

    function saveDish(PDO $pdo, int $category, string $title, string $description, string $ingredients, string $instructions, string|null $image) {
        $sql = "INSERT INTO `dishes` (`id`, `category_id`, `title`, `description`, `ingredients`, `instructions`, `image`) VALUES (NULL, :category_id, :title, :description, :ingredients, :instructions, :image);";
        $query = $pdo->prepare($sql);
        $query->bindParam(':category_id', $category, PDO::PARAM_INT);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
        $query->bindParam(':instructions', $instructions, PDO::PARAM_STR);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        return $query->execute();
    }

    