<?php

require_once('index.php');

function findOneStudent(int $id): Student
{
    $pdo = new PDO("mysql:host=localhost; dbname=lp_official; charset=utf8", "root", "");
    $query = "SELECT email, fullname, gender, birthdate FROM student WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($foundStudent = $stmt->fetch(PDO::FETCH_ASSOC)){
        var_dump($foundStudent);    
        return $foundStudent;
    } else {
        var_dump($foundStudent);
        return $foundStudent;
    }
}

var_dump(findOneStudent(12));

?>