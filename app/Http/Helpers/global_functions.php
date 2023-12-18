<?php

function alertUploadFileHtml(){
    return "
            <div class=\"alert alert-warning d-flex align-items-center p-5\"  id=\"alertUploadFile\" style=\"display: none\">
                <span class=\"svg-icon svg-icon-2hx svg-icon-warning me-3\">
                    <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path opacity=\"0.3\" d=\"M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z\" fill=\"currentColor\"></path>
                        <path d=\"M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z\" fill=\"currentColor\"></path>
                    </svg>
                </span>
                <div class=\"d-flex flex-column\">
                    <h4 class=\"mb-1 text-dark\">".__('Important alert to increase website performance')."</h4>
                    <ul>
                        <li>
                        ".__('In the case of attaching images, please compress the size of the images and we will recommend to you')." ( <a href=\"https://tinyjpg.com/\" target=\"_blank\">tinyjpg</a> - <a href=\"https://www.iloveimg.com/\" target=\"_blank\">iloveimg</a> )
                        </li>
                        <li>
                            ".__('In the case of attaching a video, please compress the size of the videos and we will recommend a program for you')." <a href=\"https://handbrake.fr/\" target=\"_blank\">handbrake</a>
                        </li>
                    </ul>
                </div>
            </div>
        ";
}




if(!function_exists('abilities')){
    function abilities()
    {
        if(is_null( cache()->get('abilities') ))
        {
            $abilities = Cache::remember('abilities', 60, function() {
                return auth('employee')->user()->abilities();
            });
        }else
        {
            $abilities = cache()->get('abilities');
        }


        return $abilities;
    }
}