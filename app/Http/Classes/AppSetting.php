<?php

namespace App\Http\Classes;

class AppSetting
{
   private string|false $settingsFile;
   private mixed  $settings;


   function __construct()
   {
       $this->settingsFile = $this->getFile();
       $this->settings     = json_decode($this->settingsFile,true);
   }

    /**
     * @param string|null $key
     * @return mixed|null
     */
   public function get(?string $key = null ) : mixed
   {
       if ( $key )
           return $this->settings[$key] ?? null;
       else
           return $this->settings;

   }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value) : mixed // set a new key with the given value
    {
        $this->settings[$key] = $value;
        $this->saveFile();
        return $this->settings;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function remove(string $key) : mixed // remove the entry with the given key ( return null if the key not exist else return the entire array)
    {
        if (array_key_exists($key , $this->settings)) {
            unset($this->settings[$key]);
            $this->saveFile();
            return $this->settings;
        }
        return null;
    }

    /**
     * @return false|string
     */
    private function getFile() : bool|string // get the file content ( string )
    {
        $filePath = public_path('settings.json');
        return file_get_contents( $filePath );
    }

    /**
     * @return void
     */
    private function saveFile() : void // decode the file content and overwrite the old content
    {
        $filePath    = public_path('settings.json');
        $fileContent = json_encode( $this->settings );
        file_put_contents( $filePath , $fileContent );
    }
}
