<?php
class UserTableWrapper
{
    private array $rows;

    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }

    public function update(int $id, array $values): array
    {
        if (isset($this->rows[$id])) {
            $this->rows[$id] = array_merge($this->rows[$id], $values);
            return $this->rows[$id];
        } else {
            throw new Exception("Row with ID $id does not exist.");
        }
    }

    public function delete(int $id): void
    {
        unset($this->rows[$id]);
    }

    public function get(): array
    {
        return $this->rows;
    }
}
