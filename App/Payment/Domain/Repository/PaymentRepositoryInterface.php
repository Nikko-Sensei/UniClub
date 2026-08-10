<?php

namespace App\Payment\Domain\Repository;



interface PaymentRepositoryInterface
{


    /**
     * Create Payment
     */
    public function create(
        int $userId,
        int $clubId,
        ?int $membershipId,
        float $amount,
        string $paymentMethod,
        ?string $transactionNumber,
        ?string $receiptImage
    ): int;




    /**
     * Find Payment By ID
     */
    public function getById(
        int $id
    ): ?array;




    /**
     * Get Student Payment History
     */
    public function getByUser(
        int $userId
    ): array;




    /**
     * Check Existing Pending Payment
     */
    public function existsPending(
        int $userId,
        int $clubId
    ): bool;




    /**
     * Get All Payments
     * Admin Payment Management
     */
    public function getAll(): array;




    /**
     * Verify Payment
     */
    public function verify(
        int $paymentId,
        int $adminId
    ): bool;




    /**
     * Reject Payment
     */
    public function reject(
        int $paymentId,
        int $adminId,
        string $reason
    ): bool;




    /**
     * Get Payments By Club
     */
    public function getByClub(
        int $clubId
    ): array;




    /**
     * Get Pending Payment Count
     */
    public function getPendingCount(): int;
}