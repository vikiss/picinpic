@extends('layouts.app')
@section('content')
<ul>
            
            @foreach ($projects as $project) 
  <li>
<div>{{ $project->title }}</div>
<div>{{ $project->url }}</div>
<div>{{ $project->description }}</div>
<img src="{{ $project->image }}" />
</li>
@endforeach
</ul>
@endsection
