@extends('layouts.blog-home')

@section('content')


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">  
                    <small></small>
                </h1>
                @if($posts)
                    @foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">{{$post->user->name}}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                
                
                {!!strip_tags($post->body, '<p>')!!}
                    <br>

               <!--  @if (!preg_match("/<img\s[^<>]*><\/p>/i", $post->body))
               
                   <p>{!!$post->body!!}</p>
               @else
                   <p>{!!preg_replace("/<img[^>]+\>/i", " ", $post->body);!!}</p>
               @endif -->

             
                <a class="btn btn-primary" href="/post/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>     
                    @endforeach   
                @endif
                <!-- Pager -->
                {{$posts->render()}}

            </div>

@include('includes.front_sidebar')
        <!-- /.row -->

        <hr>
@endsection

