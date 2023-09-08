<?php
function find_all_students() : array {

    $pdo = new PDO("mysql:host=localhost; dbname=lp_official; charset=utf8", "root", "");
    $query = "SELECT email, fullname, gender, birthdate FROM student";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

$students = find_all_students();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 02 * Job01</title>
</head>
<body>
    <table>
        <tr>
            <th>Email</th>
            <th>Full Name</th>
            <th>Birthdate</th>
            <th>Gender</th>
        </tr>
        <?php foreach($students as $student) {
            ?>
            <tr>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['fullname']; ?></td>
                <td><?php echo $student['birthdate']; ?></td>
                <td><?php echo $student['gender']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>