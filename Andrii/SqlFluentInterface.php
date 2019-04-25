<?php

namespace Andrii\FluentInterface;

class Sql
{

    private $fields = [];


    private $from = [];


    private $where = [];

    public function select(array $fields): Sql
    {
        $this->fields = $fields;

        return $this;
    }

    public function from(string $table, string $alias): Sql
    {
        $this->from[] = $table.' AS '.$alias;

        return $this;
    }

    public function where(string $condition): Sql
    {
        $this->where[] = $condition;

        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            join(', ', $this->fields),
            join(', ', $this->from),
            join(' AND ', $this->where)
        );
    }
}

/**
 * AND the simplest way )
 */



class Fluent {
    public function hello() {
        echo "hello ";
        return $this;
    }

    public function world() {
        echo "world";
        return $this;
    }
}

$fluent = new Fluent();
$fluent->hello()
    ->world();