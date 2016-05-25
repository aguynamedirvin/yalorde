<?php


return function($site, $pages, $page) {
  
    $data = array(
        'name'      => '',
        'email'     => '',
        'message'   => ''
    );
    
    if ( get('submit') ) {
        
        // Get the data
        $data = array(
            'name'      => get('name'),
            'email'     => get('email'),
            'message'   => get('message')
        );
        
        
        // Rules
        $rules = array(
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'message'   => ['required', 'min' => 3, 'max' => 1000]
        );
        
        
        // Error messages
        $errors = array(
            'name'      => 'Enter a valid name',
            'email'     => 'Enter valid email adress',
            'message'   => 'Please type in your message in the textbox'
        );
        
        
        // Data is invalid -> send errors
        if ( $invalid = invalid($data, $rules, $errors) ) {
            
            $alert = $invalid;
        
        } else {
            
            $body = 'Hi';
            
            // Build the email
            $email = email([
                'to'        => page('contact')->email(),
                'from'      => $data['email'],
                'subject'   => 'Message from Yalorde Boutique contact form',
                'replyTo'   => $data['email'],
                'body'      => $body
            ]);
            
            // Send message
            if ( $email->send() ) {
                go('contact/status:sent'); 
            } else {
                $alert = [$email->error()];
            }
            
        }
        
    }
    
    
    // Pass variables
    return compact('data', 'alert');
  
};