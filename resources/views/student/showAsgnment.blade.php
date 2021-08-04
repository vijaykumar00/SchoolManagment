@extends('sidebar1')
<div class="container">
    <table class="table table-dark table-striped" style="margin-left: 150px; margin-top: 18px; margin-right:18px; width:-webkit-fill-available">
        <thead>
            <tr>
                <th>Name</th>
                <th>Given By</th>
                <th>Subject</th>
                <th>What to Do</th>
                <th>class</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asgnment as $asg)
            <tr>
                <td>{{$asg->asgname}}</td>
                <td>{{$asg->name}}</td>
                <td>{{$asg->subject}}</td>
                <td>{{$asg->description}}</td>
                <td>{{$asg->class}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>