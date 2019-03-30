@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
                @foreach($posts as $key => $post)
                <div class="{{$key%2!=0?'bg-success card text-light text-monospace':''}} mb-4 col-md-4">
                    <div class="card-body">
                        <h5 class="m-0">{{$post->title}}</h5>
                        <hr>
                        {{substr($post->post, 0, 250) . " ... read more "}}
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</main>
@endsection
