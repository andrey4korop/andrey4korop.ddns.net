@extends('layout.lay')

@section('content')

    @foreach($projects as $project)
    <article class="portfolio">
        <img class="prev" src="{{$project->mainImg}}">

            <h1>{{$project->title}}</h1>
        {!!  $project->text !!}
        <p class="go"><a class="go" href="{{route('project', ['id' => $project->id])}}"> </a></p>
    </article>
    @endforeach



        {{ $projects->links() }}



@endsection