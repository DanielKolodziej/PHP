<?php

namespace NoteEditSqlite;

require_once 'INoteRepository.php';
require_once 'Note.php';


class SqliteNoteRepository implements INoteRepository
{
    private $db;
    private $fileName = 'data/data.sqlite';

    public function __construct(){
        //open the database
        $this->db = new \PDO('sqlite:' . $this->fileName);

        //create the table if not exists
        $this->db->exec("CREATE TABLE IF NOT EXISTS Notes (Id INTEGER PRIMARY KEY, Author TEXT, Subject TEXT, Message TEXT, Edited TEXT)");
    }

    public function saveNote($note)
    {
        if ($note->getId() != '') {
            //Update
            $stmh = $this->db->prepare("UPDATE Notes SET Author = :author, Subject = :subject, Message = :message, Edited = :edited WHERE id = :id");
            $aAuthor = $note->getAuthor();
			$aSubject = $note->getSubject();
			$aMessage = $note->getMessage();
            $aEdited = $note->getTime();
            $aId = $note->getId();
            $stmh->bindParam(':author', $aAuthor);
			$stmh->bindParam(':subject', $aSubject);
			$stmh->bindParam(':message', $aMessage);
            $stmh->bindParam(':edited', $aEdited);
            $stmh->bindParam(':id', $aId);
            return $stmh->execute();
        } else {
            //Insert
            $stmh = $this->db->prepare("insert into Notes (Author, Subject, Message, Edited) values (:author, :subject, :message, :edited)");
            $aAuthor = $note->getAuthor();
			$aSubject = $note->getSubject();
			$aMessage = $note->getMessage();
            $aEdited = $note->getTime();
            $stmh->bindParam(':author', $aAuthor);
			$stmh->bindParam(':subject', $aSubject);
			$stmh->bindParam(':message', $aMessage);
            $stmh->bindParam(':edited', $aEdited);
            return $stmh->execute();
        }
    }

    public function getAllNotes()
    {
        $noteList = array();
        $result = $this->db->query('SELECT * FROM Notes');
        foreach($result as $row) {
            $aNote = new Note();
            $aNote->setAuthor($row['Author']);
            $aNote->setSubject($row['Subject']);
			$aNote->setMessage($row['Message']);
			$aNote->setTime($row['Edited']);
            $aNote->setId($row['Id']);
            $noteList[$aNote->getId()] = $aNote;
        }
        return $noteList;
    }

    public function getNoteById($id)
    {
        $stmh = $this->db->prepare("SELECT * from Notes WHERE Id = :id");
        $sid = intval($id);
        $stmh->bindParam(':id', $sid);
        $stmh->execute();
        $stmh->setFetchMode(\PDO::FETCH_ASSOC);

        if ($row = $stmh->fetch()) {
            $aNote = new Note();
            $aNote->setId($row['Id']);
            $aNote->setAuthor($row['Author']);
			$aNote->setSubject($row['Subject']);
			$aNote->setMessage($row['Message']);
            $aNote->setTime($row['Edited']);
            return $aNote;
        } else {
            return new Note();
        }
    }

    public function deleteNote($noteId)
    {
        $stmh = $this->db->prepare("DELETE FROM Notes WHERE id = :id");
        $stmh->bindParam(':id', intval($noteId));
        return $stmh->execute();
    }

}