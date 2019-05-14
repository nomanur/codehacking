@if (count($posts) === 0)
... html showing no articles found
@elseif (count($posts) >= 1)

    @foreach($posts as $post)
    			{{$post->title}}
    			<hr>

    			<img width="50" height="50" src="{{$post->photo ? $post->photo->file :  $post->photoPlaceholder()}}" alt="">
    			<hr>
    			{{$post->body}}
    			

    @endforeach
@endif