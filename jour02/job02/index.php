<?php
function find_one_student(string $email) : array {

    $pdo = new PDO("mysql:host=localhost; dbname=lp_official; charset=utf8", "root", "");
    $query = "SELECT email, fullname, gender, birthdate FROM student WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($student = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $student;
    } else {
        return array();
    }

}

$student = find_one_student("arobin@louis.com");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 02 * Job02</title>
</head>
<body>
    <table>
        <tr>
            <th>Email</th>
            <th>Full Name</th>
            <th>Birthdate</th>
            <th>Gender</th>
        </tr>
        <tr>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['fullname']; ?></td>
            <td><?php echo $student['birthdate']; ?></td>
            <td><?php echo $student['gender']; ?></td>
        </tr>
    </table>
</body>
</html>