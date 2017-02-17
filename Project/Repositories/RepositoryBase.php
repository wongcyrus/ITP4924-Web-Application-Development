<?php
//Don't modify this class!
namespace Repositories;

use \PDO;

abstract class RepositoryBase
{
    protected $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        if ($this->connection === null) {
            $this->connection = new PDO(
                'mysql:host=localhost:3307;dbname=project',
                'root',
                'usbw'
            );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }
    }

    abstract public function find($id);

    abstract public function findAll();

    abstract public function save($o);

    abstract public function update($o);

    abstract public function destroy($o);
}