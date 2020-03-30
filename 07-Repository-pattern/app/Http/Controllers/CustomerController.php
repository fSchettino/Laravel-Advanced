<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CustomerRepository;
use App\Http\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {

        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->list();

        return $customers;
    }

    public function getById($customerId)
    {
        $customer = $this->customerRepository->getById($customerId);

        return $customer;
    }
}
