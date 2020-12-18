<?php


namespace App\models;

use Storage;


class News
{
//    const news = [
//        ['id' => '1',
//            'category_id' => '1',
//            'image'=>'',
//            'is_private' => false,
//            'title' => 'Первая новость',
//            'text' => 'Главный тренер «Барселоны» Роналд Куман прокомментировал победу над «Ференцварошем» (3:0) в матче 5-го тура группового раунда Лиги чемпионов.
//
//— Мы показали отличный футбол в первой части матча. Хорошо давили на их защиту, прекрасно контролировали матч.
//В последнее время улучшаем некоторые вещи, особенно игру с мячом. Мы более эффективны, чем были в начале. В атаке много конкуренции. Должны совершенствоваться в обороне.
//Тяжелые времена у «Реала» помогает? Наше настроение не должно зависеть ни от Мадрида, ни от «Севильи», ни от «Атлетико». Должны выиграть все матчи до конца года, чтобы продолжить претендовать на чемпионство. Что бы ни делал «Реал», это не наша проблема, — сказал Куман.
//«Барселона» в заключительном туре группового этапа Лиги чемпионов дома сыграет с «Ювентусом». Матч запланирован на 8 декабря.',
//        ],
//        ['id' => '2',
//            'category_id' => '1',
//            'image'=>'',
//            'is_private' => false,
//            'title' => 'Вторая новость',
//            'text' => 'Карантин, вызванный пандемией COVID-19, закрыл многих из нас по домам. И пока кто-то смотрел сериалы и играл в видеоигры, участник исследовательской группы Google Project Zero Ян Бир изучал iOS и обнаружил интересный эксплоит в операционной системе.
//Уязвимость была найдена в Apple Wireless Direct Link (AWDL), сообщается в официальном блоге Project Zero. Это разработанный внутри компании сетевой протокол, благодаря которому работают AirDrop и Sidecar.
//Разработчик, нашедший баг, заявил, что ошибка повреждения памяти в AWDL даёт злоумышленникам доступ к данным, хранящимся непосредственно на устройстве жертвы. Причём что самое важное, доступ можно получить удалённо. Из-за этого взлом может быть осуществлён максимально тихо и незаметно.'
//        ],
//        ['id' => '3',
//            'category_id' => '2',
//            'image'=>'',
//            'is_private' => false,
//            'title' => 'Третья новость',
//            'text' => '1 декабря в половине восьмого утра на пульт регионального МЧС поступило сообщение о ДТП на 23-м километре автодороги «Жиздра-Людиново». На трассе автомобиль «Форд» съехал в кювет и опрокинулся.
//
//Как сообщает пресс-служба ГУ МЧС России по Калужской области,  аналогичная авария произошла в первый день зимы в половине четвертого дня с автомобилем «Рено Логан». Транспортное средство опрокинулось в кювет в черте города Людиново  на автодороге «Брянск -Людиново -Киров».
//
//Подробнее: https://pressa40.ru/v-zhizdrinskom-rayone-i-lyudinovo-ugodili-v-kyuvet-legkovushki/',
//        ],
//
//        ['id' => '4',
//            'category_id' => '2',
//            'image'=>'',
//            'is_private' => true,
//            'title' => 'Четвертая новость',
//            'text' => 'Лучшая четвертая новость',
//        ],
//    ];

    public static function getNews()
    {

        return self::readNews();
    }

    public static function getNewsByCategoryId($category_id)
    {

        $news = [];

        foreach (self::getNews() as $category) {
            if ($category['category_id'] == $category_id) {

                $news[] = $category;


            }

        }

        return $news;
    }


    public static function getNewsById($id)
    {

        $news = [];

        foreach (self::getNews() as $item) {
            if ($item['id'] == $id) {

                $news[] = $item;


            }

        }

        return $news;
    }

    public static function getNewsByCategorySlug($slug)
    {
        $news = [];


        $category = Category::getCategoryBySlug($slug);

        if (!empty($category['id'])) {
            $news = self::getNewsByCategoryId($category['id']);

        }

        return $news;


    }

    public static function saveNews($news)
    {

        Storage::put('news.json', json_encode($news));

    }

    public static function readNews()
    {

        return json_decode(Storage::get('news.json'), true);

    }

    public static function getLastId()
    {
        $id = 1;

        foreach (self::getNews() as $item) {
            if ($item['id'] > $id) {
                $id = $item['id'];
            }
        }
        return $id;
    }

    public static function addNews(array $array)
    {

        $array['id'] = self::getLastId() + 1;

        if (empty($array['is_private'])) {
            $array['is_private'] = false;
        } else {
            $array['is_private'] = true;
        }


        if (!isset($array['image'])) {
            $array['image'] = "";
        }


        $news = self::getNews();

        $news[] = $array;

        self::saveNews($news);

    }

    public static function deleteNews($id)
    {
        $news = self::getNews();
        $output = [];

        foreach ($news as $item)

            if ($item['id'] != $id) {

                $output[] = $item;
            }

        self::saveNews($output);

        return redirect('admin.news.edit');
    }


}
