@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('articles.index')}}" class="float-right btn btn-success"> My Articles</a>
                </div>
                <div class="col-12 h2 mb-3">
                    Edit Article
                    

                </div>
                @if ($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger text-capitalize">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            </div>
            <div class="card">
              
                
                <div class="card-body">
                    <form action="{{route('articles.update', $article->id)}}" method="POST">
                        @csrf  
                        @method('PUT')
  
                        <div class="form-group mb-3">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" value="{{$article->title}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
                         
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Description</label>
                          <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="" value="{{$article->description}}" required>{{$article->description}}</textarea>
                          
                        </div>


                        <div class="row">
                            

                                <div class="col-12 mt-3">
                                    <button type="submit" class="float-right btn btn-danger"> Save Edited Article</button>
                                </div>
                                <div class="col-12">
                                    
                                </div>
                            </div>
                      </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
