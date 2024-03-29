@extends('layouts.app')

@section('content')
<div class="container h-100 p-0">
    @if (request('division'))
        <division></division>
    @elseif(request('division2'))
        <division-with-ramaining></division-with-ramaining>
    @else
        <example-component></example-component>
    @endif
</div>
@endsection