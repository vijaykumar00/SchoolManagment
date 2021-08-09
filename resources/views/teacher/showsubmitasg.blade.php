@extends('layoutes.header')
@extends('layoutes.sidebar')
<table class="table table-dark table-striped" style="width:-webkit-fill-available;margin-left: 225px;margin-right: 32px; margin-top: 20px;">
    <thead>
        <tr>
            <th>Asgnment Name</th>
            <th>Submited By</th>
            <th>class</th>
            <th>Pdf</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($submitedAsg as $submit)
        <tr>
            <td>{{$submit->asgname}}</td>
            <td>{{$submit->firstname ." ".$submit->lastname}}</td>
            <td>{{$submit->class}}</td>
            <td>{{$submit->document}}</td>
            <td>{{$submit->grades}}</td>
            <td><a href="/grade/{{$submit->id}}"><button class="btn btn-success">Give Grade</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>