<?php
App::uses ( 'AppModel', 'Model' );
App::uses ( 'Post', 'Model' );
class Analysis extends AppModel {
    private $__day_names = array (
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunsday" 
    );
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct ( $id, $table, $ds );
        $this->Post = ClassRegistry::init ( 'Post' );
    }
    public function statisticsByDayname() {
        $sql = "SELECT DAYNAME(posted) AS dayname, COUNT(*) AS count, ROUND(AVG(total_likes), 1) AS avg
                FROM t_posts
                WHERE is_delation_flg = 0 AND posted >= '2016-04-01'
                GROUP BY DAYNAME(posted)
                ORDER BY FIELD(DAYNAME(posted), 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY')";
        return $this->Post->query ( $sql );
    }
    public function statisticsByHour() {
        $sql = "SELECT HOUR(posted) AS hour, COUNT(*) AS count, ROUND(AVG(total_likes), 1) AS avg
                FROM t_posts
                WHERE is_delation_flg = 0 AND posted >= '2016-04-01'
                GROUP BY HOUR(posted)";
        return $this->Post->query ( $sql );
    }
}