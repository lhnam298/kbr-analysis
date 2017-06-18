<?php
App::uses ( 'AppController', 'Controller' );
class AnalysisController extends AppController {
    public $uses = array (
        'Analysis',
        'Post'
    );

    public function index() {
    }

    public function statisticsByDayname() {
        $query_result = $this->Analysis->statisticsByDayname ();
        $dayname = Set::extract ( $query_result, '{n}.0.dayname' );
        $count = Set::extract ( $query_result, '{n}.0.count' );
        $sum = array();
        $sum[0] = $count[0];
        for ($i=1; $i<count($count); $i++) {
        	$sum[$i] = $sum[$i-1] + $count[$i];
        }
        $avg = Set::extract ( $query_result, '{n}.0.avg' );

        $this->set ( 'label', $dayname );
        $this->set ( 'count', $count );
        $this->set ( 'avg', $avg );
        $this->set ( 'sum', $sum );
    }

    public function statisticsByHour() {
        $query_result = $this->Analysis->statisticsByHour ();
        $hour = Set::extract ( $query_result, '{n}.0.hour' );
        $count = Set::extract ( $query_result, '{n}.0.count' );
        $sum = array();
        $sum[0] = $count[0];
        for ($i=1; $i<count($count); $i++) {
        	$sum[$i] = $sum[$i-1] + $count[$i];
        }
        $avg = Set::extract ( $query_result, '{n}.0.avg' );

        foreach ( $hour as $key => $val ) {
            $hour [$key] = $val . 'h~' . ($val + 1) . 'h';
        }

        $this->set ( 'label', $hour );
        $this->set ( 'count', $count );
        $this->set ( 'avg', $avg );
        $this->set ( 'sum', $sum );
    }
}
