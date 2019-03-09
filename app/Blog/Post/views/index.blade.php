@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h5 class="m-0">{{$post->title}}</h5>
                        <hr>
                        {{substr($post->post, 0, 250) . " ... read more "}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection