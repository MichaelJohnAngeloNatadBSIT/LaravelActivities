@extends('layouts.master')
@section('title', 'Post Page')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Post Page</h1>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset($img) }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $title }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $author }}</h6>
                  <p class="card-text">{{ $description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection