<?php
class RestKezelo{
    private $httpVersion = "HTTP/1.1";

    public function sethttpFejlec($statuskod)
    {
        $statusUzenet = $this->sethttpstatusUzenet($statuskod);
        header($this->httpversion."".$statuskod."".$statusUzenet);
        header("Content-Type: Application/json");
    }

    public function gethttpStatusUzenet($statuskod)
    {
        $https = array(
            200=>'OK',
            400=>'Bad Request',
            404='Not found',
            500=>'Internal Server Error'
            return($httpsStatus[$statuskod]) ? $httpsStatus[$statuskod] : $httpsStatus[500];
        );
    }
}
?>