<?php
defined('_JEXEC') or die('Restricted access'); 
ini_set('arg_separator.output','&amp;');

class Menu {
	var $_output;

	function Menu($dataMenu) {
		$menutype = $dataMenu["menuname"];
		
		global $Itemid,$mainframe;
	
		$database      = & JFactory::getDBO();
    	$my 	       = & JFactory::getUser();
    	$cur_template  = $mainframe->getTemplate(); 
		$contentConfig = &JComponentHelper::getParams( 'com_content' );
		$noauth		   = $contentConfig->get('shownoauth');

		$active = 0;
	 	if($Itemid==99999999) {
	 		$Itemid = 1;
	 	}
	
		if ($noauth) {
	 	$database->setQuery("SELECT m.*, count(p.parent) as cnt" .
	  "\nFROM #__menu AS m" .
	  "\nLEFT JOIN #__menu AS p ON p.parent = m.id" .
	  "\nWHERE m.menutype='$menutype' AND m.published='1' AND m.parent=0" .
	  "\nGROUP BY m.id ORDER BY m.parent, m.ordering ");
		} else {
			$database->setQuery("SELECT m.*, sum(case when p.published=1 then 1 else 0 end) as cnt" .
			"\nFROM #__menu AS m" .
			"\nLEFT JOIN #__menu AS p ON p.parent = m.id" .
			"\nWHERE m.menutype='$menutype' AND m.published='1' AND m.access <= '$my->gid' AND m.parent=0" .
			"\nGROUP BY m.id ORDER BY m.parent, m.ordering ");
	  }
	
	 $rows = $database->loadObjectList( 'id' );
	 echo $database->getErrorMsg();
		
		if (count($rows)) {
			$pre = '<div class="menutop" id="tp-menu-container">
							<div id="tp-menu-nav">
							<ul><li style="display:none"><a></a></li>';
			
			$n = 0;
		 foreach ($rows as $row) {
		 	$n++;
				if ($noauth) {
			 	$database->setQuery("SELECT count(*) FROM #__menu AS m WHERE m.menutype='$menutype' AND m.published='1' AND m.parent='$row->id'");
				} else {
					$database->setQuery("SELECT count(*) FROM #__menu AS m WHERE m.menutype='$menutype' AND m.published='1' AND m.access <= '$my->gid' AND m.parent='$row->id'");
			  }
			 echo $database->getErrorMsg();
				
				switch ($row->type) {
					case 'separator':
						// do nothing
					  $row->link = "seperator";
					  break;
				  case 'url':
				  	if ( eregi( 'index.php\?', $row->link ) ) {
				    	if ( !eregi( 'Itemid=', $row->link ) ) {
				      	$row->link .= '&Itemid='. $row->id;
				      }
				    }
				    break;
					default:
				  	$row->link .= "&Itemid=$row->id";
						break;
		    }

		  	$row->link = str_replace( '&', '&amp;', $row->link );
		
		  	if (strcasecmp(substr($row->link,0,4),"http")) {
		  		if($row->link == 'index.php?option=com_content&amp;view=frontpage&amp;Itemid=1') {
		  			$row->link = JURI::base();
		  		} else {
			  		$row->link = JRoute::_($row->link);
			  	}
		  	} else {
		  		if($row->link == 'index.php?option=com_content&amp;view=frontpage&amp;Itemid=1') {
		  			$row->link = JURI::base();
		  		}
		  	}

		    if($database->loadResult() >= 1 ) {
					if($row->id == $Itemid) {
						$active = $n;
					}
					$pre .= '<li><a href="'.$row->link.'" rel="'.strtolower(str_replace(" ", "", $row->name)).'"><span>'.$row->name.'</span></a></li>
					';
				} else {
					$act = "";
					if($row->id == $Itemid) {
						$act = "active";
						$active = $n;
					}
					$pre .= '<li class="'.$act.'"><a href="'.$row->link.'" rel="relhide"><span>'.$row->name.'</span></a></li>
					';
				}	
			}

			$pre .= '</ul>
			';
			$pre .= '</div>
			';

		 	$pre .= '<div style="display: hide" id="relhide"></div>
		 	';

			$pre .= '<div id="tp-menu-inner">
			';
			
			$n = 0;
			 foreach ($rows as $row) {
			 	$n++;
					if ($noauth) {
				 	$database->setQuery("SELECT m.*, count(p.parent) as cnt" .
				  "\nFROM #__menu AS m" .
				  "\nLEFT JOIN #__menu AS p ON p.parent = m.id" .
				  "\nWHERE m.menutype='$menutype' AND m.published='1' AND m.parent='$row->id'" .
				  "\nGROUP BY m.id ORDER BY m.parent, m.ordering ");
					} else {
						$database->setQuery("SELECT m.*, sum(case when p.published=1 then 1 else 0 end) as cnt" .
						"\nFROM #__menu AS m" .
						"\nLEFT JOIN #__menu AS p ON p.parent = m.id" .
						"\nWHERE m.menutype='$menutype' AND m.published='1' AND m.access <= '$my->gid' AND m.parent='$row->id'" .
						"\nGROUP BY m.id ORDER BY m.parent, m.ordering ");
				  }
				
				 $rows2 = $database->loadObjectList( 'id' );
				 $number = 0;
				 echo $database->getErrorMsg();
					if (count($rows2)) {
					 	$number++;
						$pre .= '<div id="'.strtolower(str_replace(" ", "", $row->name)).'" class="tp-menu-inner-content" style="display:none"><ul>
						';
					 	foreach ($rows2 as $row2) {
							if($row2->id == $Itemid) {
								$active = $n;
							}
							switch ($row2->type) {
								case 'separator':
									// do nothing
								  $row2->link = "seperator";
								  break;
							  case 'url':
							  	if ( eregi( 'index.php\?', $row2->link ) ) {
							    	if ( !eregi( 'Itemid=', $row2->link ) ) {
							      	$row2->link .= '&Itemid='. $row2->id;
							      }
							    }
							    break;
								default:
							  	$row2->link .= "&Itemid=$row->id";
									break;
					    }

					  	$row2->link = str_replace( '&', '&amp;', $row2->link );
					
					  	if (strcasecmp(substr($row2->link,0,4),"http")) {
					  		if($row2->link == 'index.php?option=com_content&amp;view=frontpage&amp;Itemid=1') {
					  			$row2->link = JURI::base();
					  		} else {
						  		$row2->link = JRoute::_($row2->link);
						  	}
					  	} else {
					  		if($row2->link == 'index.php?option=com_content&amp;view=frontpage&amp;Itemid=1') {
					  			$row2->link = JURI::base();
					  		}
					  	}

					    $pre .= '<li><a href="'.$row2->link.'">'.$row2->name.'</a></li>
							';
					 }
						$pre .= "</ul></div>
						";
					}
			 }
		 
			$pre .= '</div>
			';
			
			$pre .= '</div>
			';
			
			$pre .= '<script type="text/javascript">
			';
			$pre .= 'dolphintabs.init("tp-menu-nav", '.$active.');
			';
			$pre .= '</script>
			';
		}
		$this->_output = $pre;
	}

 function display() {
 	return $this->_output;
 }
}

?>