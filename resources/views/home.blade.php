@extends('layouts.app')

@section('content')
<div class="container h-100 p-0">
<example-component user-id="{{auth()->id()}}"></example-component>
</div>
@endsection