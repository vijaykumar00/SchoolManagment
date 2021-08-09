@extends('layoutes.header')
@extends('layoutes.sidebar1');
<section class="page-content">
    <div class="student">
        <h2>Classmates</h2>
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