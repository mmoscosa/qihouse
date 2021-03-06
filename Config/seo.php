<?php   
    $config = array(
        'Seo' => array(
            'approverEmail' => 'admin@qihouse.mx',
            'replyEmail' => 'noreply@qihouse.mx',
            'emailConfig' => 'default', //config of your email, if false will use default CakeEmail()
            'parentDomain' => 'http://www.qihouse.mx',
            'aggressive' => true, //if false, log affenders for later review instead of autobanning
            'triggerCount' => 2,
            'timeBetweenTriggers' => 60 * 60 * 24, //seconds
            'honeyPot' => array('admin' => false, 'plugin' => 'seo', 'controller' => 'seo_blacklists', 'action' => 'honeypot'),
            'log' => true,
            'cacheEngine' => true, // optionally cache things to save on DB requests - eg: 'default'
            'searchTerms' => true, //turn on term finding
            'levenshtein' => array(
                'active' => false,
                'threshold' => 5, //-1 to ALWAYS find the closest match
                'cost_add' => 1, //cost to add a character, higher the amount the less you can add to find a match
                'cost_change' => 1, //cost to change a character, higher the amount the less you can change to find a match
                'cost_delete' => 1, //cost to delete a character, higher the ammount the less you can delete to find a match 
                'source' => '/sitemap.xml' //URL to list of urls in a sitemap
            ),
            'abTesting' => array(
                'category' => 'ABTest', //Category for your ABTesting in Google Analytics
                'scope' => 3, //Scope for your ABTesting in Google Analytics
                'slot' => 4, //Slot for your ABTesting in Google Analytics
                'legacy' => false, //Uses Legacy verion of Google Analytics JS code pageTracker._setCustomVar(...)
                'session' => true, //will use sessions to store tests for users who've already seen them.
                'redmine' => false, //or the full URL if your redmine http://www.redmine-qihouse.mx/issues/
            )
        )
    );
