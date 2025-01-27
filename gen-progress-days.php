<?php
date_default_timezone_set('America/Vancouver');

// output like '25-01 23-01 21-01 20-01'
$dates_output = shell_exec('git log --pretty=format:"%ad" --date=format:"%d-%m"|uniq|xargs echo');

// each entry like '25-01' (dd-MM)
$dates = explode(' ', trim($dates_output));

$memo = [];
foreach ($dates as $d) $memo[$d] = true;

$header = '_______________│ M│Tu│ W│Th│ F│Sa│Su│';

function print_red($x) { return "\e[31m$x\e[0m";}
function print_green($x) { return "\e[32m$x\e[0m";}

$start = new DateTime('2024-12-30');
$end = new DateTime('2025-12-31');
$today = new DateTime();
$interval = DateInterval::createFromDateString('1 week');
$period = new DatePeriod($start, $interval, $end);

$s = $header . PHP_EOL;
foreach ($period as $dt) {
  $d = clone $dt;
  $s .= $dt->format("M-d") . ' - ' . $dt->add(new DateInterval('P6D'))->format("M-d") . '│';

  for ($i=0;$i<7;$i++) {
    $stamp = $d->format("d-m");
    if ($d>$today) {
      $s .= "░░";
    } elseif ($memo[$stamp]??false) {
      $s .= print_green(' ✔');
    } else {
      $s .= print_red(' ✗');
    }
    $s .= '│';
    $d->add(new DateInterval('P1D'));
  }
  $s .= PHP_EOL;
}

file_put_contents(__DIR__.'/progress-days.txt', $s);
