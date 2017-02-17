<?php
namespace Repositories;

include_once $_SERVER['DOCUMENT_ROOT']  . "/autoload.php";

use \PDO;
use \Models\Student;
use \Repositories\RepositoryBase;

class StudentRepository extends RepositoryBase
{

    public function find($id)
    {
        $stmt = $this->connection->prepare('
            SELECT "Student", students.*
             FROM students
             WHERE id = :id
        ');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Set the fetchmode to populate an instance of 'Student'
        // This enables us to use the following:
        //     $user = $repository->find(1234);
        //     echo $student->name;
        $stmt->setFetchMode(PDO::FETCH_CLASS, '\Models\Student');
        return $stmt->fetch();
    }

    public function findAll()
    {
        $stmt = $this->connection->prepare('
            SELECT * FROM students
        ');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, '\Models\Student');

        // fetchAll() will do the same as above, but we'll have an array. ie:
        //    $users = $repository->findAll();
        //    echo $students[0]->name;
        return $stmt->fetchAll();
    }

    /**
     * @property Student $student
     */
    public function save($student)
    {
        // If the ID is set, we're updating an existing record
        if (isset($student->id)) {
            return $this->update($student);
        }
        $stmt = $this->connection->prepare('
            INSERT INTO students
                (name, email)
            VALUES
                (:name, :email)
        ');
        $stmt->bindParam(':name', $student->name);
        $stmt->bindParam(':email', $student->email);
        return $stmt->execute();
    }

    /**
     * @property Student $student
     */
    public function update($student)
    {
        if (!isset($student->id)) {
            // We can't update a record unless it exists...
            throw new \LogicException(
                'Cannot update user that does not yet exist in the database.'
            );
        }
        $stmt = $this->connection->prepare('
            UPDATE students
            SET name = :name,
                email = :email
            WHERE id = :id
        ');

        $stmt->bindParam(':name', $student->name);

        $stmt->bindParam(':email', $student->email);
        $stmt->bindParam(':id', $student->id);
        return $stmt->execute();
    }

    /**
     * @property Student $student
     */
    public function destroy($id)
    {
        if (!isset($id)) {
            // We can't delete a record unless it exists...
            throw new \LogicException(
                'Cannot update user that does not yet exist in the database.'
            );
        }
        $stmt = $this->connection->prepare('
            Delete FROM students
            WHERE id = :id
        ');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}