<div>
    <p>Name: <?php echo $applicant->getFirstName(), ' ', $applicant->getLastName()?></p>
    <p>Years of EXP: <?php echo $applicant->getExperience()?></p>
    <p>Level: <?php echo $applicant->getLevel() ?></p>
    <p>Skills: <?php echo implode(', ', $applicant->getSkills()) ?></p>
    <p>*****************************************************************</p>
<div>