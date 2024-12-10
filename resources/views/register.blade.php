<!-- resources/views/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <!-- Input ID Unit -->
            <div class="mb-3">
                <input type="text" class="form-control" name="id_unit" placeholder="ID Unit" required>
            </div>
            <!-- Input Email -->
            <div class="mb-3">
                <input type="email" class="form-control" name="email_user" placeholder="Email" required>
            </div>
            <!-- Input PERNER -->
            <div class="mb-3">
                <input type="text" class="form-control" name="perner" placeholder="PERNER" required>
            </div>
            <!-- Input Password -->
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>
