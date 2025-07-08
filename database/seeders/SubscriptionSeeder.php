<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription;
use Carbon\Carbon;
class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriptions = [
            [
                'name' => 'Netflix',
                'type' => 'monthly',
                'payment_date' => Carbon::now()->subDays(5),
                'user_id' => 1,
                'payment' => 15.99,
                'category' => 'entertainment',
                'note' => 'Family plan with 4 screens'
            ],
            [
                'name' => 'Spotify',
                'type' => 'monthly',
                'payment_date' => Carbon::now()->subDays(10),
                'user_id' => 1,
                'payment' => 9.99,
                'category' => 'entertainment',
                'note' => 'Student discount applied'
            ],
            [
                'name' => 'Adobe Creative Cloud',
                'type' => 'monthly',
                'payment_date' => Carbon::now()->subDays(2),
                'user_id' => 1,
                'payment' => 52.99,
                'category' => 'software',
                'note' => 'Used for design work'
            ],
            [
                'name' => 'Microsoft 365',
                'type' => 'yearly',
                'payment_date' => Carbon::now()->subMonths(6),
                'user_id' => 1,
                'payment' => 99.99,
                'category' => 'software',
                'note' => 'Office tools subscription'
            ],
            [
                'name' => 'Electricity Bill',
                'type' => 'monthly',
                'payment_date' => Carbon::now()->subDays(7),
                'user_id' => 1,
                'payment' => 60.00,
                'category' => 'utilities',
                'note' => 'Estimated monthly usage'
            ],
            [
                'name' => 'Internet Plan',
                'type' => 'monthly',
                'payment_date' => Carbon::now()->subDays(3),
                'user_id' => 1,
                'payment' => 45.00,
                'category' => 'utilities',
                'note' => 'Fiber 100Mbps plan'
            ],
            [
                'name' => 'Gym Membership',
                'type' => 'monthly',
                'payment_date' => Carbon::now()->subDays(8),
                'user_id' => 1,
                'payment' => 30.00,
                'category' => 'others',
                'note' => 'Local gym'
            ],
            [
                'name' => 'Cloud Storage',
                'type' => 'monthly',
                'payment_date' => Carbon::now()->subDays(4),
                'user_id' => 1,
                'payment' => 2.99,
                'category' => 'software',
                'note' => 'Google Drive 100GB plan'
            ],
        ];

        foreach ($subscriptions as $subscription) {
            Subscription::create($subscription);
        }
    }
}
