<?php

class LHTMWPP_Widget extends WP_Widget
{
    public function __construct()
    {
        $my_widget = [
            'classname' => 'LHTMWPP_Widget',
            'description' => 'by this widget you will practice how to make widget',
        ];
        parent::__construct(
            'LHTMWPP_Widget',
            'Learn How To Make Wordpress Plugin - Widget',
            $my_widget
        );
    }

    public function widget($args, $instance)
    {
        echo "HELLO it's my Widget";
    }
}
