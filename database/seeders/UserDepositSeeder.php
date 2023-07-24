<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\user_deposit;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDepositSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run ()
	{
		$faker = Faker::create();
		foreach (range(1, 2000) as $index) {
			$user = new user_deposit();
			$user->user_id = rand(0000000, 9999999);
			$user->transaction_id = rand(0000000, 9999999);
			$user->gateway_id = rand(0000000, 9999999);
			$user->amount = rand(0000000, 9999999);
			$user->usd_rate = rand(0000000, 9999999);
			$user->total_usd = rand(0000000, 9999999);
			$user->sender_number = rand(0000000, 9999999);
			$user->transaction_number = rand(0000000, 9999999);
			$user->status = rand(0000000, 9999999);
			$user->deposit_comment = rand(0000000, 9999999);
			$user->save();
		}
	}
}
