<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $news = new News;
        // $get = $news->all();
        // $where = $get->where();
        //

        // $get = News::all();
        // foreach($get as $item){
        //     echo $item['id'].' : '.$item->name."<br>";
        // }

        // $user = new User;
        // $user->name = 'anda';
        // $user->email = 'anda@email.com';
        // $user->password = 'password';
        // $user->save();

        // $role = new Role;
        // $role->name = 'show user';
        // $role->is_active = true;
        // $role->save();

        // $role = new Role;
        // $role->name = 'create user';
        // $role->is_active = true;
        // $role->save();

        // $role = new Role;
        // $role->name = 'update user';
        // $role->is_active = true;
        // $role->save();

        // $role = new Role;
        // $role->name = 'delete user';
        // $role->is_active = true;
        // $role->save();

        // echo "A";

        $news = News::all();
        foreach($news as $n){
            echo $n->title.' -> '.$n->admin->name.'<br>';
        }
        
        // $news = new News;
        // $news->title = 'baru 11';
        // $news->content = 'ini content baru 11';
        // $news->user_id = 3;
        // $news->save();
        

        // $user = User::find(2);      # select * from users where id = 2
        
        
        // echo $user->news()->get();  # left join news on users.id = 
        
        // $users = User::all();

        // foreach($users as $user){
        //     echo $user->name;
        //     echo "<br>";
        //     foreach($user->berita()->get() as $news){
        //         echo "news :".$news->title; echo "<br>";
        //     }
        //     echo '<hr>';
        // }


        // $user_news = $user->news()->get();
        // foreach($user_news as $news){
        //     echo $user->name.' : '.$news->title."<br>";
        // }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
