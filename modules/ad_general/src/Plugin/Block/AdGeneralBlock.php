<?php
namespace Drupal\ad_general\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Entity\EntityManagerInterface;
use Drupal\node\Entity\Node;

/**
 * Provides a 'Ad_General' Block.
 *
 * @Block(
 *   id = "event_days",
 *   admin_label = @Translation("Event Days"),
 * )
 */
class AdGeneralBlock extends BlockBase implements BlockPluginInterface
{
  /**
   * {@inheritdoc}
   */
  public function build() {
    $node = \Drupal::routeMatch()->getParameter('node');
	if ($node) 
	{
		$nid = $node->id();
		$node2 = node_load($nid); //getting node

		//gettings start date and 
		$startStringDate = $node2->get('field_event_start_date')->getString(); //getting field_date
		$startArrayDate = explode("T", $startStringDate); //splitting string where T1 appears
		$startResult = $startArrayDate[0]." ".$startArrayDate[1]; //combining into string
		$start_date_timestamp = strtotime($startResult);
		$start = date('Y-m-d H:i:s',$start_date_timestamp); 
		$startDate = $this->convertDateFromTimezone($start,'UTC', 'Europe/Ljubljana','d-m-Y H:i:s');

		//gettings end date
		$endStringDate = $node2->get('field_event_end_date')->getString(); //getting field_date
		$endArrayDate = explode("T", $endStringDate); //splitting string where T1 appears
		$endResult = $endArrayDate[0]." ".$endArrayDate[1]; //combining into string
		$end_date_timestamp = strtotime($endResult);
		$end = date('Y-m-d H:i:s',$end_date_timestamp); 
		$endDate = $this->convertDateFromTimezone($end,'UTC', 'Europe/Ljubljana','d-m-Y H:i:s');

		
		$currentDate = date("d-m-Y H:i:s"); //getting current date


	    $d_start = new \DateTime($startDate);  //converting in DateTime
	    $d_current = new \DateTime($currentDate);  //converting in Datetime
	    $d_end = new \Datetime($endDate);  //converting in DateTime

	    $differenceBetweenCurrentDateAndStartDate = $d_current->diff($d_start); //getting Difference beteween start datetime and current datetime

	    $differenceBetweenCurrentDateAndEndDate =  $d_end->diff($d_current);


		$output = array();
		$output[]['#cache']['max-age'] = 0;
		$neki = $d_start < $currentDate;
		//var_dump($d_current < $d_start);
		//$output[] = [ '#markup' => $differenceBetweenCurrentDateAndStartDate->format('%h:%i:%s'). '<br>',];
		//$output[] = [ '#markup' => var_dump($d_start < $d_current) ,];

		if($d_end < $d_current){ //če je dni manj
			$output[] = [ '#markup' => 'The event has ended.',];
	  	}
		else if ($d_current >= $d_start && $d_end >= $d_current) { //če je event da enaki dan in če je v izvajanju
	  		$output[] = [ '#markup' => 'The event is in progress.',];
		}
		else if ($d_current < $d_start ) { //če je event da enaki dan in če je v izvajanju
	  		$output[] = [ '#markup' => 'Event will start in'.$differenceBetweenCurrentDateAndStartDate->format('%d days %h:%i:%s') ,];
		}
		/*else if ($interval->format('%a') > 0) { //če je dni več 
	  		$output[] = [ '#markup' => 'Days left to event start: '.$interval->format('%a').'.',];
		}*/
	  	return $output;
	}
  }  
  function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d days "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
    if ($interval->s) { $result .= $interval->format("%s seconds "); }
    return $result;
  }
  function convertDateFromTimezone($date,$timezone,$timezone_to,$format){
	$date = new \DateTime($date,new \DateTimeZone($timezone));
	$date->setTimezone( new \DateTimeZone($timezone_to) );
	return $date->format($format);
   }
}    