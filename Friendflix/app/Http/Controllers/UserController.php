<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser(Request $request){
		$user = new User();
		
		$user-> name = $request->name;
		$user-> email = $request->email;
		$user-> password = $request->password;
		
		$user->save();
		
		return response()->json([$user]);
	}
	public function listUser(){
		$User = User::all();
		return response()->json($User);
		
	}
	public function showUser($id){
		
		$User = User::findOrFail($id);
		return response()->json([$User]);
	}
	public function updateUser(Request $request, $id){
		
		$User = User::find($id);
		
		if($User){
			if($request->name){
				$User->name = $request->name;
				}
			else if($request->email){
				$User->email = $request->email;
			}
			else if($request->password){
				$User->password = $request->password;
			}
			else{
				return response()->json(['insira o parâmetro a ser atualizado']);
			}
			$User->save();
			return response()->json([$User]);
			}
			else{
				return response()->json(['Esta user não existe']);
			}
		}
	
	public function deleteUser($id){
		
		User::destroy($id);
		return response()->json(['User deletado']);
	}
}
