@extends('layoutes.header')
@extends('layoutes.sidebar')

@foreach($submitedAsg as $Asg)
<li style="margin-left: 300px;">{{$Asg->asgname}}</li>
<li>{{$Asg->class}}</li>
<li>{{$Asg->firstname}}
<li>
<li>{{$Asg->lastname}}
<li>
    @endforeach