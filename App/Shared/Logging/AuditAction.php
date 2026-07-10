<?php

namespace App\Shared\Logging;


final class AuditAction
{
    public const LOGIN_SUCCESS = 'LOGIN_SUCCESS';

    public const LOGIN_FAILED = 'LOGIN_FAILED';

    public const REGISTER_SUCCESS = 'REGISTER_SUCCESS';

    public const LOGOUT = 'LOGOUT';

    public const PASSWORD_RESET_REQUEST = 'PASSWORD_RESET_REQUEST';

    public const PASSWORD_RESET_SUCCESS = 'PASSWORD_RESET_SUCCESS';

    public const CREATE_CLUB = 'CREATE_CLUB';

    public const UPDATE_CLUB = 'UPDATE_CLUB';

    public const DELETE_CLUB = 'DELETE_CLUB';
}