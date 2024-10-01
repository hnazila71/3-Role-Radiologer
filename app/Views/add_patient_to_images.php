<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient to Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Add Patient to Images</h1>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/radiologer/addPatientToImages') ?>" method="post">
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

            <button type="submit" class="btn btn-primary">Add Patient to Images</button>
        </form>
    </div>
</body>

</html>