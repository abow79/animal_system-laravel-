<?php

namespace App\Http\Controllers;

use App\Models\animal;                                  //引入對應的模型文件
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()			//新增
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)	//新增資源(因為POST請求對應到的是Store方法)
    {
    $animal = Animal::create($request->all());		//all=已陣列的方式取得所有輸入的資料,這邊的create是Model的create方式
	$animal = $animal->refresh();				//再一次查尋資料庫回傳完整的欄位資料
	return response($animal, Response::HTTP_CREATED);	//第一個參數是變數animal(實體物件資料)包含在HTTP協定的內容中第二個參數是狀態碼
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)    //這邊的request使用者輸入的表單資料，＄animal則是要修改的動物資料
    {
          $animal->update($request->all());                     //更新資源的方法,all方法以陣列的方式取得資料
          return response($animal,Response::HTTP_OK);          //回傳動物資料,並給予200HTTP狀態碼（ok） 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(animal $animal)		            //刪除
    {
        $animal->delete();                                  //使用Model的delete方法來刪除
        return response(null, Response::HTTP_NO_CONTENT);   //代碼204(沒有內容)
    }
}
