 <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        
                        <form action="/search" method="POST" role="search">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        </form>


                            {!! Form::open(['method'=>'POST', 'action'=>'HomeController@search']) !!}

                        
                            <div class="form-group">
                                {!! Form::label('search', 'search') !!}
                                {!! Form::text('search', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">

                                {!! Form::submit('search', ['class'=>'btn btn-primary']) !!}
                                
                            </div>
                        {!! Form::close() !!}
                        
                    </div>
                    <!-- /.input-group -->
                </div>
             
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                @if($categories)
                    @foreach($categories as $category)
                                <li><a href="#">{{$category->name}}</a>
                    @endforeach
                @endif
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>