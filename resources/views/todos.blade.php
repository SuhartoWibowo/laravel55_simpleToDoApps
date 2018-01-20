    @extends('layout')


    @section('content')
        
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="/create/todo" method="post">
                    <input type="text" class="form-control input-lg" name="todo" placeholder="Create a new todo">
                    {{ csrf_field()}} 
                </form>  
            </div>        
        </div>
        <hr>

        @foreach($todos as $todo)
        <div class="row">
        <div class="col-md-5 text-left">
            @if(!$todo->completed)
            {{ $todo->todo }} 
            @else
            <del>{{ $todo->todo }} </del>
            @endif
        </div>
        <div class="col-md-1 text-left"><a href="{{ route('todo.delete',['id'=>$todo->id]) }}" class="btn btn-danger btn-xs">x</a></div>
        <div class="col-md-4 text-left">
             @if(!$todo->completed)
             <a href="{{ route('todo.completed',['id'=>$todo->id]) }}" class="btn btn-success btn-xs">Mark as completed</a>

             @else
             <mark>Completed</mark>
             @endif
        </div>
        <div class="col-md-2 text-left">
            <a href="{{ route('todo.update',['id'=>$todo->id]) }}" class="btn btn-info btn-xs">update</a>
        </div>
        
        </div>
        
        <hr>
        @endforeach
        


    @stop