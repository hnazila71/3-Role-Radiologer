<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Add Existing Patient</h1>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/radiologer/addPatient') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="patient_id" class="form-label">Select Patient</label>
                <select class="form-select" id="patient_id" name="patient_id" required>
                    <option value="">Select Patient</option>
                    <?php foreach ($patients as $patient): ?>
                        <option value="<?= esc($patient['id']) ?>"><?= esc($patient['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Patient</button>
        </form>
    </div>
</body>

</html>