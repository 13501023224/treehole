<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


    Route::post("sign","users_controller@sign")->name("sign");
    Route::post("login","users_controller@login")->name("login");
    Route::post("publish_tree_hole","messages_controller@publish_tree_hole")->name("publish_tree_hole");
    Route::get("find_treehole_by_userid","messages_controller@find_treehole_by_userid")->name("find_treehole_by_userid");
    Route::get("find_all_tree_hole","messages_controller@find_all_tree_hole")->name("find_all_tree_hole");
    Route::post("like_plus","messages_controller@like_plus")->name("like_plus");
    Route::post("delete_hole_by_id","messages_controller@delete_hole_by_id")->name("delete_hole_by_id");





