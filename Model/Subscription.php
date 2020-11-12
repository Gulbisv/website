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
        if ($search){
            $searchParam = 'search=' . $search . '&';
        }
        return '?' . $searchParam . 'column=' . $column . '&order=' .  $direction ;



}



    //properties(atspoguļos datub fieldus(id,epasts,cr)publiskiem),
    //funkciju log, padod, ko vēlos, epasts vai id,
    //save
    //construct, kur padot datus, ka dati aizpilda properties - arrays data
}