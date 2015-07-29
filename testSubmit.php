<?php 

class TestSubmit
{
    private $postArray;
    public function __construct()
    {
        $this->extractPostVars();
        $this->verifyToken();
    }

    private function verifyToken()
    {
        $uid = $_SESSION['uid'];
        $checkHash = base64_encode(hash("SHA512", $uid));
        if ($checkHash === $this->postArray['__token']) {
            unset($this->postArray["__token"]);
            return true;
        } else {
            throw new Exception("Bad form data in the request", 555);
            
        }
    }

    private function extractPostVars()
    {
        $this->postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    }

    public function process()
    {
        print_r($this->postArray);
    }

}
session_start();
$submit = new TestSubmit();
$submit->process();