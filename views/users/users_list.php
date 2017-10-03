<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['first_name']; ?></td>
        <td><?php echo $user['last_name']; ?></td>
        <td><?php echo $user['age']; ?></td>
        <td><?php echo $user['mail']; ?></td>
        <td><?php echo $user['gender']; ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</body>
</html>
