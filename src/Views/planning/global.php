<div class="m-5">
    <div class="p-5 rounded " id="calendar">
    <?php
        $date=new DateTime($days[0]);
        $next=clone $date;
        $previous=clone $date;
        $next->modify("+7 days");
        $previous->modify("-7 days");
        ?>
        <a href="/planning/<?=$previous->format("Y-m-d") ?>">semaine précédente</a>
        <a href="/planning/<?=$next->format("Y-m-d") ?>">semaine suivante</a>
        <div class="text-center row pt-3" id="thead">
            <div class="col-2 d-flex flex-column justify-content-end">
                <p>Developpeurs</p>
            </div>
            <div class="col-2">
                <h4>Lundi</h4>
                <p><?= $days[0] ?></p>
            </div>
            <div class="col-2">
                <h4>Mardi</h4>
                <p><?= $days[1] ?></p>

            </div>
            <div class="col-2">
                <h4>Mercredi</h4>
                <p><?= $days[2] ?></p>
            </div>
            <div class="col-2">
                <h4>Jeudi</h4>
                <p><?= $days[3] ?></p>
            </div>
            <div class="col-2">
                <h4>Vendredi</h4>
                <p><?= $days[4] ?></p>
            </div>
        </div>
        <?php foreach ($devs as $dev):
            $tasks = $sortedTasks[$dev->getId()];
        ?>
            <div id="planning-dev-<?= $dev->getId(); ?>" class="row">
                <div class="day col-2 py-4 px-0 d-flex justify-content-space-evenly flex-column text-center">
                    <h4><?= $dev->getName(); ?></h4>
                </div>
                <?php foreach ($days as $day): ?>

                    <div class="day col-2 px-0 d-flex justify-content-space-evenly">

                        <?php if (isset($tasks[$day])):
                            $task = $tasks[$day];
                            $date1 = new DateTime($task["displayStartDate"]);
                            $length = $date1->diff(new DateTime($task["displayEndDate"]))->days + 1;
                            $length *= 100;
                        ?>
                            <div class="border task rounded p-2 my-4" style="flex-shrink: 0; background-color: red; margin: 5px 0; width: <?= $length ?>%;">
                                <?= $task["name"] ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </div>

</div>