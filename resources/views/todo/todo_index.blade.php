<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/todo.css')}}">


</head>
<body>


<div class="page-content page-container" id="page-content">

    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <div class="alert alert-success" id="alertsave" style="display:none;"> done</div>
                        <div id="error_return" class="container">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li >{{$error}} </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endif
                        </div>
                        <h4 class="card-title">Todo list</h4>
                        <div class="row mb-5">
                            <div class="col-md-8">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_one">
                                        Add Task
                                    </button>
                            </div>
                            <div class="col-md-4">
                            <button class="btn btn-success rounded-pill"><span class="rounded-circle">{{count_complete()}}</span> Complete</button>
                            <button class="btn btn-danger rounded-pill"><span>{{count_remaining()}}</span> Remaining</button>
                            </div>
                        </div>
                        <div class="list-wrapper">
                            <ul class="d-flex flex-column-reverse todo-list">
                                @if(isset($todos))
                                @foreach($todos as $todo)
                           {{--     <li class="{{$todo->status == 1 ? "completed" : ""}}">
                                    <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox">
                                            {{$todo->title}}<i class="input-helper"></i></label> </div>
                                    <span class="btn btn-danger">{{$todo->date}}</span>
                                </li>
--}}

                                    <table class="table">
                                        </thead>
                                        <tbody>
                                        <tr class="row-cols-md-3">
                                            <td class="{{$todo->status == 1 ? "completed" : ""}}"><input  class="ajax checkbox" ajax_id="{{$todo->id}}" type="checkbox"
                                                    {{$todo->status == 1 ? "checked" : ""}}
                                                    {{$todo->status == 1 ? "disabled" : ""}}>
                                          {{--  <td class="{{$todo->status == 1 ? "completed" : ""}}"><input  class="ajax checkbox" ajax_id="{{$todo->id}}" type="checkbox"
                                                    {{$todo->status == 1 ? "checked" : ""}}
                                                    {{$todo->status == 1 ? "disabled" : ""}}>--}}
                                                {{$todo->title}}
                                            </td>
                                            <td><span class="btn btn-{{$todo->status == 1 ? "success" : "danger"}}"> {{$todo->date}} </span></td>
                                            <td >
                                                <button    {{$todo->status == 1 ? "disabled" : ""}} type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_edit_{{$todo->id}}">Edit</button>
                                                <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_delete_{{$todo->id}}">Delete</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        @include('todo.modal_add')
                                        @include('todo.modal_edit')
                                        @include('todo.modal_delete')
                                    </table>

                                    @endforeach
                                @endif

                                {{--
                                 <li >
                                  <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> For what reason would it be advisable for me to think. <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                              </li>
                          <li>
                                  <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> it be advisable for me to think about business content? <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                              </li>
                              <li>
                                  <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> Print Statements all <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                              </li>
                              <li class="completed">
                                  <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox" checked=""> Call Rampbo <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                              </li>
                              <li>
                                  <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox"> Print bills <i class="input-helper"></i></label> </div> <i class="remove mdi mdi-close-circle-outline"></i>
                              </li>--}}
                            </ul>
                            {{$todos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->



    </div>


{{--<script src="{{asset('js/todo.js')}}" ></script>--}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script>
    var err = document.getElementById('error_return');
    err.addEventListener('mouseover', function (e) {
      setTimeout(()=>e.target.style.display = "none",2000);
    });



    $(document).on('click','.ajax',function (e) {
        //e.preventDefault();
        var ajax_id = $(this).attr('ajax_id');
        //console.log(ajax_id);
        $.ajax({
            type: 'post',
            url: "{{route('check-status')}}",
            data: {
                '_token': "{{csrf_token()}}",
                'id': ajax_id  //$("input[name='id']").val()
            },
            success: function (data) {
                if (data.status == true)
                    $('#alertsave').show();
            },
            error: function (data) {

            }
        })
    })
</script>
</body>
</html>
