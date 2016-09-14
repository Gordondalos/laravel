##Создание контроллера
    php artisan make:controller + Название контролера

##Созадие и работа с роутерами
**Например:** 
    Route::get('/', ['as'=> 'posts', 'uses'=>'PostController@index']);

##Создание модели, миграций
    php artisan make:model + Название модели -m

Чтобы создались миграции нужно добвать ключ -m

Далее мо миграции заполняем поля.
например так

    public function up()
        {
            Schema::create('posts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('slug')->unique(); // это заголовок на латинице чтобы в урл впихнуть
                $table->text('excerpt');
                $table->text('content');
                $table->timestamp('published_at');
                $table->boolean('published')->default(false);
                $table->timestamps();
            });
        }
    
    
Далее выполняем команду для заполнения бд

    php artisan migrate
    
## Запускаем тесты бд
Для этого реализовали класс тестирования, добавили его,
в главную функцию ран, и выполнили команду

    php artisan db:seed

Это добавит тестовые данные в указанную таблицу бд

##Передадим полученные данные из контролера в представление

    class PostController extends Controller
    {
        public function index(){
        
        	$posts = Post::All(); // Получить все данные из таблицы
        	
    	    dd($posts); // Ларавельная функция дамп и дай
    	    
        	return view('post.index',['posts'=>$posts]); // Передаем полученные данные из контролера в представление
        }
    }
