<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Repository\TodoListRepositoryInterface;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    
    /* using Repository Desgin Pattern for the blow code */
    protected $todo;
    public function __construct(TodoListRepositoryInterface $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        return $this->todo->index();
    }

   
    public function store(TodoRequest $request)
    {
        return $this->todo->store($request);
    }


    public function update(TodoRequest $request)
    {
        return $this->todo->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->todo->delete($request);
    }
    
    public function Check_Status(Request $request)
    {
       return $this->todo->Check_Status($request);
    }
}
