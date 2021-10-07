@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                @if (session('message'))
                
                <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{session('message')}} !</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <div class="col-12">
                    <a href="{{route('articles.create')}}" class="float-right btn btn-success">Write an Article</a>
                </div>
                <div class="col-12 h2 mb-3">
                    Your Articles
                    

                </div>
            </div>

            @if (count($articles) != 0)

            @foreach($articles as $article)
            <div class="card mb-4">
                <div class="card-header h5">{{$article->title}}</div>

                <div class="card-body">
                   
                <div class="row">
                    <div class="col-12 ">
                        {{$article->description}}
                    </div>

                    <div class="col-12 mt-3">
                        <form action="{{route('articles.destroy', $article->id)}}" method="POST">
                            @csrf  
                            @method('DELETE')
                         <button type="submit" class="float-right btn btn-danger btn-sm"> Delete</button>
                        </form>
                         <a href="{{route('articles.edit', ['id' => $article->id])}}" class=" btn btn-primary  mr-3 btn-sm"> Edit</a>
                    </div>
                    <div class="col-12">
                         
                    </div>
                </div>
                </div>
            </div>
            @endforeach

            @else 

                        <div class="col-12 px-0">
                            You have no articles Available yet
                        </div>
                       

            @endif
        </div>
    </div>
</div>
@endsection
