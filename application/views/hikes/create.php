<?php
//application/views/news/create.php

$this->load->view($this->config->item('theme') . 'header');
/*

    copy & paste your db table fields from adminer into the file you're working in.
    
    You can copy/paste from it to make your work easier!

    HikeID	int(10) unsigned Auto Increment	
    UserID	int(10) unsigned NULL [0]	
    HikeName	varchar(255) NULL []	
    Location	varchar(255) NULL []	
    Gain	smallint(6) NULL [0]	
    HighestPoint	smallint(6) NULL [0]	
    Length	float NULL [0]	
    Rating	tinyint(4) NULL [0]	
    Difficulty	tinyint(4) NULL [0]	
    Description	text NULL	
    Directions	text NULL	
    DateAdded	datetime NULL	
    LastUpdated	timestamp [0000-00-00 00:00:00]
*/

//create default in case page is hit from URL only
if(!isset($UserID)){$UserID=0;}

?>
<h2><?=$title?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('hikes/create'); ?>

      <fieldset>
    <legend>Enter hike Below</legend>
    <div class="form-group">
      <label for="HikeName">Hike Name</label>
      <input type="text" name="HikeName" class="form-control" id="HikeName" placeholder="Hike Name" required="required">
    </div>
    <div class="form-group">
      <label for="Location">Location</label>
      <input type="text" name="Location" class="form-control" id="Location" placeholder="Location" required="required">
    </div>
    <div class="form-group">
      <label for="Gain">Elevation Gain</label>
      <input type="number" min="0" step="1" name="Gain" class="form-control" id="Gain" placeholder="Elevation Gain, in feet" required="required">
    </div>
    <div class="form-group">
      <label for="HighestPoint">Highest Point</label>
      <input type="number" type="number" min="0" step="1" name="HighestPoint" class="form-control" id="HighestPoint" placeholder="Highest Point, in feet" required="required">
    </div>
          
    <div class="form-group">
      <label for="Length">Length</label>
      <input type="number" type="number" min="0" step="any" name="Length" class="form-control" id="Length" placeholder="Total distance, in miles" required="required">
    </div>
    
    <div class="form-group">
      <label for="Rating">Rate This Hike (1-5, 5 is highest)</label>
      <select class="form-control" id="Rating" name="Rating" required="required">
        <option value="">Rate This Hike</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
          
        <div class="form-group">
      <label for="Rating">Difficulty (1-5, 5 is hardest)</label>
      <select class="form-control" id="Difficulty" name="Difficulty" required="required">
        <option value="">Difficulty of Hike</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>       
          
    <div class="form-group">
      <label for="Description">Description</label>
      <textarea class="form-control" id="Description" name="Description" rows="3" placeholder="Describe the hike" required="required"></textarea>
    </div> 
          
    <div class="form-group">
      <label for="Directions">Directions</label>
      <textarea class="form-control" id="Directions" name="Directions" rows="3" placeholder="Driving directions" required="required"></textarea>
    </div>      
    <input type="hidden" name="UserID" value="<?=$UserID?>" />
    <button type="submit" class="btn btn-primary">Add Hike</button>
  </fieldset>
</form>

<?php
$this->load->view($this->config->item('theme') . 'footer');
?>