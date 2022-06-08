<?php
namespace Modules\Miscellaneous\Repository\Blog;

class BlogSlugRepository
{
    
    public function createSlug($value)
    {
        try{

            //remove all characters not in this list: underscore | letters | numbers | whitespace
             $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));
             //replace underscore and whitespace with a dash -
             $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);
             //remove whitespace
             return trim($value, '-');

        }catch(\exception $e){
            return $e->getMessage();
        }
    }
}