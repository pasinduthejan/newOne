<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    function getTodos(){
        return Todo::all();
    }


    function insertTodo(Request $request){

        $todo = new Todo();

        $todo->name = $request->name;
        $todo->compleated = $request->compleated;

        $todo->save();

    }

    function updateData(Request $request,$id){

       /* $todo = new Todo();
        $todo->id = $request->id;
        $todo->name = $request->name;
        $todo->compleated = $request->compleated;*/
        
        /*
        $compleated = $request->input('compleated');
        $id = $request->id;
        DB::update('update todos set compleated = ? where id = ?',[$compleated,$id]);

        /*DB::table('todos')
          ->where('id', $id)
          ->update($todo);*/
    
        //return $request;

        $todo = Todo::find($id);
        $compleated = !($todo->compleated);
        DB::update('update todos set compleated = ? where id = ?',[$compleated,$id]);
       
        return response()->json(['name'=>'name']);
            
    }

    public function deleteData(Request $request, $id){
        if(DB::table('todos')->where('id', $id)->delete()){
            return $request;
        }else{
            return 'cant find data..!';
        }
        
    }
}
