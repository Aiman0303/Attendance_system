<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .grid-box {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
        }

            .card {
                background-color: rgb(247, 243, 189);
            }

            .card:hover {
                background-color: rgb(190, 186, 118);
                transform: scale(1.05);
                transition: transform 0.3s ease;
            }

            .card:active {
                background-color: rgb(190, 186, 118);
                transform: scale(0.99);
                transition: transform 0.3s ease;
            }

            .card-body{
                text-color: black;
                font-size: 1.5rem;
                align-items: center;
                justify-content: center;
                display: flex;
            }
    </style>

    <title>Attendance System</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('class.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="class" class="form-label">Class Name</label>
                <input type="text" class="form-control" id="class" name="class" placeholder="Enter class name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Class</button>
        </form>

        <!--class list-->
        <div class="d-grid gap-4 mt-3">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($data as $item)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <a href="#" class="card-title stretched-link text-decoration-none">{{ $item->classes }}</a>
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