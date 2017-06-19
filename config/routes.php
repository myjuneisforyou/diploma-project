<?php

return [
    'list/([0-9]+)'=>'list/catalog/$1', // product list
    
    'category/([0-9]+)'=>'list/category/$1', // category
    'product/([0-9]+)'=>'product/view/$1',  // product
    
    'user/signup'=>'user/signup', //registration
    'user/login'=>'user/login', //login
    'user/logout'=>'user/logout', //logout
    
    'cart/delete/([0-9]+)'=>'cart/delete/$1', //delete product
    'cart/add/([0-9]+)'=>'cart/add/$1', //add product to cart
    'cart/checkout'=>'cart/checkout', //checkout page
    'cart'=>'cart/index', //InCart page
    
    
    'account/password'=>'account/changepassword', //change password page
    'account/email'=>'account/changemail', //change email 
    'account/edit'=>'account/edit', //edit page
    'account'=>'account/account', //account page
    
    'about' => 'info/about',//about the store
    'deliver'=> 'info/deliver',//about delivery
    'feedback'=> 'info/feedback',//feedback
    
    ''=>'index/index',//main page
    ];
