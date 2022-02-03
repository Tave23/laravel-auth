@extends('layouts.app')

@section('content')
<div class="container">
      <div class="justify-content-center">
         {{-- nome utente loggato --}}
         <h2>Ciao {{ Auth::user()->name }}!</h2>

         {{-- post id --}}
         <h4>Ecco il post numero: {{ $post->id }}!</h4>

         {{-- titolo del post --}}
         <h3 class="my-3">
            Titolo: {{ $post->title_post }}
         </h3>

         {{-- contenuto del post --}}
         <p class="my-3">
            Contenuto: {{$post->content}}
         </p>

         {{-- slug del titolo --}}
         <p class="my-3">
            Slug: {{$post->slug}}
         </p>

         {{-- data creazione post --}}
         <p class="my-3">
            Data creazione: {{$post->created_at}}
         </p>

         {{-- data ultima modifica post --}}
         <p class="my-3">
            Data ultima modifica: {{$post->updated_at}}
         </p>
         

         
      </div>
</div>
@endsection

@section('title_page')
   Show Post
@endsection