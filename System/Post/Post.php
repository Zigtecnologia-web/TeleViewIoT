<?php

namespace System\Post;

/*
|--------------------------------------------------------------------------
| Post
|--------------------------------------------------------------------------
| This class is used to Receive and return an object with data from post request,
| supporting both traditional form-data and JSON requests.
|
*/

class Post
{
    private $data;

    public function __construct()
    {
        # Call setPostData method
        $this->setPostData();
    }

    /*
     * This method is used to obtain and transform data from post request
     * in an object
     * @return Void
    */
    private function setPostData()
    {
        $data = [];

        // Tenta pegar dados do $_POST (formulários tradicionais)
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if ($key == '_token') {
                    continue;
                }
                $data[$key] = (empty($value) ? null : $value);
            }
        } else {
            // Tenta pegar dados do corpo da requisição (JSON)
            $jsonData = json_decode(file_get_contents("php://input"), true);
            if (is_array($jsonData)) {
                $data = $jsonData;
            }
        }

        $this->data = (object)$data;
    }

    /*
     * This method is used to return all data from post request
     * @return Object
    */
    public function data()
    {
        return $this->data;
    }

    /*
     * This method is used to return an object with data passed in array argument.
     * @return Object
    */
    public function only(array $data)
    {
        $filteredData = [];
        $internalData = (array)$this->data;

        foreach ($data as $value) {
            if (!array_key_exists($value, $internalData)) {
                echo "The ({$value}) value does not exist in Post Request";
            }

            $filteredData[$value] = $internalData[$value] ?? null;
        }

        return (object)$filteredData;
    }

    /*
     * This method is used to verify if has post request
     * @return Bool
    */
    public function hasPost()
    {
        return !empty((array)$this->data);
    }
}
