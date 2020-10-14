<?php 
     function registerUser($form) {
        $errors = [];

        $key = 'teamname';
        if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
            $errors[$key] = 'Team name is required.';

        $key = 'colour';
        //the $Key itself needs to be transferred to index.php
        //validation for the dropdown selection, need to fix the functionality of the dropdown first

        $key = 'email';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
            $errors[$key] = 'Email is invalid.';
        //validate, if the invitation was already sent to the email (may not need to do this)

        
        if(count($errors) === 0) {
            // add board values into an array
            //might not need to be placed into an array if we're working with SQL
            $scrumboard = [
                'teamname' => htmlspecialchars(trim($form['teamname'])),
                'colourboard' => htmlspecialchars(trim($form['colourboard'])),
                'optionalcomment' => htmlspecialchars(trim($form['optionalcomment'])),
                'invitedmemberlist' => htmlspecialchars(trim($form['invitedmemberlist'])),
            ];
        }


     }


