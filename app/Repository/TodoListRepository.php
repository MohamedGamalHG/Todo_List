<?php

namespace App\Repository;

use App\Models\Todo;

class TodoListRepository implements TodoListRepositoryInterface
{

    public function index()
    {
        $todos = Todo::paginate(6);
       return view('todo.todo_index',compact('todos'));
    }

    public function store($request)
    {
        try {

               $todo = new Todo();
               $todo->title = $request->title;
               $todo->notes = $request->note;
               $todo->date = $request->date;
               $todo->status = 0;
               $todo->save();
               return redirect()->route('todo.index');
       }catch (\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function update($request)
    {
        $todo = Todo::findOrFail($request->id);
        try{
            $todo->update([
                'title'     => $request->title,
                'notes'     => $request->note,
                'date'      => $request->date,
                'status'      => 0
            ]);
            return redirect()->route('todo.index');
        }catch (\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function delete($request)
    {
        $todo = Todo::findOrFail($request->id);
        $todo->delete($request->id);
        return redirect()->route('todo.index');

    }


}
