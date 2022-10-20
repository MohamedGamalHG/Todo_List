<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Repository\TodoListRepositoryInterface;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    protected $todo;
    public function __construct(TodoListRepositoryInterface $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        return $this->todo->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        return $this->todo->store($request);
    }


    public function update(TodoRequest $request)
    {
        return $this->todo->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->todo->delete($request);
    }

    public function Check_Status(Request $request)
    {
        $todo = Todo::findOrFail($request->id);
        if($todo){
            $todo->update(['status' => 1]);
            return response()->json([
                'status'       => true,
                'msg'          => 'data complete',
                'id'           => $request->id
            ]);
        }else return response()->json([
            'status'       => false,
            'msg'          => 'data note saved',
        ]);
    }
}
