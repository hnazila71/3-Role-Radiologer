<!DOCTYPE html>
<html>

<head>
    <title>Doctor Dashboard</title>
</head>

<body>

    <h1>Doctor Dashboard</h1>

    <?php if (!empty($patients)): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Created At</th>
            </tr>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= $patient['id']; ?></td>
                    <td><?= $patient['name']; ?></td>
                    <td><?= $patient['date_of_birth']; ?></td>
                    <td><?= $patient['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No patients found.</p>
    <?php endif; ?>

</body>

</html>