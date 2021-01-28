<?php

function provideAccessTo($userLevels, $redirect = true)
{
    if ($userLevels === 'all') {
        return true;
    } else {
        //Split level by
        $allowedUser = explode("|", $userLevels);
        $currentUser = getUser('level');

        if (in_array($currentUser, $allowedUser)) {
            return true;
        } else {
            if ($redirect === true) {
                redirect('restrict-page');
            } else {
                return false;
            }
        }

    }
}

function showOnlyTo($userCodeList)
{
    return provideAccessTo($userCodeList, false);
}
