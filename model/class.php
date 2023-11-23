<?php

require __DIR__ . "/../src/database/BDD.php";
class ConcordeManager extends database
{
    public function getAllCategories()
    {
        $query = $this->getPDO()->prepare("SELECT id, nom, salon_id FROM `category` ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSalons()
    {
        $query = $this->getPDO()->prepare("SELECT id, nom, category_id FROM `salons` ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNewCategory($newCategory)
    {
        $query = $this->getPDO()->prepare("INSERT INTO `category` (`nom`, `description`, `salon_id`) VALUES (?, '', 1)");
        $query->execute([$newCategory]);
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    public function addNewSalon($newSalon, $categoryID)
    {
        $query = $this->getPDO()->prepare("INSERT INTO `salons` (`nom`, `category_id`) VALUES (?, ?)");
        $query->execute([$newSalon, $categoryID]);
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    public function postMessage($messageText, $chosensalonID)
    {
        if ($chosensalonID !== null) {
            $query = $this->getPDO()->prepare("INSERT INTO `message` (`texte`, `salon_id`) VALUES (?, ?)");
            $query->execute([$messageText, $chosensalonID]);
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }
    }

    public function getMessages($chosensalonID)
    {
        if ($chosensalonID !== null) {
            $query = $this->getPDO()->prepare("SELECT texte from `message` WHERE `salon_id` = ?");
            $query->execute([$chosensalonID]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
