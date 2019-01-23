<!-- 
 *  /Exercises.php
 *  
 *  Part of LJ Test project.
 *
 *  Here we create the information needed to finish all the exercises.
 *
 -->

<?php
  //Exercise1
  //it creates 2 arrays, the first one have all the names of the students and the second one have the qualifications obtained by the students.
  $names= array_column($dataStudents, 0);
  unset($names[0]);
  $names = implode("','", $names);
  $names = "'".$names."'";
  $group= array_column($dataStudents, 3);
  unset($group[0]);

  //Exercise2
  //it creates 3 variables with the average qualification for every group (3).
  $countGroup1=0;
  $countGroup2=0;
  $countGroup3=0;
  $group1=0;
  $group2=0;
  $group3=0;
  for ($i=1;$i<count($dataStudents);$i++){
    switch ($dataStudents[$i][3]) {
        case 1:
          $group1+=$dataStudents[$i][5];
          $countGroup1++;
          break;
        case 2:
          $group2+=$dataStudents[$i][5];
          $countGroup2++;
          break;
        case 3:
          $group3+=$dataStudents[$i][5];
          $countGroup3++;
          break;
        default:
          echo "Group not recognised";
    }
  }
  $averageGroup1=$group1/$countGroup1;
  $averageGroup2=$group2/$countGroup2;
  $averageGroup3=$group3/$countGroup3;

  //Exercise3
  //it creates a variable that have the index of the student with the best qualification.
  $grades= array_column($dataStudents, 5);
  unset($grades[0]);
  $indexBestQualification = array_search(max($grades), $grades);

  //Exercise4
  //it creates a variable that have the index of the student with the worst qualification.
  $indexWorstQualification = array_search(min($grades), $grades);

  //Exercise5
  //it creates a variable that have the average qualification obtained by all the studens.
  if(count($grades)) {
    $grades = array_filter($grades);
    $averageQualification = array_sum($grades)/count($grades);
  }
?>