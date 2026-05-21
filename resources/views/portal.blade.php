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
<style>
    .action-buttons{
        white-space: nowrap;
    }

    .action-buttons a{
        color: #000;
        text-decoration: none;
    }

    .container{
        padding: 30px;
    }

    .table-responsive{
        padding-left: 30px;
        padding-right: 30px;
        text-align: center;
    }

    h1 {
        color: #333;
        margin-bottom: 30px;
    }

    .table tr.green-row td {
        background-color: lightgreen !important;
    }

    .table tr.red-row td {
        background-color: lightcoral !important;

    }
</style>


<body>
    <div class="main-container">

    
        <div class="container">
            <h1 class="text-center p-3">STUDENTS</h1>
        </div>

        <!--student table-->
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="table-dark ">
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
                    @foreach ($attendance as $student)
                        <tr class="{{ $student->status == 1 ? 'green-row' : ($student->status == 2 ? 'red-row' : '') }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->IC }}</td>
                            <td>{{ $student->Name }}</td>
                            <td>{{ $student->Contact }}</td>
                            <td>{{ $student->class }}</td>
                            <td class="action-buttons">
                                <div class="d-flex gap-2">
                                    <form action="{{ route('attendance.update', $student->id) }}" method="POST"
                                        class="d-flex align-items-center gap-2 m-0">
                                        @csrf
                                        @method('PUT')

                                        <select name="status" class="form-select form-select-sm" style="width: 250px;" onchange="changeRowColor(this)">
                                            <option value="">Choose</option>
                                            <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Present</option>
                                            <option value="2" {{ $student->status == 2 ? 'selected' : '' }}>Absent</option>
                                        </select>

                                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    </form>

                                    <form action="{{ route('attendance.delete', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Drop</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>    
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function changeRowColor(select){
                let row = select.closest("tr");

                row.classList.remove("green-row", "red-row");

                if(select.value == "1"){
                    row.classList.add("green-row");
                } 
                else if(select.value == "2"){
                    row.classList.add("red-row");
                }
            }
        </script>
</body>
</html>