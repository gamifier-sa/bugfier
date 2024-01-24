<?php

namespace App\Http\Classes;

class AppSetting
{
   private string|false $settingsFile;

    /**
     * @var mixed
     */
   private mixed  $settings;


   function __construct()
   {
       $this->settingsFile = $this->getFile();
       $this->settings = is_string($this->settingsFile) ? json_decode($this->settingsFile, true) : [];
   }

    /**
     * @param string|null $key
     * @return array|mixed|null
     */
   public function get(?string $key = null ) : mixed
   {
       return is_array($this->settings) && $key ? $this->settings[$key] ?? null : $this->settings;
   }

    /**
     * @param string $key
     * @param mixed $value
     * @return array|mixed
     */
    public function set(string $key, mixed $value): mixed
    {
        if (is_array($this->settings)) {
            $this->settings[$key] = $value;
            $this->saveFile();
        }
        return $this->settings;
    }


    /**
     * @param string $key
     * @return mixed|null
     */
    public function remove(string $key) : mixed
    {
        if (is_array($this->settings) && array_key_exists($key, $this->settings)) {
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
