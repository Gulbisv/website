<?php


class Subscription
{
    public static function getColumnSortUrl(string $column,string  $direction, ?string $search)
    {
        $searchParam = '';
        if ($search) {
            $searchParam = 'search=' . $search . '&';
        }
        return '?' . $searchParam . 'column=' . $column . '&order=' .  $direction ;
    }

    public static function getGroups(array $subscriptions)
    {
        $groups = [];
        foreach ($subscriptions as $subscription){
            $email =  $subscription['email'];
            $at = strpos($email,'@') + 1;
            $dot = strpos($email, '.') - $at;
            $domain = substr($email, $at, $dot);
            if (!in_array($domain,$groups)){
                $groups[]=$domain;
            }
        }
        return $groups;
    }
}