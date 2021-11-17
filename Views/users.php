<html lang="en">
<head>
    <title>MVP</title>
</head>

<body>
<h3 style="text-align: center">MVP</h3>
<div>
    <a href="/">Back</a>
    <br>
    <table style="margin: 0 auto">
        <thead>
            <tr>
                <th>First name</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($users as $user) {?>
                <tr>
                    <td><?=$user->getFirstName()?></td>
                    <td><?=$user->getAge()?></td>
                    <td><?=$user->getGender()?></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
