<?php

function runTest() {
    $studentsList = new StudentsList();

    $student = new Student("Григорьева", "Любовь", "ФИиИт", 3, "302группа");
    $studentsList->add($student);

    assert($studentsList->count() == 1);
    assert($studentsList->get(0)->getLastname() == "Григорьева");
    assert($studentsList->get(0)->getFirstname() == "Любовь");
    assert($studentsList->get(0)->getFaculty() == "ФИиИт");
    assert($studentsList->get(0)->getCourse() == 3);
    assert($studentsList->get(0)->getGroup() == "302группа");

    $studentsList->store("students.txt");
    $studentsList->load("students.txt");
    assert($studentsList->count() == 1);
    assert($studentsList->get(0)->getLastname() == "Григорьева");
    assert($studentsList->get(0)->getFirstname() == "Любовь");
    assert($studentsList->get(0)->getFaculty() == "ФИиИт");
    assert($studentsList->get(0)->getCourse() == 3);
    assert($studentsList->get(0)->getGroup() == "302группа");

    echo "All tests passed successfully!\n";
}

