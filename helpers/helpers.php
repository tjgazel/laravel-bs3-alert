<?php

if (!function_exists('bs3Alert')) {
    /**
     * Toastr helper function
     *
     * @return \TJGazel\Bs3Alert\Bs3Alert
     */
    function bs3Alert()
    {
        return app(\TJGazel\Bs3Alert\Bs3Alert::class);
    }

}