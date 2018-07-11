<?php
/**
 * Created by PhpStorm.
 * User: AnneStoppable
 * Date: 3/1/2018
 * Time: 7:30 PM
 */

class Content implements JsonSerializable{

    private $contentId;
    private $contentName;
    private $contentType;
    private $contentFileExtension;
    private $contentUrl;
    private $dateAdded;
    private $isContentActive;

    public function getContentId(){
        return $this->contentId;
    }
    public function setContentId($contentId){
        $this->contentId = $contentId;
    }
    public function getContentName(){
        return $this->contentName;
    }
    public function setContentName($contentName){
        $this->contentName = $contentName;
    }
    public function getContentType(){
        return $this->contentType;
    }
    public function setContentType($contentType){
        $this->contentType = $contentType;
    }
    public function getContentFileExtension(){
        return $this->contentFileExtension;
    }
    public function setContentFileExtension($contentFileExtension){
        $this->contentFileExtension = $contentFileExtension;
    }
    public function getContentUrl(){
        return $this->contentUrl;
    }
    public function setContentUrl($contentUrl){
        $this->contentUrl = $contentUrl;
    }
    public function getDateAdded(){
        return $this->dateAdded;
    }
    public function setDateAdded($dateAdded){
        $this->dateAdded = $dateAdded;
    }
    public function getIsContentActive(){
        return $this->isContentActive;
    }
    public function setIsContentActive($isContentActive){
        $this->isContentActive = $isContentActive;
    }

    public function toJSON(){
        return json_encode($this);
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return [
            'contentId' => $this->contentId,
            'contentName' => $this->contentName,
            'contentType' => $this->contentType,
            'contentFileExtension' => $this->contentFileExtension,
            'contentUrl' => $this->contentUrl,
            'dateAdded' => $this->dateAdded,
            'isContentActive' => $this->isContentActive,
        ];
    }


} 