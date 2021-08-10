@extends('layoutes.header')
@extends('layoutes.sidebar1')
<table class="table table-dark table-striped" style="width:-webkit-fill-available;margin-left: 225px;margin-right: 32px; margin-top: 20px;">
    <thead>
        <tr>
            <th>Asgnment Name</th>
            <th>Submited By</th>
            <th>class</th>
            <th>Pdf</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($daterange as $key=>$submit)
        <tr>

            <td>{{$submitedAsg[$key]->asgname}}</>
            <td>{{$submit->asgname}}</td>
            <td>{{$submit->firstname ." ".$submit->lastname}}</td>
            <td>{{$submit->class}}</td>
            <td>{{$submit->document}}</td>
            <td>{{$submit->grades}}</td>
        </tr>
        @endforeach
    </tbody>
</table>