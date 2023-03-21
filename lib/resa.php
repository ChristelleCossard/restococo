<?php

$resa = [
    'name_client' => '',
    'date' => '',
    'heure' => '',
    'guests' => '',
    'allergies' => '',
];

    function saveResa(PDO $pdo, string $name_client, DateTime $date, DateTime $heure, int $guests, string $allergies) {
        $sql = "INSERT INTO `reservations` (`id`, `category_id`, `title`, `description`, `ingredients`, `instructions`, `image`) VALUES (NULL, :category_id, :title, :description, :ingredients, :instructions, :image);";
        $query = $pdo->prepare($sql);
  
        $query->bindParam(':name_client',  $name_client, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':heure', $heure, PDO::PARAM_STR);
        $query->bindParam(':guests', $guests, PDO::PARAM_INT);
        $query->bindParam(':allergies', $allergies, PDO::PARAM_STR);
        return $query->execute();
    }

    

