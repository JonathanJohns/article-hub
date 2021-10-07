<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Includes -->
        <link href="{{asset('vendor/bootstrap-4/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .jumbotron{
                height: 100vh;
                background-image: url("/img/header.jpg");
                background-size: cover;

            }
        </style>
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Your Articles</a>
                        <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                       
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
        </div>
        <div class="jumbotron jumbotron-fluid ">
            <div class="container text-center">
                <div class="row align-items-center mt-4">
                    <div class="col-12 mt-5 text-white py-3 rounded" style="background: rgba(107, 107, 107, 0.95)">
                        <h1 class="display-2 font-weight-bold">Article Hub</h1>
                        <p class="font-weight-normal h2">A bunch of Articles Written by Strangers</p>
                        <hr class="my-4">
                            {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
                            <a class="btn btn-success btn-lg" href="#articles" role="button">Read Articles</a>
                            <a class="btn btn-primary btn-lg" href="{{route('articles.create')}}" role="button">Post An Article</a>
                    </div>
                </div>
              
            </div>
        </div>
        
        
            <div class="container pb-5" id="articles" >
                <div class="row pb-5">	
                    <div class="col-12 h3 text-center">
                        Latest Articles
                    </div>
                </div>
                <div class="row" id="app">
                    @if(count($articles) != 0)
                        @foreach($articles as $article)
                            <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-5">
                                <div class="card" style="">
                                    <img class="card-img-top" src="{{asset('img/blog.jpg')}}" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{$article->title}}</h5>
                                    <p class="card-text">{{$article->description}}</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}

                                    <div>
                                        <small class="text-gray"><em>- Written By {{$article->name}}</em></small>
                                    </div>
                                    <div>
                                        <small class="text-gray"><em>- on {{$article->created_at}}</em></small>
                                    </div>

                                    {{-- <span href="#" @click="toggleRate" id="rate" class="btn float-right  btn-link btn-sm">Rate Articles
                                    </span> --}}

                                    <form v-if="showRate" action="" id="rating" method="POST">
                                        @csrf
                                        <div class=" mb-3 mt-3">
                                          <label for="exampleInputEmail1 text-primary d-block">Rate this article from 1-5 (1 poor, 5 excellent)</label>
                                       
                                       
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="rate" required value="1">
                                                <label type="radio" class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="rate" required value="2">
                                                <label type="radio" class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="rate" required value="3">
                                                <label type="radio" class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="rate" required value="4">
                                                <label type="radio" class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="rate" required value="5">
                                                <label type="radio" class="form-check-label">5</label>
                                            </div>
                                        </div>
                                        
                
                
                                        <div class="row">
                                            
                
                                                <div class="col-12 ">
                                                    <button type="submit" class="float-right btn-sm btn btn-primary"> Submit</button>
                                                </div>
                                                <div class="col-12">
                                                    
                                                </div>
                                            </div>
                                      </form>
                                    
                                    
                                    </div>
                                </div>
                            </div>

                            
                        @endforeach
                            <div class="col-12 h5 text-center mt-5">
                               Enjoying the content? 
                            </div>
                            @auth
                            <div class="col-12 h5 text-center mt-5">
                                <a class="btn btn-primary btn-sm" href="{{ url('/home') }}">View Your Articles</a>
                                <a class="btn btn-success btn-sm" href="{{ url('/articles/create') }}">Write An Article</a>
                            </div>
                            
                            @else
                               <div class="col-12 h3 text-center">
                                <a class="btn btn-primary btn-sm mb-2" href="{{url('/login')}}" role="button">Login and write an article</a>
                                <hr>
                                <a class="btn btn-success btn-sm" href="{{url('/register')}}" role="button">Not a Member? Register and start writing</a>
                            </div>
                            @endauth
                            
                        @else 

                        <div class="col-12 h3 text-center">
                            No Articles Available Yet
                        </div>
                        <div class="col-12 h3 text-center">
                            <a class="btn btn-primary btn" href="{{route('articles.create')}}" role="button">Write An Article</a>
                        </div>

                    @endif


                </div>
            </div>
        


        <script src="{{asset('vendor/bootstrap-4/js/bootstrap.min.js')}}" rel="stylesheet"></script>
        <script src="{{asset('js/vue.js')}}" rel="stylesheet"></script>
        <script src="{{asset('js/axios.js')}}" rel="stylesheet"></script>

        <script>

            const Rate = new Vue({
                el: '#app',
                data: {
                    showRate: false,
                },
                methods: {
                    toggleRate() {
                        this.showRate = !this.showRate;
                    }
                }
            })
        </script>
    </body>
</html>
