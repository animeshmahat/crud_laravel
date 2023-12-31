<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css" integrity="sha512-CB+XYxRC7cXZqO/8cP3V+ve2+6g6ynOnvJD6p4E4y3+wwkScH9qEOla+BTHzcwB4xKgvWn816Iv0io5l3rAOBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .img-thumbnail {
            max-width: 120px;
            max-height: 100px;
            border: 1px solid #000000;
            transition: transform 0.2s ease-in-out;
        }

        .img-thumbnail:hover {
            transform: scale(1.8);
        }
    </style>
</head>

<body>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('update_success'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('update_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('delete_success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('delete_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container my-3">
        <div class="row">
            <div class="col-12 px-4">
                <a href="{{ route('application.create')}}" class="btn btn-success btn-sm mx-3"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add New</a>
                <table class="table table-sm table-hover m-3">
                    <thead>
                        <tr class="table-primary" style="text-align: center;">
                            <th scope="col">S.N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Status</th>
                            <th scope="col">Details</th>
                            <th class="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$row)
                        <tr style="vertical-align: middle; text-align: center;">
                            <td>{{ $key+1 }}.</td>
                            <td>{{ $row -> name }}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $row->image) }}" alt="User Image" class="img-thumbnail" style="max-width: 120px; max-height: 100px; border: 1px solid #000000">
                            </td>
                            <td>{{ $row -> email }}</td>
                            <td>{{ $row -> phone }}</td>
                            <td>
                                @if ($row->gender == "male")
                                <span class="badge" style="background-color: #0079FF;"><i class="fa fa-mars" aria-hidden="true"></i> MALE</span class="badge">
                                @elseif ($row->gender == "female")
                                <span class="badge" style="background-color: #F100FF;"><i class="fa fa-venus" aria-hidden="true"></i> FEMALE</span>
                                @elseif ($row->gender == "other")
                                <span class="badge" style="background-color: #697582;">OTHERS</span>
                                @endif
                            </td>
                            <td>{{ $row -> faculty }}</td>
                            <td>
                                @if ( $row-> status == "1" )
                                <span class="badge bg-success">ACTIVE</span>
                                @elseif ( $row -> status == "0" )
                                <span class="badge bg-danger">INACTIVE</span>
                                @endif
                            </td>
                            <td style="text-align: left;">{{ $row -> detail}}</td>
                            <td class="d-flex flex-column">
                                <a href="{{ route('application.view', ['id' => $row->id]) }}" class="btn btn-secondary btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</a>
                                <a href="{{ route('application.edit', ['id'=> $row->id]) }}" class="btn btn-warning btn-sm m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</a>
                                <a href="{{ route('application.delete', ['id'=> $row->id]) }}" class="btn btn-danger btn-sm m-1" onclick="return confirm('Permanently delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure you want to delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/application/delete/' + id;
                }
            });
        }
    </script> -->
</body>

</html>