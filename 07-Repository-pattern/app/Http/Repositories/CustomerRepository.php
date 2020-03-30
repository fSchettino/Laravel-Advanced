<?php
/**
 * Created by PhpStorm.
 * User: fschettino
 * Date: 29/03/20
 * Time: 18:33
 */

namespace App\Http\Repositories;

use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function list()
    {
        return Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()

            // Using class responseObject method
            ->map(function ($customer) {
                return $this->responseObject($customer);
            });

            // Using model responseObject method
            //->map->responseObject();
    }

    public function getById($customerId)
    {
        $customer = Customer::where('id', $customerId)
            ->where('active', 0)
            ->with('user')
            ->firstOrFail()

            // Using model responseObject method
            ->responseObject();

        return $customer;

        // Using class responseObject method
        //return $this->responseObject($customer);
    }

    protected function responseObject($customer)
    {
        return [
            'customer_id' => $customer->id,
            'name' => $customer->name,
            'created_by' => $customer->user->email,
            'last_updated' => $customer->updated_at->diffForHumans()
        ];
    }
}
