<?php

use App\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'url' => 'reaperscans.com/series/', //1
            ],
            [
                'url' => 'bato.to/series/', //2
            ],
            [
                'url' => 'asurascans.com/comics/', //3
            ],
            [
                'url' => 'flamescans.org/series/', //4
            ],
            [
                'url' => 'luminousscans.com/series/', //5
            ],
            [
                'url' => 'leviatanscans.com/hym/', //6
            ],
            [
                'url' => 'comicdom.org/manga/', //7
            ],
            [
                'url' => 'alpha-scans.org/manga/', //8
            ],
            [
                'url' => 'reset-scans.com/manga/', //9
            ],
            [
                'url' => 'gourmetscans.net/project/', //10
            ],
            [
                'url' => 'rackusreader.org/manga/', //11
            ],
            [
                'url' => 'setsuscans.com/manga/', //12
            ],
            [
                'url' => 'zeroscans.com/comics/', //13
            ],
            [
                'url' => 'readm.org/manga/', //14
            ],
            [
                'url' => 'mangarockteam.com/manga/', //15
            ],
            [
                'url' => 'mangabob.com/manga/', //16
            ],
            [
                'url' => 'manhuafast.com/manga/', //17
            ],
            [
                'url' => 'manganelo.com/manga/', //18
            ],
            [
                'url' => 'manganato.com/manga-', //19
            ],
        ];

        foreach ($links as $link) {
            Website::create($link);
        }
    }
}
