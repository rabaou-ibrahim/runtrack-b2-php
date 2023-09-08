<?php
function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId) : array {

    $pdo = new PDO("mysql:host=localhost; dbname=lp_official; charset=utf8", "root", "");
    $query = "INSERT INTO student VALUES email, fullname, gender, birthdate";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_INT);
    $stmt->execute();

    if ($student = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $student;
    } else {
        return array();
    }

}

$student = insert_student("test.test@laplateforme.io", "Test TEST", "homme", "01/01/1901", lastInsertId());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 02 * Job02</title>
</head>
<body>
    <form>
        <input type="email" name="input-email">
        <input type="text" name="input-fullname">
        <select type="" name="input-gender">
            <option value="">Genre :</option>

        <input type="date" name="input-birthdate">
        <input type="number" name="input-grade_id">
        </tr>
    </form>
</body>
</html>