
<!-- Modal -->
<div class="modal fade" id="modal_delete_{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('todo.destroy','ghm')}}" method="post">
                @csrf
                {{method_field('Delete')}}
                <div class="modal-body">
                    <input type="hidden" value="{{$todo->id}}" name="id">
                    <p>you will delete task are you sure</p>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Submit Task" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
