<?php


class GroupStudents implements Countable, Iterator
{
    protected $students = [];
    protected $counter;


    public function addStudent(Student $student)
    {
        $this->students[] = $student;
    }

    public function removeStudent(Student $toRemove)
    {
        $toRemoveStudent = $toRemove->getStudentName();
        print_r($toRemoveStudent);
        $this->students = array_filter($this->students, function (Student $student) use ($toRemoveStudent) {
            return $student->getStudentName() !== $toRemoveStudent;
        });
    }

    public function count()
    {
        return count($this->students);
    }

    public function current()
    {
        return $this->students[$this->counter];
    }

    public function key()
    {
        return $this->counter;
    }

    public function next()
    {
        $this->counter++;
    }

    public function rewind()
    {
        $this->counter = 0;
    }

    public function valid()
    {
        return isset($this->students[$this->counter]);
    }
}