@extends('layoutes.header')
@include('layoutes.sidebar')
<div class="container">
    <table class="table table-dark table-striped" style="margin-left: 150px; margin-top: 18px; margin-right:18px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asgnment as $asg)
            <tr>
                <td>{{$asg->asgname}}</td>
                <td><a href="edit/{{$asg->id}}"><button class="btn btn-success">edit</button></a></td>
                <td><a href="/delete/{{$asg->id}}"><button onclick="alert('Are you sure you want to delete')" class="btn btn-danger">Delete</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!--  -->