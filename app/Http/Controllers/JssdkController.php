<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use EasyWeChat\OfficialAccount\Application;

class JssdkController extends Controller
{
    public function index()
    {
        $wechat_user = session('wechat.oauth_user');
        $app = new Application(['app_id' => env('WECHAT_APPID'), 'secret' => env('WECHAT_SECRET')]);

        $config = $app->jssdk->getConfigArray(
            array(
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'onMenuShareTimeline',
                'onMenuShareAppMessage'
            ), false
        );

        $config_json = json_encode($config);
        return view('signs.show', compact('config_json', 'wechat_user'));
    }
}


