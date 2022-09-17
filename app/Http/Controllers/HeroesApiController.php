<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroesApiController extends Controller
{
    public function index(){
		return Hero::all();
	}
	public function getHero($id){
		return Hero::findOrFail($id);
	}
	public function create() {
		request()->validate([
			'name'=>"required"
		]);
		return Hero::create([
			'name'=> request('name')
		]);
	}
	public function update($id){
		request()->validate([
			'name'=>"required"
		]);
		$hero = Hero::findOrFail($id);
		$success = $hero->update([
			'name'=> request('name')
		]);
		return ['success' => $success];
	}

	public function delete($id){
		$hero = Hero::findOrFail($id);
		$success = $hero->delete();
		return ['success' => $success];
	}
}
