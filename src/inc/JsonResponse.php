<?php


class JsonResponse
{
    private $jsonresult;

    function __construct()
    {
        $this->jsonresult = array('error'=> null, 'sucess' => false);
    }

    function addAttribute(string $attributnom, $attributvaleur){
        $res = array($attributnom => $attributvaleur);
        array_push($res);
    }

    function addError($error){
        $this->jsonresult['error'] = $error;
        $this->jsonresult['sucess'] = false;
    }

    function addSucess(){
        $this->jsonresult['error'] = null;
        $this->jsonresult['sucess'] = true;
    }

    function getJson(){
        return json_encode($this->jsonresult);
    }

}