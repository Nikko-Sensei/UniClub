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

    // Membership
    public const JOIN_CLUB = 'JOIN_CLUB';

    public const LEAVE_CLUB = 'LEAVE_CLUB';

    public const APPROVE_MEMBERSHIP = 'APPROVE_MEMBERSHIP';

    public const REJECT_MEMBERSHIP = 'REJECT_MEMBERSHIP';

    public const UPDATE_MEMBER_ROLE = 'UPDATE_MEMBER_ROLE';

    public const REMOVE_MEMBER = 'REMOVE_MEMBER';


    // Event

    public const CREATE_EVENT = 'CREATE_EVENT';

    public const UPDATE_EVENT = 'UPDATE_EVENT';

    public const DELETE_EVENT = 'DELETE_EVENT';

    public const REGISTER_EVENT = 'REGISTER_EVENT';

    public const CANCEL_EVENT_REGISTRATION = 'CANCEL_EVENT_REGISTRATION';



    // Announcement

    public const CREATE_ANNOUNCEMENT = 'CREATE_ANNOUNCEMENT';

    public const UPDATE_ANNOUNCEMENT = 'UPDATE_ANNOUNCEMENT';

    public const DELETE_ANNOUNCEMENT = 'DELETE_ANNOUNCEMENT';



    // Security

    public const UPDATE_SECURITY_SETTINGS = 'UPDATE_SECURITY_SETTINGS';
}