<?php
use Flarum\Extend;
use Flarum\Foundation\Event\Validating;
use Flarum\Discussion\DiscussionValidator;
use Illuminate\Events\Dispatcher;

return function (Dispatcher $events) {
        $events->listen(Validating::class, function (Validating $event){
                if ($event->type instanceof DiscussionValidator) {
                        $rules = $event->validator->getRules();
                        foreach ($rules['title'] as $k => $v) {
                        if (strpos($v, 'min:') === 0) {
                                $rules['title'][$k] = 'min:1';
                        }
                }
                $event->validator->setRules($rules);
            }
        });
    };

