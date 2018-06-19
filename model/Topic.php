<?php

class Topic implements JsonSerializable{
    private $topicId;
    private $topicTitle;

    public function getTopicId()
    {
        return $this->topicId;
    }

    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
    }

    public function getTopicTitle()
    {
        return $this->topicTitle;
    }

    public function setTopicTitle($topicTitle)
    {
        $this->topicTitle = $topicTitle;
    }


    function jsonSerialize()
    {
        return [
            'topicId' => $this->topicId,
            'topicTitle' => $this->topicTitle,
        ];
    }

    public function toJSON(){
        return json_encode($this);
    }


} 