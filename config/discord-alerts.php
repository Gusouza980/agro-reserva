<?php

return [
    /*
     * The webhook URLs that we'll use to send a message to Discord.
     */
    'webhook_urls' => [
        'default' => 'https://discord.com/api/webhooks/1177628859013795940/gk-boHOyZJVH8HPkZgBjLWBYWOaLLDB66dJM8SR7OCpQpLCADclhntQgqTHaVzx-gqeF',
        'cadastro' => 'https://discord.com/api/webhooks/1177628859013795940/gk-boHOyZJVH8HPkZgBjLWBYWOaLLDB66dJM8SR7OCpQpLCADclhntQgqTHaVzx-gqeF',
        'agrisk' => 'https://discord.com/api/webhooks/1177628935312388106/lvYmhLHXNHXNHah1hH6M-GYV_c4ZyoibLyR3QTGWx2CRYyhaUMCZx7A8afVq-YnEeeob'
    ],

    /*
     * This job will send the message to Discord. You can extend this
     * job to set timeouts, retries, etc...
     */
    'job' => Spatie\DiscordAlerts\Jobs\SendToDiscordChannelJob::class,
];
