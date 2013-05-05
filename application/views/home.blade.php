@layout('templates.main')
@section('content')
	
 	@if (Session::has('success_message'))
 		<div class="span8">
        {{ Alert::success("Success!") }}
    	</div>
    @endif


    @foreach ($posts -> results as $post)
        <div class="span8">
            <h1>{{ $post->post_title }}</h1>
            <p>{{ $post->post_body }}</p>
            <span class="badge badge-success">Posted {{$post->updated_at}}</span>
         
			@if ( !Auth::guest() )
                <p>
                    {{ Form::open('blog/'.$post->id, 'DELETE')}}
                        {{ Form::submit('Delete', array('class' => 'btn-small')) }}
                    {{ Form::close() }}

                    {{ Form::open('blog/'.$post->id, 'GET')}}
                        {{ Form::submit('Edit', array('class' => 'btn-small')) }}
                    {{ Form::close() }}
                </p>
    		@endif
    		<hr />
		</div>
        
    @endforeach
@endsection

@section('pagination')
    	<div class="row">
    		<div class="span8">
	    		{{ $posts -> links(); }}
	   		 </div>
		</div>
@endsection