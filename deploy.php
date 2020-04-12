<?php
namespace Deployer;

require 'recipe/symfony3.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:yaowenqiang/snc_redis_demo.git');
// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

set('composer_options', '{{composer_action}} --verbose --prefer-dist --no-progress --no-interaction --no-dev --optimize-autoloader --no-suggest --no-scripts');

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('115.28.221.31')
    ->user('root')
    ->set('deploy_path', '~/{{application}}');

// Tasks

task('pwd', function () {
  $result = run('pwd');
  writeln('current dir: ' . $result);
});

task('build', function () {
    run('cd {{release_path}} && deploy:clear-cache');
});



task('test',[
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:create_cache_dir',
    'deploy:shared',
    'deploy:cache:clear',
    'deploy:cache:warmup',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
])->desc('deploy task');



task('composer:update', function () {
    run('cd {{deploy_path}} && {{bin/composer}} {{composer_options}}');
})->desc('update vendor');
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'database:migrate');

