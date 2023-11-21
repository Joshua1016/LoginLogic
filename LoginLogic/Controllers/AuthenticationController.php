<?php

class AuthenticationController
{

    public function login($userModel, $username, $password)
    {
        $msg = 'Invalid Username or password';
        $success = false;
        // proceed if username and password are not emptu
        if (!empty($username) && !empty($password)) {

            $row = $userModel->getuserByCredentials($username, $password);
            if (!empty($row)) {
                $success = true;
                $msg = 'Successful Login';
            }
        }

        return [
            'msg'=> $msg,
            'success'=> $success
        ];
    }


    // if gusto mo separate ang username kag password


    public function loginv2($userModel, $username, $password)
    {
        $msg = 'Invalid Email';
        $success = false;
        // proceed if username and password are not emptu
        if (!empty($username) && !empty($password)) {
            // fetch the matching user usingusername
            $row = $userModel->getUserByUsername($username);

            if (!empty($row)) {
                $msg = 'Invalid password';
                if ($row['password'] === $password) {
                    $success = true;
                    $msg = 'Login Success';
                }
            }
        }
        return [
            'msg' => $msg,
            'success' => $success
        ];
    }
}
