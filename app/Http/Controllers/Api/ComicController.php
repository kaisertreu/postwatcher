<?php

namespace App\Http\Controllers\Api;

use App\Comic;
use App\Http\Controllers\Controller;
use App\Website;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->search;
            $column = $request->sort_column ?? 'Title';
            $order_key = $request->sort_order ?? 'ASC';
            $status_array = $request->filter_status ?? []; //https://laracasts.com/discuss/channels/laravel/problem-with-wherein-when-the-variable-is-null?page=1&replyId=402605
            $url_array = $request->filter_urls ?? [];
            $rating = $request->filter_rating;


            $data['comics'] = Comic::with('link') // search with() tbh idk wtf is this lmao
                ->where('user_id', auth()->user()->id)
                ->where('title', 'LIKE', '%' . $query . '%')
                ->whereIn('reading_status', $status_array)
                ->whereIn('url_id', $url_array)
                ->where('rating', '<=', $rating)
                ->orderBy($column, $order_key)
                ->paginate(10);

            $data['comics']->setCollection($data['comics']->transform(function ($row, $key) {
                $color = '';

                if ($row->reading_status === 'Reading') $color = "primary";
                else if ($row->reading_status === 'Stacked') $color = "dark";
                else if ($row->reading_status === 'Completed') $color = "success";
                else if ($row->reading_status === 'Plan To Read') $color = "secondary";
                else if ($row->reading_status === 'On Hold') $color = "warning";
                else $color = "danger";

                $row['status_color'] = $color;
                $row['url_link'] = $row->link->url . $row->slug;
                $row['web_name'] = explode(".", $row->link->url)[0];

                unset($row->user_id);
                unset($row->url_id);
                unset($row->slug);
                unset($row->link);
                unset($row->created_at);
                unset($row->updated_at);
                unset($row->deleted_at);
                // $row['creation_date'] = date('g:i a • M d, Y', strtotime($row->created_at));
                // $row['last_updated'] = date('g:i a • M d, Y', strtotime($row->updated_at));

                return $row;
            }));

            return response()->json($data);
        }
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Update by incrementing a specified column of the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function increment_chapter($id)
    {
        $comic = Comic::findOrFail($id);

        $comic->increment('chapter');

        return $comic;
    }

    /**
     * Update by decrementing a specified column of the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decrement_chapter($id)
    {
        $comic = Comic::findOrFail($id);

        $comic->decrement('chapter');

        return $comic;
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
