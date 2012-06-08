<?php

class myUser extends sfGuardSecurityUser
{
    /*public static function getUserId(){
        $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
        //$username
        $q = Doctrine_Query::create()->select("id")
            ->from("sfGuardUser gu")
            ->where("gu.username like '$username'");
        $r = $q->fetchOne();
        return $r["id"];
    }*/
}
