<?php

class myUser extends sfGuardSecurityUser
{
    public static function getUserId($username){
        /*$username = getUser()->getGuardUser()->getUsername();*/
        $q = Doctrine_Query::create()->select("id")
            ->from("sfGuardUser gu")
            ->where("gu.username like '$username'");
        $r = $q->fetchOne();
        return $r["id"];
    }
}
