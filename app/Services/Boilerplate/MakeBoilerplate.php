<?php

namespace App\Services\Boilerplate;

use App\services\MakeCommandHelper;

class MakeBoilerplate extends MakeCommandHelper
{
    protected $vendorName;

    protected $parcelName;

    protected $authorName;

    protected $authorEmail;

    protected $description;

    protected $console;

    public function __construct(String $vendorName, String $parcelName, String $authorName, String $authorEmail, String $description, $console)
    {
        $this->vendorName = $vendorName;
        $this->parcelName = $parcelName;
        $this->authorName = $authorName;
        $this->authorEmail = $authorEmail;
        $this->description = $description;
        $this->console = $console;
    }

    /**
     *
     * Make Laravel Parcel
     *
     *@return void
     *
     */
    public function makeParcel()
    {
        // Make Parcel Folder
        $parcelRootFolder = new MakeparcelRootFolder($this->parcelName, $this->console);

        // Make Folders inside parcel project
        $this->makeFoldersInsideParcel($parcelRootFolder);
    }

    /**
     *
     * Make parcel project root folder
     *
     *@return void
     *
     */
    protected function makeFoldersInsideParcel(MakeparcelRootFolder $parcelRootFolder)
    {
        // Make Config Folder
        $this->makeFolder($parcelRootFolder->getParcelFolderName, 'config');

        // Make Database Folder
        $this->makeFolder($parcelRootFolder->getParcelFolderName, 'database');
        // Make Folders Inside Database Folder
        $this->makeFolder($parcelRootFolder . '/database', 'migrations');
        $this->makeFolder($parcelRootFolder . '/database', 'seeders');

        // Make Resources Folder
        $this->makeFolder($parcelRootFolder->getParcelFolderName, 'resources');
        // Make Folder Inside Resources Folder
        $this->makeFolder($parcelRootFolder . '/resources', 'views');

        // Make Routes Folder
        $this->makeFolder($parcelRootFolder->getParcelFolderName, 'routes');

        // Make Src Folder
        $this->makeFolder($parcelRootFolder->getParcelFolderName, 'src');
        // Make Folder Inside Src Folder
        $this->makeFolder($parcelRootFolder . '/src', 'Contracts');
        $this->makeFolder($parcelRootFolder . '/src', 'Facades');
        $this->makeFolder($parcelRootFolder . '/src', 'Helper');
        $this->makeFolder($parcelRootFolder . '/src', 'Http');
        $this->makeFolder($parcelRootFolder . '/src', 'Models');
        $this->makeFolder($parcelRootFolder . '/src', 'Repositories');
        $this->makeFolder($parcelRootFolder . '/src', 'Services');
        $this->makeFolder($parcelRootFolder . '/src', 'Traits');

        // Make Test Folder
        $this->makeFolder($parcelRootFolder->getParcelFolderName, 'tests');
        // Make Folder Inside Test Folder
        $this->makeFolder($parcelRootFolder . '/tests', 'Feature');
        $this->makeFolder($parcelRootFolder . '/src', 'Unit');
    }

    /**
     *
     * Make Parcel config Resource
     *
     *@return void
     *
     */
    protected function makeConfigResource(MakeparcelRootFolder $parcelRootFolder)
    {
        //
    }
}
