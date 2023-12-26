<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-3">
        <h2>VIEW INFORMATION</h2>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <p><strong>Name: </strong> {{ $data->name }}</p>
                <hr>
                <p><strong>Email: </strong> {{ $data->email }}</p>
                <hr>
                <p><strong>Phone: </strong> {{ $data->phone }}</p>
                <hr>
                <p><strong>Gender: </strong> {{ $data->gender }}</p>
                <hr>
                <p><strong>Faculty: </strong> {{ $data->faculty }}</p>
                <hr>
            </div>

            <div class="col-md-6">
                <p><strong>Status: </strong>
                    @if($data->status == 1)
                    <span class="badge bg-success">ACTIVE</span>
                    @else
                    <span class="badge bg-danger">INACTIVE</span>
                    @endif
                </p>
                <hr>

                <p><strong>Details: </strong> {{ $data->detail }}</p>
                <hr>

                <p><strong>Image: </strong></p>
                <hr>
                <img src="{{ asset('uploads/' . $data->image) }}" alt="User Image" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
            </div>
        </div>

        <hr>

        <a href="{{ route('application.index') }}" class="btn btn-outline-primary">Back to List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>