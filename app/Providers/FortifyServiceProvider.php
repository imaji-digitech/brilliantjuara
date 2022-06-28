<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string)$request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)
                ->first();
            if ($user && Hash::check($request->password, $user->password)) {
                $ip = request()->ip(); // your ip address here
                $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
                if ($query && $query['status'] == 'success') {
                    if (Log::whereUserId($user->id)->whereDate('created_at', '=', Carbon::now())->get()->count() == 0) {
                        Log::create(['user_id' => $user->id, 'city' => $query['city']]);
                    }
                } else {
                    if (Log::whereUserId($user->id)->whereDate('created_at', '=', Carbon::now())->get()->count() == 0) {
                        Log::create(['user_id' => $user->id, 'city' => "unidentified"]);
                    }
                }
                return $user;
            }
        });
    }
}
