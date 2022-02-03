@extends('layouts.app')

@section('content')
<div class="container">
      <div class="justify-content-center">
         {{-- nome utente loggato --}}
         <h2>Ciao {{ Auth::user()->name }}, crea un nuovo post.</h2>

         {{-- per salvarlo fa aggiunta l'action (a store) con il metodo post e il @csrf --}}
         <form action="{{ route('admin.posts.store') }}" class="mt-5" method="POST">
            @csrf
            {{-- @method('POST') --}}

            <div class="mb-3">
              <label for="title_post" class="form-label">Titolo Post</label>
              <input type="text" name="title_post" class="form-control" id="title_post"
              placeholder="Inserisci il titolo...">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Contenuto del Post</label>
              <textarea type="text" name="content" class="form-control" id="content" 
              placeholder="Inserisci il contenuto del post..." style="height: 200px"></textarea>
            </div>

            {{-- bottoni salva e reset --}}
            <button type="submit" class="btn btn-success">Salva Post</button>
            <button type="reset" class="btn btn-danger">Reset Post</button>
          </form>
         
      </div>
</div>
@endsection

{{-- titolo scheda pagina --}}
@section('title_page')
   Create Post
@endsection