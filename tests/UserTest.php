<?php

class UserTest extends TestCase
{

    public function testFetchUser()
    {
        $this->json('GET', '/user/list')
             ->seeJson([
                 'status' => 'success',
             ]);
    }

    public function testUpdateUser()
    {
        $this->json('POST', '/user/update/1',
            [
                'full_name' => 'Test User',
                'country'   => 'AU',
            ])
             ->seeJson([
                 'status' => 'success',
             ]);
    }

    /**
     * @return void
     */
    public function testDeleteUser()
    {
        $this->json('DELETE', '/user/delete/1')
             ->seeJson([
                 'status' => 'success',
             ]);
    }

}