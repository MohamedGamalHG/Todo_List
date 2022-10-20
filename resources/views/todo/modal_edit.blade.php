
<!-- Modal -->
<div class="modal fade" id="modal_edit_{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('todo.update','ghm')}}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <input type="hidden" value="{{$todo->id}}" name="id">
                    <input class="form-control mb-2" value="{{$todo->title}}" type="text" name="title" placeholder="write task Title" required>
                    <textarea class="form-control mb-2" type="text" name="note" placeholder="write task Note" required rows="7">{{$todo->notes}}</textarea>
                    <input class="form-control m-auto" value="{{$todo->date}}" type="date" name="date" required>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Submit Task" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
