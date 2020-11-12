<?php


class Subscription
{
    public $id;
    public $email;
    public $created_at;

    public function __construct()
    {

    }

    public static function getColumnSortUrl(string $column,string  $direction, ?string $search)
    {
        $searchParam = '';
        if ($search) {
            $searchParam = 'search=' . $search . '&';
        }
        return '?' . $searchParam . 'column=' . $column . '&order=' .  $direction ;
    }
}