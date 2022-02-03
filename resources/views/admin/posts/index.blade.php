@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row justify-content-center">
         <h2 class="text-left">Ciao {{ $loggedUser->name}}! Ecco l'elenco dei post</h2>


         <table class="table my-3">
               <thead>
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titolo del post</th>
                  <th scope="col">Contenuto del post</th>
                  <th scope="col">Slug</th>
                  <th scope="col" colspan="3"></th>
               </tr>
               </thead>

               <tbody>

               @foreach ($posts as $post)
                  
                  <tr>
                     <th scope="row">{{ $post->id }}</th>
                     <td>{{ $post->title_post }}</td>
                     <td>{{ $post->content }}</td>
                     <td>{{ $post->slug }}</td>
                     <td>
                        <button type="button" class="btn btn-success">
                           Show
                        </button>
                     </td>
                     <td>
                        <button type="button" class="btn btn-warning">
                           Edit
                        </button>
                     </td>
                     <td>
                        <button type="button" class="btn btn-danger">
                           Delete
                        </button>
                     </td>
                  </tr>

               @endforeach
               
               </tbody>
            </table>
      </div>
</div>
@endsection

@section('title_page')
   Posts List
@endsection