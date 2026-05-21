<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Register Student</title>
</head>
<body>
    <body>
    <div class="mt-4 p-4 bg-light rounded">
        <h3>REGISTER NEW STUDENT</h3>
        <form action="{{ route('student.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="IC" class="form-label">IC Number</label>
                <input type="text" class="form-control" id="IC" name="IC" placeholder="Enter IC number" required>
            </div>

            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="Contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="Contact" name="Contact" placeholder="Enter Contact number" required>
            </div>

             <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" name="class" placeholder="Enter Student class" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

        @if (session('success'))
            <div class="alert alert-success-dismissable fade-show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss='alert'></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
            </ul>
                
            </div>
        @endif

</body>
</html>