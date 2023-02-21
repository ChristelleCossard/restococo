<?php

$dishes = [
    ['title' => 'Cassolette de veau', 'description' => 'Mousse quick example text to build on the card title and make up the bulk of the card\'s content.', 'image' => '1-cassolette-de-veau.jpg'],
    ['title' => 'Gratin d aubergine', 'description' => 'Gratin quick example text to build on the card title and make up the bulk of the card\'s content.', 'image' => '2-gratin-d-aubergine.jpg'],
    ['title' => 'Salade de la mer', 'description' => 'Salade quick example text to build on the card title and make up the bulk of the card\'s content.', 'image' => '3-salade-de-la-mer.jpg'],
];

/*
function getRecipeById(PDO $pdo, int $id) {
    
    $query = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
    $query->bindParam(':id', $id, $pdo::PARAM_INT);
    $query->execute();
    $recipe = $query->fetch();

    return $recipe;
}

function getRecipeImage (string|null $image){
    if ($image == null) {
         return _ASSETS_IMAGES_FOLDER_.'recipe_default.jpg';
    } else {
        return _RECIPES_IMG_PATH_ . $image;
    }
    }

    function getRecipes(PDO $pdo, int $limit = null) {
        $sql = 'SELECT * FROM recipes ORDER BY id DESC';
    
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
        $sql = "INSERT INTO `recipes` (`id`, `category_id`, `title`, `description`, `ingredients`, `instructions`, `image`) VALUES (NULL, :category_id, :title, :description, :ingredients, :instructions, :image);";
        $query = $pdo->prepare($sql);
        $query->bindParam(':category_id', $category, PDO::PARAM_INT);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
        $query->bindParam(':instructions', $instructions, PDO::PARAM_STR);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        return $query->execute();
    }

    */