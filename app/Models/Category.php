<?php


namespace App\models;
use app\models\News;

class Category
{
    const CATEGORIES=[
        ['id'=>'1',
            'slug'=>'sport',
            'title'=>'Новость о спотре',
            'text'=>'Лучшая новость о спотре',
        ],
        ['id'=>'2',
            'slug'=>'programming',
            'title'=>'Новость о программировании',
            'text'=>'Лучшая новость о программирвоании',

        ],
        ['id'=>'3',
            'slug'=>'games',
            'title'=>'новость о компьютерных играх',
            'text'=>'Лучшая новость компьютерной игре',
        ],

        ['id'=>'4',
            'slug'=>'city',
            'title'=>'новость города',
            'text'=>'Лучшая новость города',
        ],
    ];

    public static function getCategories(){

        return self::CATEGORIES;

    }

    public static function getCategoryBySlug($slug){



        foreach (self::getCategories() as $category){
            if($category['slug'] == $slug){
                return $category;
            }
        }
        return null;
    }
}
