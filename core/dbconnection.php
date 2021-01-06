<?php

error_reporting(E_ERROR  | E_PARSE);
ini_set("display_error", 1);

class DB
{

    function __construct($dbopts)
    {
        $attributes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
        $this->pdo = new PDO("mysql:host=" . $dbopts['DB_host'] . ";dbname=" . $dbopts['DB_name'], $dbopts['DB_user'], $dbopts['DB_pass'], $attributes);
    }

    public function getUser($username, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `username`=? AND `password`=?";

        $query = $this->pdo->prepare($sql);
        $query->execute(array($username, $password));

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if (count($result_array) > 0) return $result_array;
        return false;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id`=?";

        $query = $this->pdo->prepare($sql);
        $query->execute(array($id));

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if (count($result_array) > 0) return $result_array;
        return false;
    }


    public function getAllBooksLimited($starting_point, $offset)
    {
        $sql = "SELECT * FROM `books` LIMIT :starting_point, :offset";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':starting_point', (int)$starting_point, PDO::PARAM_INT);
        $query->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result_array) > 0) {
            return $result_array;
        }
        return false;
    }


    public function getCount()
    {
        $sql = "SELECT COUNT(*) as cnt FROM `books`";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if (count($result_array) > 0) {
            return (int)$result_array['cnt'];
        }
        return false;
    }

    public function getBook($book_id)
    {
        $sql = "SELECT * FROM `books` WHERE `book_id` = :book_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':book_id', $book_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if (count($result_array) > 0) {
            return $result_array;
        }
        return false;
    }

    public function insertBook($book_name, $book_shortDesc, $book_longDesc, $book_author, $book_genre, $book_recipient, $book_recipient_address, $book_recipient_birthdate, $book_recipient_phone, $book_presence, $book_count, $book_period_devoted, $book_period)
    {
        $sql = "INSERT INTO `books` (`book_name`, `book_shortDesc`, `book_longDesc`, `book_author`, `book_genre`,`book_recipient`,`book_recipient_address`,`book_recipient_birthdate`,`book_recipient_mobile`,`book_presence`,`book_count`,`book_period_devoted`,`book_period`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->pdo->prepare($sql);

        $query->execute(array($book_name, $book_shortDesc, $book_longDesc, $book_author, $book_genre, $book_recipient,$book_recipient_address, $book_recipient_birthdate, $book_recipient_phone, $book_presence, $book_count, $book_period_devoted, $book_period));

        return $this->pdo->lastInsertId();
    }

    public function updateBook($book_id, $book_name, $book_shortDesc, $book_longDesc, $book_author, $book_genre, $book_recipient, $book_recipient_address, $book_recipient_birthdate, $book_recipient_mobile, $book_presence, $book_count, $book_period_devoted, $book_period)
    {
        $sql = "UPDATE `books` SET `book_name`=:book_name, `book_shortDesc`=:book_shortDesc, `book_longDesc`=:book_longDesc, `book_author`=:book_author, `book_genre`=:book_genre, `book_recipient`=:book_recipient,`book_recipient_address`=:book_recipient_address,`book_recipient_birthdate`=:book_recipient_birthdate,`book_recipient_mobile`=:book_recipient_mobile,`book_presence`=:book_presence ,`book_count`=:book_count,`book_period_devoted`=:book_period_devoted,`book_period`=:book_period WHERE `book_id`=:book_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":book_id", $book_id, PDO::PARAM_INT);
        $query->bindValue(":book_name", $book_name, PDO::PARAM_STR);
        $query->bindValue(":book_shortDesc", $book_shortDesc, PDO::PARAM_STR);
        $query->bindValue(":book_longDesc", $book_longDesc, PDO::PARAM_STR);
        $query->bindValue(":book_author", $book_author, PDO::PARAM_STR);
        $query->bindValue(":book_genre", $book_genre, PDO::PARAM_STR);
        $query->bindValue(":book_recipient", $book_recipient, PDO::PARAM_STR);
        $query->bindValue(":book_recipient_address", $book_recipient_address, PDO::PARAM_STR);
        $query->bindValue(":book_recipient_birthdate", $book_recipient_birthdate, PDO::PARAM_STR);
        $query->bindValue(":book_recipient_mobile", $book_recipient_mobile, PDO::PARAM_STR);
        $query->bindValue(":book_period_devoted", $book_period_devoted, PDO::PARAM_STR);
        $query->bindValue(":book_period", $book_period, PDO::PARAM_STR);
        $query->bindValue(":book_presence", $book_presence, PDO::PARAM_STR);
        $query->bindValue(":book_count", $book_count, PDO::PARAM_INT);
        $query->execute();

        return ($query->rowCount() > 0 ? true : false);

    }

    public function deleteBook($book_id)
    {
        $sql = "DELETE FROM `books` WHERE `book_id`=:book_id";

        $query = $this->pdo->prepare($sql);

        $query->bindValue(":book_id", $book_id, PDO::PARAM_INT);
        $query->execute();

    }

    public function getBooksSearch($book_name){
        $sql  = "SELECT * FROM books WHERE book_name LIKE  ?  ORDER BY book_name DESC";
        $query = $this->pdo->prepare($sql);

        $args[] = $book_name;
        $query->execute(array('%'.$book_name.'%'));
        $result_array = $query->fetchAll(PDO::FETCH_ASSOC);

        if(count($result_array) > 0){
            return $result_array;
        }

        return false;
    }

    public function getAuthorsSearch($book_author){
        $sql  = "SELECT * FROM books WHERE book_author LIKE  ?  ORDER BY book_author DESC";
        $query = $this->pdo->prepare($sql);

        $args[] = $book_author;
        $query->execute(array('%'.$book_author.'%'));
        $result_array = $query->fetchAll(PDO::FETCH_ASSOC);

        if(count($result_array) > 0){
            return $result_array;
        }

        return false;
    }

    public function getRecipientsSearch($book_recipient){
        $sql  = "SELECT * FROM books WHERE book_recipient LIKE  ?  ORDER BY book_recipient DESC";
        $query = $this->pdo->prepare($sql);

        $args[] = $book_recipient;
        $query->execute(array('%'.$book_recipient.'%'));
        $result_array = $query->fetchAll(PDO::FETCH_ASSOC);

        if(count($result_array) > 0){
            return $result_array;
        }

        return false;
    }
}

?>