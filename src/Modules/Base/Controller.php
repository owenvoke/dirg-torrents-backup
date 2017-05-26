<?php

namespace pxgamer\DirgTorrents\Modules\Base;

use pxgamer\DirgTorrents\Modules\Torrents;
use pxgamer\DirgTorrents\Routing;

class Controller extends Routing\Base
{
    public function index()
    {
        $data = new \stdClass();

        $data->total_torrents = Torrents\Model::total();
        $data->years = range(date('Y'), date('Y', strtotime('-5 Years')));

        $this->smarty->display(
            'index.tpl',
            [
                'data' => $data
            ]
        );
    }

    public function error_not_found()
    {
        $error = new \Error('Page not found.', 404);

        $this->smarty->display(
            'error.tpl',
            [
                'error' => $error
            ]
        );
    }
}