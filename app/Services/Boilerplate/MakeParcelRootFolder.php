<?php

namespace App\Services\Boilerplate;

use App\Services\MakeCommandHelper;

class MakeParcelRootFolder extends MakeCommandHelper
{
    protected $parcelName;

    protected $console;

    public function __construct($parcelName, $console)
    {
        $this->parcelName = $parcelName;
        $this->console = $console;

        $this->makeParcelRootFolder(); // Making Parcel Root Folder
    }

    /**
     *
     * Make Parcel Folder
     *
     *@return void
     *
     */
    protected function makeParcelRootFolder(): void
    {
        mkdir($this->inCurrentPath(
            $this->getParcelFolderName()
        ), 0777, true);

        $this->console->task("Creating parcel folder ... ", function () {
            return $this->parcelFolderExist();
        });
    }

    /**
     *
     * Make Parcel Name
     *
     *@return string
     *
     */
    protected function getParcelFolderName(): string
    {
        $parcelName = $this->parcelName;
        if (strpos($parcelName, ' ')) {
            $this->console->error("Parcel name contain\'s space which is not recommended.");
            if (!$this->console->confirm('Do you wish to continue? [y/n]', true)) {
                $parcelName = $this->console->ask("Package Name");
            }
        }
        return $this->validatedParcelFolder($parcelName);
    }

    /**
     *
     * Validate Parcel Name
     *
     *@return string
     *
     */
    private function validatedParcelFolder(String $parcelName): string
    {
        return strtolower(str_replace([' ', '-', '$', '<', '>', '&', '{', '}', '*', '\\', '/', ':' . ';', ',', "'", '"'], '_', $parcelName));
    }

    /**
     *
     * Check parcel folder existance
     *
     *@return bool
     *
     */
    protected function parcelFolderExist(): bool
    {
        return file_exists($this->inCurrentPath($this->getParcelFolderName()));
    }
}
