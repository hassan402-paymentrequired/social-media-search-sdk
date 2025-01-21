<?php

namespace Eaglewatch\Search;

class Facebook
{
    public function search($search)
    {
        return 'searching for ' . $search . ' on Facebook with the config ' . config('app.facebook.api_url');
    }
}
