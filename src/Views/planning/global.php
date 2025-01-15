<div class="m-5">
    <div class="p-5 rounded " id="calendar">
    <?php

use Sthom\App\Service\PlanningService;
use Sthom\App\Service\StateService;

        $date = new DateTime($days[0]);
        $next = clone $date;
        $previous = clone $date;
        $next->modify("+7 days");
        $previous->modify("-7 days");
    ?>
    <div class="d-flex justify-content-between pb-3">
        <a class="btn btn-light" href="/planning/<?=$previous->format("Y-m-d") ?>"><</a>
        <a class="btn btn-light"  href="/planning/<?=$next->format("Y-m-d") ?>">></a>
    </div>
        <div class="text-center row pt-3" id="thead">
            <div class="col-2 d-flex flex-column justify-content-end">
                <p>Développeurs</p>
            </div>
            <div class="col-2">
                <h4>Lundi</h4>
                <p><?= PlanningService::dateToFrFormat($days[0]) ?></p>
            </div>
            <div class="col-2">
                <h4>Mardi</h4>
                <p><?= PlanningService::dateToFrFormat($days[1]) ?></p>
            </div>
            <div class="col-2">
                <h4>Mercredi</h4>
                <p><?= PlanningService::dateToFrFormat($days[2]) ?></p>
            </div>
            <div class="col-2">
                <h4>Jeudi</h4>
                <p><?= PlanningService::dateToFrFormat($days[3]) ?></p>
            </div>
            <div class="col-2">
                <h4>Vendredi</h4>
                <p><?= PlanningService::dateToFrFormat($days[4]) ?></p>
            </div>
        </div>
        <?php if ($devs==="null"): ?>
            <div class="alert alert-warning text-center mt-3">
                Aucun développeur
            </div>
        <?php else: ?>
            <?php foreach ($devs as $dev): 
                $tasks = $sortedTasks[$dev->getId()];
            ?>
                <div id="planning-dev-<?= $dev->getId(); ?>" class="row">
                    <div class="day col-2 py-4 px-0 d-flex justify-content-space-evenly flex-column text-center">
                        <h4><?= $dev->getName(); ?></h4>
                    </div>
                    <?php foreach ($days as $day): 
                        ?>
                        <div class="day col-2 px-0 d-flex justify-content-space-evenly" data-devId="<?= $dev->getId() ?>" data-day="<?= $day ?>">
                            <?php if (isset($tasks[$day])):
                                $task = $tasks[$day];
                                $date1 = new DateTime($task["displayStartDate"]);
                                $length = $date1->diff(new DateTime($task["displayEndDate"]))->days + 1;
                                $length *= 100;
                                $colors=StateService::getColor($task["idState"]);
                            ?>
                                <div class="task rounded p-2 my-3" style="flex-shrink: 0; background-color: <?=$colors[0]?>;color: <?=$colors[1]?>; width: <?= $length ?>%;">
                                    <?= $task["name"] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
