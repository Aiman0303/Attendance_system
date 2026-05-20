<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Student Portal</title>
</head>
<body>
    <div class="mt-4 p-4 bg-light rounded">
        <h3>REGISTER NEW STUDENT</h3>
        <form action="{{ route('student.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="IC" class="form-label">IC Number</label>
                <input type="text" class="form-control" id="IC" name="IC" placeholder="Enter IC number" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="Contact" name="Contact" placeholder="Enter Contact number" required>
            </div>

             <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" name="class" placeholder="Enter Student class" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <div class="container">
            <h1 class="text-center p-3">STUDENTS</h1>
        </div>

        <!--function for display students-->

        <!--student table-->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>IC.No</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Class</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                        
        </div>

    </div>
</body>
</html>