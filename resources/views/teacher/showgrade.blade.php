@extends('layoutes.header')
@extends('layoutes.sidebar')


<form action="/gradeiven/{{$id}}" method="POST">
    @csrf
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="grade" style="margin-left: 300px;margin-top:10px;width:500px">
        <option selected>Give Grade</option>
        <option value="O">O</option>
        <option value="A+">A+</option>
        <option value="A">A</option>
        <option value="B+">B+</option>
        <option value="B">B</option>
        <option value="C+">C+</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
    </select>
    <button class="btn btn-success" type="submit" style="margin-left: 300px;">Submit</button>
</form>