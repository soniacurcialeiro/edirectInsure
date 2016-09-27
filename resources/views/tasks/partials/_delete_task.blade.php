<a class="delete-btn js-on-click" data-on-click="deleteAction" href="#"
   title="Delete Task"
   data-delete-url="{{ url('/tasks/' . $task->id . '/delete' ) }}"
   data-delete-source="todoList"
   data-delete-id="{{ $task->id }}">
   <img src="/imgs/trash.png" style="width: 20px">
</a>
