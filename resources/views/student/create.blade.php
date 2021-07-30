@extends('sidebar1');
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
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student LastName</label>
                            <input type="text" name="lastname" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Class</label>
                            <input type="text" name="class" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Student</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>