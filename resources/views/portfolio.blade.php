@extends('layout.lay')

@section('content')

    @foreach($projects as $project)
    <article class="portfolio">
        <img class="prev" src="{{$project->mainImg}}">

            <h1>{{$project->title}}</h1>
        {{$project->text}}
        <p class="go"><a class="go" href="{{route('project', ['id' => $project->id])}}"> </a></p>
    </article>
    @endforeach


    <div class="pagination">
        <p><a href="#"><<</a></p>
        <p><a href="#"><</a></p>
        <p><a href="#">5</a></p>
        <p id="active">6</p>
        <p><a href="#">7</a></p>
        <p><a href="#">></a></p>
        <p><a href="#">>></a></p>
    </div>

@endsection