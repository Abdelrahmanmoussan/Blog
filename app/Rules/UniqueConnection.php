<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Connection;

class UniqueConnection implements Rule
{
    protected $connection;
    protected $table;
    protected $column;
    protected $ignore;

    /**
     * Create a new rule instance.
     *
     * @param  Connection  $connection
     * @param  string  $table
     * @param  string  $column
     * @param  mixed  $ignore
     * @return void
     */
    public function __construct(Connection $connection, string $table, string $column, $ignore = null)
    {
        $this->connection = $connection;
        $this->table = $table;
        $this->column = $column;
        $this->ignore = $ignore;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $query = $this->connection->table($this->table)
            ->where($this->column, $value);

        if ($this->ignore) {
            $query->whereKeyNot($this->ignore);
        }

        return ! $query->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute has already been taken.';
    }
}
