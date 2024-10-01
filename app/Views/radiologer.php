<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Uploaded Images</h1>

        <!-- Button to add new patient -->
        <a href="<?= base_url('/radiologer/addPatientToImages') ?>" class="btn btn-primary mb-3">Add New Patient</a>

        <?php if (!empty($images)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Radiologist Name</th>
                        <th>Upload Date</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images as $image): ?>
                        <tr>
                            <td><?= esc($image['id']) ?></td>
                            <td><?= esc($image['patient_name']) ?></td>
                            <td><?= esc($image['radiologist_name']) ?></td>
                            <td><?= esc($image['upload_date']) ?></td>
                            <td>
                                <img src="<?= base_url($image['image_path']) ?>" alt="Image" style="width: 100px; height: auto;">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No images uploaded.</p>
        <?php endif; ?>
    </div>
</body>

</html>