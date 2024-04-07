<?php
                // Define function to calculate total
                function calculateTotal($english, $sst, $maths, $science) {
                    return $english + $sst + $maths + $science;
                }

                // Define function to calculate average
                function calculateAverage($english, $sst, $maths, $science) {
                    $average = ($english + $sst + $maths + $science) / 4;
                   return $average;
                }

                //function to calculate aggregate
               function englishAggregate($english) {
                    
                    if ($english >= 90 ) {
                        return 1;
                    } elseif ($english >= 79 ) {
                        return 2;
                    } elseif ($english >= 69 ) {
                        return 3;
                    } elseif ($english >= 59 ) {
                        return 4;
                    } elseif ($english >= 49 ) {
                        return 5;
                    } elseif ($english >= 39 ) {
                        return 6;
                    } elseif ($english >= 29 ) {
                        return 7;
                    } elseif ($english >= 20 ) {
                        return 8;
                    }else{
                        return 9;
                    }
                }

                function mathsAggregate($maths) {
                    if ($maths >= 90 ) {
                        return 1;
                    } elseif ($maths >= 79 ) {
                        return 2;
                    } elseif ($maths >= 69 ) {
                        return 3;
                    } elseif ($maths >= 59 ) {
                        return 4;
                    } elseif ($maths >= 49 ) {
                        return 5;
                    } elseif ($maths >= 39 ) {
                        return 6;
                    } elseif ($maths >= 29 ) {
                        return 7;
                    } elseif ($maths >= 20 ) {
                        return 8;
                    }else{
                        return 9;
                    }
                }

                function scienceAggregate($science){
                     if ($science >= 90 ) {
                        return 1;
                    } elseif ($science >= 79 ) {
                        return 2;
                    } elseif ($science >= 69 ) {
                        return 3;
                    } elseif ($science >= 59 ) {
                        return 4;
                    } elseif ($science >= 49 ) {
                        return 5;
                    } elseif ($science >= 39 ) {
                        return 6;
                    } elseif ($science >= 29 ) {
                        return 7;
                    } elseif ($science >= 20 ) {
                        return 8;
                    }else{
                        return 9;
                    }
                }

                function sstAggregate($sst){
                    if ($sst >= 90 ) {
                        return 1;
                    } elseif ($sst >= 79 ) {
                        return 2;
                    } elseif ($sst >= 69 ) {
                        return 3;
                    } elseif ($sst >= 59 ) {
                        return 4;
                    } elseif ($sst >= 49 ) {
                        return 5;
                    } elseif ($sst >= 39 ) {
                        return 6;
                    } elseif ($sst >= 29 ) {
                        return 7;
                    } elseif ($sst >= 20 ) {
                        return 8;
                    }else{
                        return 9;
                    }
                }


                function returnDivision($maths,$english,$science,$sst){
                    $variableD=totalaggregate($maths,$english,$science,$sst);
                    if($variableD>=4&&$variableD<=12){
                        return "I";
                    }elseif($variableD>=13&&$variableD<=24){
                        return "II";
                    }elseif($variableD>=25&&$variableD<=32){
                        return "III";
                    }elseif($variableD>=33&&$variableD<=35){
                        return "IV";
                    }else{
                        return "U";
                    }
                }



                function totalAggregate($english, $sst, $maths, $science){
                    $english = englishAggregate($english);
                    $maths = mathsAggregate($maths);
                    $sst = sstAggregate($sst);
                    $science = scienceAggregate($science);
                    $returnedAggregate = $english +$maths + $science+ $sst;
                    return $returnedAggregate;

                }



?>
