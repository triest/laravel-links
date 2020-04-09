<?php

    namespace App\Http\Controllers;

    use App\Link;
    use Illuminate\Http\Request;

    class LinksController extends Controller
    {
        //
        public function index(Request $request)
        {
            return view('links.index');
        }

        public function store(Request $request)
        {

            $validatedData = $request->validate([
                    'link' => 'required|url',
            ]);
            $input_link = $request->link;

            $linkObject = new Link();
            $linkObject->original_short = $linkObject->generateLink();
            $linkObject->original_link = $input_link;
            $linkObject->save();

            $output_link = url('/') . '/' . $linkObject->original_short;

            return view('links.index')->with([
                    'original_link' => $input_link,
                    'original_short' => $output_link
            ]);
        }

        public function link($link)
        {
            $linkObject = Link::select(['id', 'original_link', 'original_short'])->where('original_short',
                    $link)->first();

            if ($linkObject != null) {
                if ($linkObject->original_link == null) {
                    abort(404);
                }
            } else {
                abort(404);
            }

            //    return redirect()->away($linkObject->original_link);
            return redirect($linkObject->original_link, 301);
        }
    }
