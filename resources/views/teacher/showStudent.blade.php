<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('sidebar');
<section class="page-content">
    <div class="student">
        <h2>All Students</h2>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Photo</th>
                    <th>class</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student as $user)
                <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><img src="{{asset('uploads/students/'.$user ->image)}}" class="img-circle" width="90" /></td>
                    <td>{{$user->class}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>