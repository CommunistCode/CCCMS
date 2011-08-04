<?php

require_once ($fullPath.'/classes/dbConn.class.php');

class listing {
	
	var $id;
	var $title;
	var $description;
	var $quantity;
	var $startPrice;
	var $postage;
	var $duration;

	function listing($data) {
		
		$this->id = (isset($data['listingID'])) ? $data['listingID'] : "";
		$this->title = (isset($data['listingTitle'])) ? $data['listingTitle'] : "";  
		$this->description = (isset($data['listingDescription'])) ? $data['listingDescription'] : "";
		$this->quantity = (isset($data['listingQuantity'])) ? $data['listingQuantity'] : "";
		$this->startPrice = (isset($data['listingStartPrice'])) ? $data['listingStartPrice'] : "";
		$this->postage = (isset($data['listingPostage'])) ? $data['listingPostage'] : "";
		$this->duration = (isset($data['listingDuration'])) ? $data['listingDuration'] : "";

	}
	
	public function update($data) {

		$db = new dbConn();

		$db->update("listings","listingTitle='".$data->getTitle()."'","listingID=".$data->getID(),0);
		$db->update("listings","listingDescription='".$data->getDescription()."'","listingID=".$data->getID(),0);
		$db->update("listings","listingQuantity='".$data->getQuantity()."'","listingID=".$data->getID(),0);
		$db->update("listings","listingStartPrice='".$data->getStartPrice()."'","listingID=".$data->getID(),0);
		$db->update("listings","listingPostage='".$data->getPostage()."'","listingID=".$data->getID(),0);
		$db->update("listings","listingDuration='".$data->getDuration()."'","listingID=".$data->getID(),0);

	}
	
	public function getID() {
		
		return $this->id;
	
	}

	public function getTitle() {

		return $this->title;

	}

	public function getDescription() {

		return $this->description;

	}

	public function getQuantity() {

		return $this->quantity;

	}

	public function getStartPrice() {

		return $this->startPrice;

	}

	public function getPostage() {

		return $this->postage;

	}

	public function getDuration() {

		return $this->duration;

	}

}

class runningListing extends listing {

	var $endDate;
	var $startDate;
	var $reservePrice;
	var $listingRunning;
	
	function runningListing($data) {
		
		parent::listing($data);

		$this->id = $data['runningListingID'];
		$this->startDate = (isset($data['startDate']) ? $data['startDate'] : "");
		$this->endDate = $data['endDate'];
		$this->listingRunning = $data['listingRunning'];

	}

	public function getTimeRemaining() {

		$listingTools = new listingTools();

		$timeNow = time();

		return $listingTools->calcTimeRemaining($timeNow, $this->endDate);

	}
	
  function getListingRunning() {

		return $this->listingRunning;

	}

	function getLowestBidAmount() {

		$minIncrement = round(($this->startPrice / 100 * 5) * 100);

		if ($minIncrement < 10) {

			$minIncrement = 10;

		}

		return $minIncrement/100;

	}

	function getHighestBid() {

		$db = new dbConn();

		$query=("SELECT bids.bidAmount,
										runningListings.listingStartPrice,
										members.username 
						 FROM bids, 
						 			members,
									runningListings 
						 WHERE (bids.listingID=".$this->id." AND 
						 			 bids.memberID = members.memberID) AND 
									 runningListings.runningListingID = ".$this->id."
						 ORDER BY bids.bidAmount DESC ;");

		$result = $db->mysqli->query($query);

		$row = $result->fetch_assoc();

		if ($result->num_rows < 2 ) {
		
			return 0;

		}

		else {

			$array['username'] = $row['username'];
			
			$row = $result->fetch_assoc();

			$array['currentPrice'] = $row['bidAmount'];

			return $array;

		}

	}

}

?>
