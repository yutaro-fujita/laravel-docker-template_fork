<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo; //
    public function __construct(Todo $todo)
    {
        $this->todo = $todo; //todoというプロパティにインスタンスを代入
    }
    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }
    public function create()
    {
        return view('todo.create');
    }
    public function store(Request $request)
    {
        $inputs = $request->all();
        
        $this->todo->fill($inputs); //今回取得した全key=>valueを埋める
        $this->todo->save(); //オブジェクトの状態をDBに保存(INSERT文)
        return redirect()->route('todo.index');
    }
    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }
}
