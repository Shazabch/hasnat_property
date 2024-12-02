<?php
use Illuminate\Support\Facades\Route;


function subMenuActiveBySegment($s2, $s3 = '', $s4 = '')
{
    $result = false;

    if ($s4 != '') {
        $result = request()->segment(2) == $s2 && request()->segment(3) == $s3 && request()->segment(4) == $s4;
    } else if ($s3 != '') {
        $result = request()->segment(2) == $s2 && request()->segment(3) == $s3;
    } else {
        $result = request()->segment(2) == $s2;
    }

    return $result ? 'menu-item-active' : '';
}

function activeByFirstSegment($s1)
{
    return request()->segment(1) == $s1 ? 'menu-item-active' : '';
}

function deleteFile($path)
{
    if ($path != null && file_exists(public_path($path))) {
        unlink($path);
    }
}

function activeBySecondSegment($s2)
{
    return request()->segment(2) == $s2 ? 'menu-item-active' : '';
}

function openByFirstSegment($s1)
{
    return request()->segment(1) == $s1 ? 'menu-item-open' : '';
}

function activeByRoute($routeName)
{
    $currentRoute = Route::currentRouteName();
    return $currentRoute == $routeName ? 'menu-item-active' : '';
}

function openByRoute($routeName)
{
    $currentRoute = Route::currentRouteName();
    // check if cuurent route contains route name
    if(strpos($currentRoute, $routeName) !== false){
        return 'menu-item-open';
    }
    return '';
}

function getBg($bg_type){
    switch ($bg_type) {
        case 'white':
            return 'bg-white';
        case 'dark':
            return 'bg_dark';
        case 'accent':
            return 'bg_light';
        default:
            return '';
    }
}

function getQualifications(){
    return[
        [
            'location' => 'Kings College, London',
            'qualification' => 'MSC',
        ],
        [
            'location' => 'Surgical Neurology',
            'qualification' => 'FRCS',
        ],
        [
            'location' => 'College of Physicians & Surgeons',
            'qualification' => 'FCPS( Neuro surgery)',
        ],
        [
            'location' => 'Royal College Glasgow',
            'qualification' => 'FRCS',
        ],
        [
            'location' => 'BZU',
            'qualification' => 'FAMB BSRCS',
        ],
    ];
}