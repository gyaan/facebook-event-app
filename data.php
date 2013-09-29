<?php
function getEventDetails($eventId=null){
$event_array=array(11 => array(
                      'name'=>'gyaneshwar bday',
                           'start_time'=>'2012-11-15',
                           'end_time'=>'2012-11-19',
                           'description'=>'Let Enjoy the cricket',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET'),

                    2 => array(
                     'name'=>'Shaan poul',
                           'start_time'=>'2012-11-22',
                           'end_time'=>'2012-11-23',
                           'description'=>'come on let enjoy the party with shann poul',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET'),
                    3 => array(
                     'name'=>'Just Testing ignore this',
                           'start_time'=>'2012-11-25',
                           'end_time'=>'2012-11-26',
                           'description'=>'come on let enjoy the party with shann poul',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET'),
                   4 => array(
                     'name'=>'Just Testing ignore this',
                           'start_time'=>'2012-12-01',
                           'end_time'=>'2012-12-02',
                           'description'=>'come we will to lots of fun',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET'),
                    5 => array(
                     'name'=>'Just Testing ignore this',
                           'start_time'=>'2012-12-11',
                           'end_time'=>'2012-12-12',
                           'description'=>'come we will to lots of fun',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET'),
                    6 => array(
                     'name'=>'Just Testing ignore this',
                           'start_time'=>'2012-12-05',
                           'end_time'=>'2012-12-06',
                           'description'=>'come we will to lots of fun',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET'),
                    7 => array(
                     'name'=>'Just Testing ignore this',
                           'start_time'=>'2012-12-01',
                           'end_time'=>'2012-12-02',
                           'description'=>'come we will to lots of fun',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET'),
				  8=>array(
				    'name'=>'Just Testing ignore this',
                           'start_time'=>'2013-07-01',
                           'end_time'=>'2013-07-02',
                           'description'=>'come we will to lots of fun',
                           'location'=>'Bangalore',
                           'location_id'=>'106377336067638',
                           'privacy_type'=>'SECRET')
				  		   
);
if($eventId==null)
return $event_array;
else
return $event_array[$eventId];
}
?>