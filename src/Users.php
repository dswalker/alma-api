<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alma;

use Alma\Users\User;
use Alma\Users\Results;

/**
 * Users
 *
 * @author David Walker <dwalker@calstate.edu>
 * 
 * @return Results
 */
class Users extends Alma
{
    /**
     * Retrieves a list of users
     *
     * Number of results can be limited and offset using the query parameters. For example, to receive the
     * first 2 results send offset=0 and limit=2
     *
     * @return Results
     */
    public function getUsers($q = "", $limit = 10, $offset = 0, $order_by = "")
    {
        $params = array(
            'q' => $q,
            'limit' => $limit,
            'offset' => $offset,
            'order_by' => $order_by,
        );
        $json = $this->client()->getUrl('users', $params);
        return new Results($json, $offset);
    }
    
    /**
     * Get a User
     *
     * @param string $user_id  The identifier of the Course.
     */
    public function getUser($user_id)
    {
        $json = $this->client()->getUrl("users/$user_id");
        return new User($json);
    }

    /**
     * Add a new User
     *
     * @param Course $course            
     */
    public function addUser(User $user)
    {
        $json = $this->client()->postJson("users", $user->json());
        $user->update($json);
    }
}