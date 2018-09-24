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
    private $contentCategory;
    private $contentFileExtension;
    private $contentUrl;
    private $dateAdded;
    private $isContentActive;
    private $isPublished;

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }



    /**
     * @return mixed
     */
    public function getContentCategory()
    {
        return $this->contentCategory;
    }

    /**
     * @param mixed $contentCategory
     */
    public function setContentCategory($contentCategory)
    {
        $this->contentCategory = $contentCategory;
    }



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

    function jsonSerialize()
    {
        return [
            'contentId' => $this->contentId,
            'contentName' => $this->contentName,
            'contentCategory' => $this->contentCategory,
            'contentType' => $this->contentType,
            'contentFileExtension' => $this->contentFileExtension,
            'contentUrl' => $this->contentUrl,
            'dateAdded' => $this->dateAdded,
            'isContentActive' => $this->isContentActive,
            'isPublished' => $this->isPublished,
        ];
    }


} 