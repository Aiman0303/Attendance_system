<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
</head>
<body>
    <form action="/class" method="POST">
        @csrf
        <input type="text" name="class" placeholder="Class Name">
        <button type="submit">Add class</button>
        
    </form>

    @foreach ($data as $item)
        <p> {{$item->class}}</p>
    @endforeach
    
</body>
</html>