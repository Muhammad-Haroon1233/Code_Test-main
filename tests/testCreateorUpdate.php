<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;
use DTApi\Repository\UserRepository;
use DTApi\Models\User;
///use  DTApi\Repository\UserRepository ;

class testCreateorUpdate extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testCreateOrUpdateForCustomerWithPaidConsumerTypeAndNoCompanyId()
    {
        // Prepare data
        $request = new Request([
            'role' => 1,
            'name' => 'John Doe',
            'company_id' => '',
            'department_id' => '1',
            'email' => 'john@example.com',
            'dob_or_orgid' => '2022-01-01',
            'phone' => '123456789',
            'mobile' => '987654321',
            'password' => 'secret',
            'consumer_type' => 'paid',
            'customer_type' => 'individual',
            'username' => 'johndoe',
            'post_code' => '12345',
            'address' => '123 Main St',
            'city' => 'Cityville',
            'town' => 'Towntown',
            'country' => 'Countryland',
            'reference' => 'yes',
            'additional_info' => 'Some additional info',
            'cost_place' => 'Costly place',
            'fee' => '50',
            'time_to_charge' => '2 hours',
            'time_to_pay' => '30 days',
            'charge_ob' => 'yes',
            'customer_id' => 'C123',
            'charge_km' => '5',
            'maximum_km' => '100',
            'new_towns' => 'NewTown',
            'user_towns_projects' => ['1', '2'],
            'status' => '1',
        ]);

        // Mock necessary classes and methods
        // For example, you can use Mockery or PHPUnit's built-in methods to mock the necessary database operations

        // Call the method to be tested
        $userRepository = new UserRepository();

        // Call the method you want to test
        $result = $userRepository->createOrUpdate(null, $request);

        // Assert the expected reult or perform necessary assertions based on the logic of your method
        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('paid', $result->userMeta->consumer_type);
        // Add more assertions...

        // Clean up or reset the test environment if needed
    }

    public function testCreateOrUpdateForTranslatorWithWorkedForYes()
    {
        // Prepare data
        $request = new Request([
            'role' => 1,
            'name' => 'John Doe',
            'company_id' => '',
            'department_id' => '1',
            'email' => 'john@example.com',
            'dob_or_orgid' => '2022-01-01',
            'phone' => '123456789',
            'mobile' => '987654321',
            'password' => 'secret',
            'consumer_type' => 'paid',
            'customer_type' => 'individual',
            'username' => 'johndoe',
            'post_code' => '12345',
            'address' => '123 Main St',
            'city' => 'Cityville',
            'town' => 'Towntown',
            'country' => 'Countryland',
            'reference' => 'yes',
            'additional_info' => 'Some additional info',
            'cost_place' => 'Costly place',
            'fee' => '50',
            'time_to_charge' => '2 hours',
            'time_to_pay' => '30 days',
            'charge_ob' => 'yes',
            'customer_id' => 'C123',
            'charge_km' => '5',
            'maximum_km' => '100',
            'new_towns' => 'NewTown',
            'user_towns_projects' => ['1', '2'],
            'status' => '1',
        ]);

        // Mock necessary classes and methods
        // For example, you can use Mockery or PHPUnit's built-in methods to mock the necessary database operations

        // Call the method to be tested
        $userRepository = new UserRepository();

        // Call the method you want to test
        $result = $userRepository->createOrUpdate(null, $request);

        // Assert the expected result or perform necessary assertions based on the logic of your method
        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('yes', $result->userMeta->worked_for);
        // Add more assertions...

        // Clean up or reset the test environment if needed
    }

}
