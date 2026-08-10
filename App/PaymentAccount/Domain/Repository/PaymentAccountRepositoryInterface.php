<?php

namespace App\PaymentAccount\Domain\Repository;


use App\PaymentAccount\Domain\Entities\PaymentAccount;


interface PaymentAccountRepositoryInterface
{


    /**
     * Create payment account
     */
    public function create(
        PaymentAccount $account
    ): bool;



    /**
     * Update payment account
     */
    public function update(
        PaymentAccount $account
    ): bool;



    /**
     * Delete payment account
     */
    public function delete(
        int $id
    ): bool;



    /**
     * Find payment account by id
     */
    public function findById(
        int $id
    ): ?PaymentAccount;



    /**
     * Get all payment accounts
     */
    public function findAll(): array;



    /**
     * Get active accounts by club
     */
    public function findByClub(
        int $clubId
    ): array;



}