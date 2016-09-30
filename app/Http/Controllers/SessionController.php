<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{	
	public function checkInactivity()
	{	$maxIdleBeforeLogout = 10 * 1;
        $maxIdleBeforeWarning = 9 * 1;
        $warningTime = $maxIdleBeforeLogout - $maxIdleBeforeWarning;

        // Calculate the number of seconds since the use's last activity
        $idleTime = date('U') - Session::get('lastActive');

        // Warn user they will be logged out if idle for too long
        if ($idleTime > $maxIdleBeforeWarning && empty(Session::get('idleWarningDisplayed'))) 
		{	Session::set('idleWarningDisplayed', true);
            return 'You have ' . $warningTime . ' seconds left before you are logged out';
        }

        // Log out user if idle for too long
        if ($idleTime > $maxIdleBeforeLogout && empty(Session::get('logoutWarningDisplayed'))) 
		{	// *** Do stuff to log out user here
            Session::set('logoutWarningDisplayed', true);
            return 'loggedOut';
        }

        return '';
	}
}
