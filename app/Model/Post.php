<?php
App::uses ( 'AppModel', 'Model' );
class Post extends AppModel {
    public $useTable = 't_posts';
    public $primaryKey = 'post_id';
}
