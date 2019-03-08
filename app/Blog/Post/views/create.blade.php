@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a post</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="" required="required" autofocus="autofocus"
                                                             class="form-control" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection