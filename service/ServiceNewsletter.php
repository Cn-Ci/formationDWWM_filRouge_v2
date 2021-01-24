<?php 
include_once('../dao/NewsletterDAO.php');
include_once("../exception/UserException.php");
include_once('../exception/ServiceException.php');


ini_set('display_errors',1); 
error_reporting(E_ALL);

Class ServiceNewsletter {

    static function addEmailNewsletter(Newsletter $newsletter) 
    {
        try { 
            $emailNewsletter = new NewsletterDAO;
            $rs = $emailNewsletter->addEmailNewsletter($newsletter);
            return $rs;
        } 
        catch (NewsletterException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    } 

}