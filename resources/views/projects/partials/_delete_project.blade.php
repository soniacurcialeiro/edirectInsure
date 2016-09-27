<a class="delete-btn js-on-click" data-on-click="deleteAction" href="#"
   title="Delete Project"
   data-delete-url="{{ url('/projects/' . $project->id . '/delete' ) }}"
   data-delete-id="{{ $project->id }}"
   data-delete-source="project">
   <img src="/imgs/trash.png" style="width: 20px">
</a>
