<!DOCTYPE html>
<html>
<head>
    <title>CI4 CRUD</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .table th {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</div>

</body>
</html>