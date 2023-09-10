<?php
function find_full_rooms(string $email, string $fullname, string $grade_name, DateTime $year) : array {

    $pdo = new PDO("mysql:host=localhost; dbname=lp_official; charset=utf8", "root", "");
    $query = "SELECT grades FROM students VALUES email, fullname, grade_name, year";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':grade_name', $grade_name, PDO::PARAM_STR);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->execute();

    if ($grade = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $grade;
    } else {
        return array();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour02*Job04</title>
</head>
<body>
    <?php
        $grades = ['name' => $email, 'fullname' => $fullname, 'grade_name' => $grade_name, 'grade_name', 'year' => $year];
    ?>
</body>
</html>