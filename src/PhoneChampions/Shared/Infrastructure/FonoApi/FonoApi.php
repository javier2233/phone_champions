<?php


namespace App\PhoneChampions\Shared\Infrastructure\FonoApi;


use App\PhoneChampions\Shared\Domain\DeviceInfo;

class FonoApi implements DeviceInfo
{
    static $apiUrlFono = "https://fonoapi.freshpixl.com/v1/";
    static $apiKeyFono = "c36b86b54e97c14ae91605342ea6fbe3bcf4261790d5c3f9";
    static $apiGetDevice = "getdevice";
    static $apiGetLast = "getlatest";

    public static function getInfoDevice(String $deviceName, String $brand = null): array
    {
        if($deviceName != ""){
            $url = self::$apiUrlFono . self::$apiGetDevice;
            $getInfo = array(
                'brand' => trim($brand),
                'device' => trim($deviceName),
                //'position' => $position,
                'token' => self::$apiKeyFono
            );
            $result = static::getResultData($url, $getInfo);
            if (isset($result->status)) {
                $innerException ="";
                throw new Exception($result->message . $innerException);
            }else {
                return $result;
            }
        }

        return array();
    }

    public static function getLastDevices(String $brand = null): array
    {
        $url = self::$apiUrlFono . self::$apiGetLast;
        $getInfo = array(
            'brand' => trim($brand),
            //'position' => $position,
            'token' => self::$apiKeyFono
        );
        $result = static::getResultData($url, $getInfo);
        if (isset($result->status)) {
            $innerException ="";
            throw new Exception($result->message . $innerException);
        }else {
            return $result;
        }

    }


    private function getResultData(String $url, Array $info){

        return json_decode(static::sendPostData($url, $info));
    }

    private function sendPostData($url, $post){

        try {

            $rUrl = null;

            if (isset($_SERVER['HTTP_HOST']) && $_SERVER['REQUEST_URI']) {
                $rUrl = "http".(!empty($_SERVER['HTTPS'])?"s":""). "://" .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            }

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_REFERER, $rUrl);
            $result = curl_exec($ch);

            if (FALSE === $result)
                throw new Exception(curl_error($ch), curl_errno($ch));

            curl_close($ch);
            return $result;

        } catch (Exception $e) {

            $result["status"] = $e->getCode();
            $result["message"] = "Curl Failed" ;
            $result["innerException"] = $e->getMessage();

            return json_encode($result);
        }
    }

    public function test()
    {
        return 10;
    }

}