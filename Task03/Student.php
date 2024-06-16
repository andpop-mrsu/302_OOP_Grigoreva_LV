<?php

class Student {
    private $id;
    private $lastname;
    private $firstname;
    private $faculty;
    private $course;
    private $group;

    public function __construct($lastname, $firstname, $faculty, $course, $group) {
        // Автоинкрементный Id
        static $id_counter = 0;
        $this->id = ++$id_counter;

        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->faculty = $faculty;
        $this->course = $course;
        $this->group = $group;
    }

    public function getId() {
        return $this->id;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function getFaculty() {
        return $this->faculty;
    }

    public function setFaculty($faculty) {
        $this->faculty = $faculty;
        return $this;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
        return $this;
    }

    public function getGroup() {
        return $this->group;
    }

    public function setGroup($group) {
        $this->group = $group;
        return $this;
    }

    public function __toString() {
        return "Id: {$this->id}\nФамилия: {$this->lastname}\nИмя: {$this->firstname}\nФакультет: {$this->faculty}\nГруппа: {$this->group}";
    }
}

