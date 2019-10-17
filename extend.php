<?php
use Flarum\Extend;
use Flarum\Foundation\Event\Validating;
use Flarum\Discussion\DiscussionValidator;
use Illuminate\Events\Dispatcher;

return function (Dispatcher $events) {
        $events->listen(Validating::class, function (Validating $event){
            if ($event->type instanceof DiscussionValidator) {
                $event->validator->setRules([
                    'title' => [
                        'required',
                        'min:1',
                        'max:80'
                    ]
                ]);
            }
        });
    };
