<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/custem.js') }}"></script>
<style>
    body {
        background-color: black;
    }

    .card {
        background-color: black;
        color: white;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-top:10px;">
                <div class="card-header">
                    <h4>Student Registration</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('add-student') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Student FirstName</label>
                            <input type="text" name="firstname" class="form-control">
                            @if ($errors->has('firstname')) <p style="color:red;">{{ $errors->first('firstname') }}</p> @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student LastName</label>
                            <input type="text" name="lastname" class="form-control">
                            @if ($errors->has('lastname')) <p style="color:red;">{{ $errors->first('lastname') }}</p> @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Class</label>
                            <input type="text" name="class" class="form-control">
                            @if ($errors->has('class')) <p style="color:red;">{{ $errors->first('class') }}</p> @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                            @if ($errors->has('profile_image')) <p style="color:red;">{{ $errors->first('profile_image') }}</p> @endif
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Register Student</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>