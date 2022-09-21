<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function PostByCategory( $slug )
    {

        $articles = [
            [
                'id' => '1',
                'title' => 'More Than 7,000 Guest Workers Attended Hari Raya Celebration',
                'slug' => 'test',
                'url' => 'https://beta.streamsoflife.sg/wp-content/uploads/2022/06/WhatsApp-Image-2022-06-06-at-4.44.17-PM-768x431.jpeg',
                'content' => 'On 3 May 2022, AGWO partnered with MOM to organise Eid prayers led by Imams, carnival games, sports, and other activities to celebrate Hari Raya Puasa with guest workers.'
            ],
            [
                'id' => '2',
                'title' => 'Pray for Ukraine — The Greatest Crisis of this Generation',
                'slug' => 'test2',
                'url' => 'https://beta.streamsoflife.sg/wp-content/uploads/2022/06/WhatsApp-Image-2022-06-06-at-4.44.17-PM-768x431.jpeg',
                'content' => 'The entire Ukrainian nation is suffering from an unprecedented crisis caused by the violent war. Join us by donating towards this worthy cause as we pray that Ukrainians continue to'
            ],
            [
                'id' => '3',
                'title' => 'AGWO Brought Christmas Cheer to More than 20,000 Guest Workers',
                'slug' => 'test3',
                'url' => 'https://beta.streamsoflife.sg/wp-content/uploads/2022/06/WhatsApp-Image-2022-06-06-at-4.44.17-PM-768x431.jpeg',
                'content' => 'In the spirit of Christmas, The Alliance of Guest Workers Outreach (AGWO)—a movement of Hope Initiative Alliance (HIA)—and various other partners and organisations organised eight carnivals for the guest workers'
            ],
            [
                'id' => '4',
                'title' => 'AGWO Celebrates Pongal Festival with the Guest Workers at Kranji',
                'slug' => 'test4',
                'url' => 'https://beta.streamsoflife.sg/wp-content/uploads/2022/06/WhatsApp-Image-2022-06-06-at-4.44.17-PM-768x431.jpeg',
                'content' => 'Over 500 guest workers from 70 dormitories came together at Kranji Recreation Centre on Sunday, 16 January from 2-9pm, celebrating the festivities of Pongal Festival, which is widely celebrated by'
            ]

        ];

        return Inertia::render( 'Articles/Category', [
            'catData' => ['articles' => $articles, 'category_name' => $slug]
         ] );
    }
}
