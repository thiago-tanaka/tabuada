@extends('layouts.app')

@section('content')
<div class="container h-100 p-0">
    @if (request('division'))
        <division></division>
    @else
        <example-component user-id="{{auth()->id()}}"></example-component>
    @endif
</div>
@endsection