<?php

namespace NoteEditSqlite;

class Note {
	private $id = '';
	private $author = '';
	private $subject = '';
	private $message = '';
	private $timeS = '';

	public function __construct(){
        //$this->id = uniqid();
    }

	/**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
	
	/**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
	
	/**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
	
	/**
     * @return string
     */
    public function getTime()
    {
        return $this->timeS;
    }

    /**
     * @param string $timeS
     */
    public function setTime($timeS)
    {
        $this->timeS = $timeS;
    }
}