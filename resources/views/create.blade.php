<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css" integrity="sha512-CB+XYxRC7cXZqO/8cP3V+ve2+6g6ynOnvJD6p4E4y3+wwkScH9qEOla+BTHzcwB4xKgvWn816Iv0io5l3rAOBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .validate {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container" style="border:1px solid #C1C1C1;">
        <div class="row">
            <div class="col-12 px-3">
                <form action="{{ route('application.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-3 flex">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                        @error('name')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="email" class="form-label">Email :</label>
                        <input class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                        @error('email')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="phone" class="form-label">Phone :</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your Phone Number" value="{{ old('phone') }}">
                        @error('phone')
                        <p class="validate m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex flex-row">
                        <div class="m-3">
                            <p>Gender :</p>
                        </div>
                        <div class="form-check m-3">
                            <label for="radio1" class="form-check-label">Male</label>
                            <input class="form-check-input" type="radio" name="gender" id="radio1" value="male" checked="checked">
                        </div>
                        <div class="form-check m-3">
                            <label for="radio2" class="form-check-label">Female</label>
                            <input class="form-check-input" type="radio" name="gender" id="radio2" value="female">
                        </div>
                        <div class="form-check m-3">
                            <label for="radio3" class="form-check-label">Others</label>
                            <input class="form-check-input" type="radio" name="gender" id="radio3" value="other">
                        </div>
                        @error('gender')
                        <p class="validate m-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="faculty" class="form-label">Faculty :</label>
                        <select name="faculty" id="faculty" class="form-control">
                            <option value="bca">BCA</option>
                            <option value="bit" selected>BIT</option>
                            <option value="bsc">BSC</option>
                        </select>
                        @error('faculty')
                        <p class="validate">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex flex-row">
                        <div class="m-3">
                            <p>Status :</p>
                        </div>
                        <div class="form-check m-3">
                            <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="m-3">
                        <label for="detail" class="form-label">Details :</label>
                        <textarea class="form-control" name="detail" id="detail" cols="30" rows="3" placeholder="Enter Message...(Optional)" style="resize: none;" value="">{{ old('detail') }}</textarea>
                        @error('detail')
                        <p class="validate">{{ $message }}</p>
                        @enderror
                    </div>
                    <a href="{{ route('application.index') }}" class="btn btn-danger m-3"><i class="fa fa-ban" aria-hidden="true"></i> CANCEL</a>
                    <button type="reset" class="btn btn-secondary m-3"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                    <button type="submit" class="btn btn-success m-3"><i class="fa fa-paper-plane" aria-hidden="true"></i> SUBMIT</button>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>