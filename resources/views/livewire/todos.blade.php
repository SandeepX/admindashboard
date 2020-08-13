<div>

	  <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div >
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>


    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="ion ion-clipboard mr-1"></i>
          To Do List
        </h3>
      </div>

      <div class="card-body">
        

        <div class="d-flex mb-4">
          <input type="text" name="addTodo" class="form-control form-control-lg " id="addTodo" placeholder="What needs to be done?" wire:model="title" wire:keydown.enter="addTodo" >
           <button class="btn btn-primary" wire:click="addTodo" type="submit">Add</button> 
         <!--  @if ($errors->has('title'))
              <div style="color:red;">{{ $errors->first('title') }}</div>
          @endif -->
        </div> 

        <ul class="list-group">
        @foreach($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <input type="checkbox"  wire:change="toggleTodo({{ $todo->id }})" class="mr-4" {{ $todo->completed ? 'checked':'' }}>
                <a
                    href="#"
                    class="{{ $todo->completed ? 'completed' : ''}}"
                    onclick="updateTodoPrompt('{{$todo->title}}') || event.stopImmediatePropagation()"
                    wire:click="updateTodo({{$todo->id}}, todoUpdated)"
                    >
                    <strong class="$todo->completed ? 'completed':''">{{ $todo->title }}</strong><span style="margin-left: 10px">{{ $todo->created_at | date:'Y/m/d'}} </span>
                </a>
              </div>
              <div>

                <button
                    class="btn btn-sm btn-danger"
                    onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                    wire:click="deleteTodo({{ $todo->id }})">
                &times;</button>

              </div>
            </li>

        @endforeach
       
    </ul>
 {{ $todos->links() }}
  <script>
        let todoUpdated = '';
        function updateTodoPrompt(title) {
          event.preventDefault();
          todoUpdated = '';
          const todo = prompt('Update Todo', title);
          if (todo === null || todo.trim() === '') {
            //console.log('cancel or empty');
            todoUpdated = '';
            return false;
          }
          todoUpdated = todo;
          return true;
        }
  </script>
      

      </div>
    </div>

    
</div>

