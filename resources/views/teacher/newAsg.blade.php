@extends('layoutes.header')
@extends('layoutes.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-top:10px;">
                <div class="card-header">
                    <h4>Asginment Name</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('createAsg') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Asgnment Name</label>
                            <input type="text" name="Asgname" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Subject</label>
                            <select class="select form-control" name="subject" aria-label=".form-select-lg example">
                                <option selected>Subject</option>
                                <option value="1">Math</option>
                                <option value="2">Science</option>
                                <option value="3">Computer</option>
                                <option value="4">Art</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Class</label>
                            <select class="select form-control" name="class" aria-label=".form-select-lg example">
                                <option selected>Class</option>
                                <option value="1">9</option>
                                <option value="2">10</option>
                                <option value="3">+1</option>
                                <option value="4">+2</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Add Assignment</button>
                        </div>
                    </form>
                    <div class="form-group mb-3">
                        <a href="editAsg"><button class="btn btn-success">Edit Assignment</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>