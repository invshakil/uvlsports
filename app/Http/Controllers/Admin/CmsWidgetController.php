<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CmsWidgetController extends Controller
{
    public function footer()
    {
        $data = array();
        $data['title'] = 'Manage CMS Footer Widget';
        return view('backend.dynamic.cms_widget.footer', $data);
    }

    public function saveFooterContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'footer_content' => 'required|min:30|max:250',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        Widget::setWidget('footer_content', $request->input('footer_content'));

        $notification = array(
            'message' => 'Footer Content Saved Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function saveFooterLinks(Request $request)
    {
        $total = count($request->input('name'));
        $links = [];
        for ($i = 0; $i < $total; $i++) {
            $name = $request->input('name')[$i];
            $url = $request->input('link')[$i];
            array_push($links, ['title' => $name, 'link' => $url]);
        }
        $links = json_encode( $links, JSON_UNESCAPED_UNICODE );

        Widget::setWidget('links', $links);
        $notification = array(
            'message' => 'Links Saved Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    public function aboutUs()
    {
        $data = array();
        $data['title'] = 'Manage About Us';
        return view('backend.dynamic.cms_widget.about_us', $data);
    }

    public function saveAboutUs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'about_us' => 'required|min:30',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        Widget::setWidget('about_us', saveTextEditorImage($request->input('about_us')));

        $notification = array(
            'message' => 'About Us Page Content Saved Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
