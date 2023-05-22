<?php
require 'TableWrapperInterface.php';
require 'UserTableWrapper.php';

use PHPUnit\Framework\TestCase;

class UserTableWrapperTest extends TestCase
{
    public function testInsert()
    {
        $wrapper = new UserTableWrapper();
        $values = ['id' => 1, 'name' => 'John Doe'];
        $wrapper->insert($values);

        $this->assertCount(1, $wrapper->get());
        $this->assertSame($values, $wrapper->get()[0]);
    }

    public function testUpdate()
    {
        $wrapper = new UserTableWrapper();
        $values = ['id' => 1, 'name' => 'John Doe'];
        $wrapper->insert($values);

        $updatedValues = ['name' => 'Jane Smith'];
        $updatedRow = $wrapper->update(0, $updatedValues);

        $this->assertSame(array_merge($values, $updatedValues), $updatedRow);
    }

    public function testDelete()
    {
        $wrapper = new UserTableWrapper();
        $values = ['id' => 1, 'name' => 'John Doe'];
        $wrapper->insert($values);

        $this->assertCount(1, $wrapper->get());

        $wrapper->delete(0);

        $this->assertCount(0, $wrapper->get());
    }
}
