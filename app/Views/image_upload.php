<!-- File: app/Views/upload_image.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Upload Patient Image</h1>

        <!-- Form to upload the image -->
        <form action="<?= base_url('/upload/process') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="patient_id" class="form-label">Select Patient</label>
                <select class="form-select" id="patient_id" name="patient_id" required>
                    <option value="">Select Patient</option>
                    <?php foreach ($patients as $patient): ?>
                        <option value="<?= esc($patient['id']) ?>"><?= esc($patient['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Select Doctor</label>
                <select class="form-select" id="doctor_id" name="doctor_id" required>
                    <option value="">Select Doctor</option>
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?= esc($doctor['id']) ?>"><?= esc($doctor['email']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>