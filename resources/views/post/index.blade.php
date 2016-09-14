@extends('layouts.app')

@section('content')
   <h1 class="center-block text-center">Наш Блог</h1>

   @foreach($posts as $post)
      <article>
         <h2>{!! $post->title !!}</h2>
            <p>
               {!! $post->excerpt !!}
            </p>
            <p>
               published: {{ $post->published_at  }}
            </p>
      </article>
   @endforeach


@stop
