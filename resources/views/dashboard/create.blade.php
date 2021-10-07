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
                    New Article
                    

                </div>
                @if ($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger  text-capitalize">
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
                {{-- <div class="card-header h5">Dashboard</div> --}}

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> --}}
                
                <div class="card-body">
                    <form action="{{route('articles.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                       
                         
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Description</label>
                          <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder=""d></textarea>
                        
                        </div>


                        <div class="row">
                            

                                <div class="col-12 mt-3">
                                    <button type="submit" class="float-right btn btn-danger"> Create Article</button>
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
