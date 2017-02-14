@extends('layout.lay')
@section('content')
    <section>
        <h1>Label</h1>
        <p>Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Deleniti, quasi!</p>

        <img class="but" src="img/buttonbottom.png" height="44" width="44"/>
    </section>
    <main>
        <h1>Portfolio</h1>
        <p>Lorem ipsum dolor sit amet.</p>
        <ul class="category">
            <li><a hreh="" class="active" rel="all">ALL</a></li>
            @foreach($categorys as $category)
            <li><a hreh="" rel="{{$category->id}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
        <ul class="item">
            @foreach($projects as $project)
            <li rel="{{$project->category->id}}">
                <img src="{{$project->mainImg}}" width="275" alt="">
                <a href="{{route('project', ['id' => $project->id ])}}" class="active animated pulse">
                 {{$project->title}}
                </a>
            </li>
            @endforeach

        </ul>
    </main>
    <section id="about">
        <h1>Contact</h1>
        <h3>Lorem ipsum dolor sit amet.</h3>
        <div id="form">
            <form action="">
               <div class="wit">
                <input type="text" placeholder="You name">
                <input type="email" placeholder="You email">

                <textarea placeholder="You message"></textarea>
                <input type="submit">
               </div>
            </form>
            <div class="info">
                <h4>infotmation</h4>
                <p class="geo">Lorem ipsum dolor sit amet.</p>
                <p class="tel">+444 123 45 78</p>
                <p class="fax">+444 123 45 78</p>
                <p class="mail">email</p>
            </div>
        </div>
    </section>
@endsection