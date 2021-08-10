@extends('layoutes.header')
@extends('layoutes.sidebar1')
<form action="/datepicker" method="POST">
    @csrf
    <div class="row input-daterange" style="margin-left: 235px; margin-top:12px;">
        <div class="col-md-4">
            <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
        </div>
        <div class="col-md-4">
            <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
        </div>
        <div class="col-md-4">
            <button type="submit" name="filter" id="filter" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>
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
        @foreach($submitedAsg as $submit)
        <tr>
            <td>{{$submit->asgname}}</td>
            <td>{{$submit->firstname ." ".$submit->lastname}}</td>
            <td>{{$submit->class}}</td>
            <td>{{$submit->document}}</td>
            <td>{{$submit->grades}}</td>
        </tr>
        @endforeach
    </tbody>
</table>