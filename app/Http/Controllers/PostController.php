<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post; // Прописываем модель к которой булем обращаться (так как мы ее перенесли)



class PostController extends Controller
{
    public function index(){
    	//$posts = Post::All(); // Получить все данные из таблицы
	    //$posts = Post::latest("id")->get(); // просто вернем все элементы в сортировке аск
//	    $posts = Post::latest("published_at")->get(); // просто вернем все элементы в сортировке аск по полю published_at


	    echo Carbon::now();
	    $posts = Post::latest("published_at")
		    ->where("published_at",'<=', Carbon::now()) // выборка где дата
		                                        // публикации младше чем сейчас, Карбон используется для работы с датой
			                                    // его нужно подключить
		    ->get();

	   // dd($posts); // Ларавельная функция дамп и дай
    	return view('post.index',['posts'=>$posts]); // Передаем полученные данные из контролера в представление
    }
}
