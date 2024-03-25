<?php
define('ABS_PATH', __DIR__);

require_once('./applicants.service.php');
require_once('./db.service.php');
$database = new DatabaseService();
$apService = new ApplicantsService($database);
$users = $apService->get_users_from_database();
$userSkills = [];

if (isset($_GET['jobTitle']))   
{
    echo 'Entered data: ';
    $jobTitle = isset(($_GET['jobTitle'])) ? $_GET['jobTitle'] :'';
    echo ''. $jobTitle .', ';

    $experience = isset(($_GET['experienceNeeded'])) ? $_GET['experienceNeeded'] :'';
    echo ''. $experience .', ';

    $level = isset(($_GET['positionLevel'])) ? $_GET['positionLevel'] :'';
    echo ''. $level .', ';

    for ($i = 1; $i < 4; $i++)
    {
        $_GET["skill$i"] != '' ? array_push($userSkills, $_GET["skill$i"]): '';
    }
    print_r($userSkills);
    
    $users = $apService->get_selected_users($level, $experience, $userSkills);

    foreach ($users as $applicant)
    {
        include(ABS_PATH . '/views/applicant-summary.view.php');
    }
}
else
{
    include(ABS_PATH . '/views/head.view.php');
    include(ABS_PATH . '/views/welcome.view.php');
    include(ABS_PATH . '/views/form.view.php');
    include(ABS_PATH . '/views/footer.view.php');
}