@extends('layoutes.header')
@extends('layoutes.sidebar1')
@foreach($asgnment as $asg)
@endforeach
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-top:10px;">
                <div class="card-header">
                    <h4 style="color: brown;"> Upload Asginment</h4>
                </div>
                <div class="card-body">
                    <form action="/Submit-asg" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Asgnment Name</label>
                            <select class="select form-control" name="Asgname" aria-label=".form-select-lg example">
                                <option selected>Name</option>
                                @foreach($asgnment as $asg)
                                <option value="{{$asg->id}}">{{$asg->asgname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Subject</label>
                            <select class="select form-control" name="subject" aria-label=".form-select-lg example">
                                <option selected>Subject</option>
                                @foreach($asgnment as $asg)
                                <option value="{{$asg->subject}}">{{$asg->subject}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Class</label>
                            <select class="select form-control" name="class" aria-label=".form-select-lg example">
                                <option selected>Class</option>
                                @foreach($asgnment as $asg)
                                <option value="{{$asg->class}}">{{$asg->class}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Upload Document</label>
                            <input type="file" name="document" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-Secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>