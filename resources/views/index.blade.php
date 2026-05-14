<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Attendance System</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('class.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="class" class="form-label">Class Name</label>
                <input type="text" class="form-control" id="class" name="class" placeholder="Enter class name">
            </div>
            <button type="submit" class="btn btn-primary">Add Class</button>
        </form>

        <div class="grid-box">
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                @foreach ($data as $item)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->Classes }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
    
</body>
</html>