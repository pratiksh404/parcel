<?php

namespace App\Services;

class MakeCommandHelper
{
    /**
     *
     * Return stub gile location
     *
     *@return return_type
     *
     */
    protected function getBoilerplateStub(String $type)
    {
        return file_get_contents(app_path("Commands/stubs/$type.stub"));
    }

    /**
     *
     * Get currrent path
     *
     */
    protected function getCurrentPath()
    {
        return getcwd();
    }

    protected function inCurrentPath(String $path)
    {
        return getcwd() . '/' . $path;
    }

    /**
     *
     * Make Folder
     *
     *@return void
     *
     */
    protected function makeFolder($path, $folderName)
    {
        mkdir($this->inCurrentPath(
            $path . '/' . $folderName
        ), 0777, true);
    }
}
