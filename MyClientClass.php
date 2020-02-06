<?php

require_once 'vendor/autoload.php';

class MyClientClass {

    private $baseUri = "https://jsonplaceholder.typicode.com/";
    private $client;

    public function __construct() {
        $this->client = new GuzzleHttp\Client(['base_uri' => $this->baseUri]);
    }

    public function printUsersList() {
            $this->headerHtml();

            $datos = $this->getUsers();

            foreach($datos as $user) {
			    echo $user['id']."<br>";
                echo $user['name']."<br>";
				echo $user['email']."<br>";
			    echo $user['phone']."<br><br>";

            }

            $this->footerHtml();
    }


	    public function printPhotosList() {
            $this->headerHtml();

            $datos = $this->getPhotos();

            foreach($datos as $photos) {

			    echo $photos ['id']."<br>";
                echo $photos['title']."<br>";
				echo $photos['url']."<br>";
			    echo $photos['thumbnailUrl']."<br><br>";

            }

            $this->footerHtml();
    }


    private function getUsers() {
        $response = $this->client->request('GET', 'users');
        $body = $response->getBody();
        return json_decode($body,true);
    }

	private function getPhotos() {
        $response = $this->client->request('GET', 'photos');
        $body = $response->getBody();
        return json_decode($body,true);
    }


    private function headerHtml() {
            echo '
            <!DOCTYPE html>
                    <html xmlns="http://www.w3.org/1999/xhtml" lang="es">
                    <head>

                      <meta charset="utf-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">

                            <title>PHP: Clases y objetos - Manual </title>
                    <head/><body>';
    }

    private function footerHtml() {
            echo '<body/><html/>';
    }
}