@extends('layout.lay')

@section('content')

    <section id="project">
        <img src="/{{$project->mainImg}}">

            <h1>{{$project->title}}</h1>
            {!! $project->text !!}

    </section>
    <main>
        <p></p>
        <a id="demo" target="_blank" href="{{$project->demoUrl}}">Demo</a>
        <div  id="slider" class="slider">
            @foreach($project->sliderImgUrl as $img)
            <div><img src="/{{$img}}" /></div>
            @endforeach
        </div>
    </main>
    <section id="about">
       <div class="project">
           {!! $project->secondText !!}

       </div>

    </section>
@endsection