<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 18/11/2016
 * Time: 12:53 PM
 */

$repo_dir = '/home/daniel/mirrors/portafolio.git';
$web_root_dir = '/home/daniel/code/portafolio';
$web_test_dir = '/home/daniel/code/test';

// Full path to git binary is required if git is not in your PHP user's path. Otherwise just use 'git'.
$git_bin_path = 'git';

$update = false;

$payload = json_decode(file_get_contents('php://input'));

if ( empty($payload) ) {
   exit(404);
}

if ($payload->push->changes[0]->new->name == 'master') {

    exec("cd $repo_dir && $git_bin_path fetch");
    exec("cd $repo_dir && GIT_WORK_TREE=$web_root_dir $git_bin_path checkout -f master");
    exec("cd $web_root_dir && php artisan optimize");

} else if ($payload->push->changes[0]->new->name == 'test') {

    exec("cd $repo_dir && $git_bin_path fetch");
    exec("cd $repo_dir && GIT_WORK_TREE=$web_test_dir $git_bin_path checkout -f test");
    exec("cd $web_root_dir && php artisan optimize");

}
